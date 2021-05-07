// canvas

$('document').ready(function() {
    $('#pdx_canvasTrigger').click(function() {
        $('html').addClass('pdx_canvas--isOpen');
    });

    $('.pdx_canvasOverlay').click(function() {
        $('html').removeClass('pdx_canvas--isOpen');
    });
})

// nav menu dropdowns

$('document').ready(function() {
    $('.pdx_pdx_subNav__itemTriger').click(function() {

        var navItem = $(this).parents('.pdx_subNav__item--hasMenu');

        var leftPosition = $(navItem)[0].getBoundingClientRect().left;

        var menuContent  = $(navItem).find('.pdx_subNav__dropdown').clone();

        $(menuContent).addClass('is-active');

        $(menuContent).css('left', leftPosition);

        var topPosCache = '';

        // get/set top pos for menu
        var setTopPos = function() {

            if($('.pdx_subNavBar')[0].getBoundingClientRect().top > 0) {
                topPosition = $('.pdx_subNavBar')[0].getBoundingClientRect().top + $('.pdx_subNavBar').height();
                
            } else {
                topPosition = $('.pdx_subNavBar').height();
            }
            
            if (topPosCache !== topPosition) {
                topPosCache = topPosition;
                $(menuContent).css('top', topPosition);
            }
        }

        setTopPos();

        // re-check top pos on scroll
        $(document).scroll(function() {
            setTopPos();
        })
        
        // add menu markup to dom
        if( !$('body > .pdx_subNav__dropdown').length ) {
            $('body').append(menuContent);
        }

        // ignore click on menu for removing element
        $(menuContent).on('click', function(e) {
            e.stopPropagation();
        });

        // remove menu element if anything is clicked
        $(document).on('click', function (e) {
            var target = $(e.target);
            if (!target.hasClass('.pdx_pdx_subNav__itemTriger') && !target.closest('.pdx_pdx_subNav__itemTriger').length) {
                $('body > .pdx_subNav__dropdown').remove();
                $(window).off("scroll");
            }
        });

        // remove dropdown if window is re-sized
        $(window).resize(function() {
            $('body > .pdx_subNav__dropdown').remove();
            $(window).off("scroll");
        });        
    });
})

// horizontal scroller

$(document).ready(function() {

    $('.hScroller').each(function(index) {
        var wrapper = $(this);
        var inner = $(wrapper).children('.hScroller-scroll');
    
        var checkScroll = function() {
            if (inner[0].scrollWidth > inner[0].offsetWidth) {
                wrapper.addClass('is-active');
                var leftPos = inner.scrollLeft();
                var rightPos = inner[0].scrollWidth - (leftPos + inner[0].clientWidth);

                if (leftPos > 0) {
                    wrapper.addClass('hScroller-scroll--leftActive');
                } else {
                    wrapper.removeClass('hScroller-scroll--leftActive');
                }
        
                if (rightPos > 0) {
                    wrapper.addClass('hScroller-scroll--rightActive');
                } else {
                    wrapper.removeClass('hScroller-scroll--rightActive');
                }
            }
        }

        checkScroll();

        $(inner).scroll(function () {
            checkScroll();
        });   

        $(window).resize(function() {
            checkScroll();
        });   
    })
})

// canvas menu collapse

$(document).ready(function() {
    $('.pdx_canvasItem__trigger').click(function() {
        var menuItem = $(this).parents('.pdx_canvasItem');
        var outer = $(menuItem).find('.pdx_canvasItem__subNav');
        var inner = $(outer).find('.pdx_canvasItem__subNavInner');
        var eleHeight = inner.height();
        
        $(outer).css({height: eleHeight});

        if (menuItem.hasClass('menu-expand')) {
            outer.css({ height: eleHeight });
            menuItem.toggleClass('userExtra--expand');
            window.setTimeout(function() {
                outer.css({ height: '0' });
                window.setTimeout(function() {
                    outer.css({ height: '' });
                }, 200);
            }, 17);

        } else {
            outer.css({ height: eleHeight });
            window.setTimeout(function() {
                menuItem.toggleClass('userExtra--expand');
                outer.css({ height: '' });
            }, 200);
        }

        $(menuItem).toggleClass('menu-open');
    })
})

// generic dropdown menus

$(document).ready(function() {
    $('.pdx_dropdownTrigger').click(function() {
        var container = $(this).parent('.pdx_hasDropdown');
        var menu = $(this).siblings('.pdx_dropdown')

        var leftPos = $(this)[0].getBoundingClientRect().left;
        var windowWidth = $(window).width();
        var menusPos = '';

        if ( leftPos < (windowWidth / 2 ) ) {
            menuPos = 'left';
        } else {
            menuPos = 'right';
        }

        menu.addClass('is-active position--' + menuPos);

        // remove menu element if anything is clicked
        $(document).on('click', function (e) {
            var target = $(e.target);
            if (!target.hasClass('.pdx_dropdown') && !target.hasClass('.pdx_dropdownTrigger') && !target.closest('.pdx_dropdown').length && !target.closest('.pdx_dropdownTrigger').length) {
                $(menu).removeClass('is-active');
            }
        });

        // remove menu element if anything is clicked
        $(document).on('click', function (e) {
            var target = $(e.target);
            if (!target.hasClass('.pdx_dropdown') && !target.hasClass('.pdx_dropdownTrigger') && !target.closest('.pdx_dropdown').length && !target.closest('.pdx_dropdownTrigger').length) {
                $(menu).removeClass('is-active');
            }
        });

        // remove dropdown if window is re-sized
        $(window).resize(function() {
            $(menu).removeClass('is-active');
        });        
    })
})

// mobile search

$(document).ready(function() {
    $('.pdx_searchTrigger').click(function() {
        $('#mw-header-container').addClass('pdx_search--isActive');
        $('#simpleSearch #searchInput').focus();

        $('#simpleSearch #searchInput').focusout(function() {
            $('#mw-header-container').removeClass('pdx_search--isActive');
        });

        // ignore click on menu for removing element
        $('.pdx_searchTrigger').on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
        });

        // remove menu element if anything is clicked
        $(document).on('click', function (e) {
            var target = $(e.target);
            if (!target.has('#searchform') && !target.closest('.pdx_searchTrigger').length) {
                $('#mw-header-container').removeClass('pdx_search--isActive');
            }
        });

        /*
        $('html').addClass('pdx_overlay--active');

        $('.pdx_overlay').click(function() {
            $('#mw-header-container').removeClass('pdx_search--isActive');

            $('html').removeClass('pdx_overlay--active');        
        });
        */
    })
})

// modals

$(document).ready(function() {
    $('.pdx_modal__trigger').click(function() {
        var modalContent = $(this).siblings('.pdx_modal__content').clone();

        $('html').addClass('pdx_modal--isActive pdx_overlay--active');
        $('.pdx_modalContainer').append(modalContent);

        $('.pdx_overlay').click(function() {
            $('html').removeClass('pdx_modal--isActive pdx_overlay--active');
            $('.pdx_modalContainer .pdx_modal__content').remove();
        })
    })
})

// main nav dropdown

$(document).ready(function() {
		
    $('.pd_menuTrigger').mouseenter(function() {
        $('.pdx_mainNavBar').addClass('pd-menu--open');
    });
    
    $('.pd_menuTrigger').mouseleave(function() {
        $('.pdx_mainNavBar').removeClass('pd-menu--open');
    });
    
    $('.p-nav-menuTrigger').click(function() {
        if ($('.pdx_mainNavBar').hasClass('pd-menu--open')) {
            $('.pdx_mainNavBar').removeClass('pd-menu--open');
        } else {
            $('.pdx_mainNavBar').addClass('pd-menu--open');	
        }
    });
});