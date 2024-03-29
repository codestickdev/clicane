(function($){

     /**
     * Smooth scroll
     */
      $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
        var origin = window.location.origin;
        var section = $(this).attr('href');

        // if(section !== '#page'){
        //     $(location).attr('href', origin + section);
        // }else{
        //     window.history.pushState('clicane', 'Clicane - Prezentacje multimedialne', '/');
        // }

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 80
        }, 500);
    });

    /**
     * Video play
     */
    $(document).ready(function(){
        $('.homeVideo__play').on('click', function(){
            $(this).remove();
            $('.mejs-play').click();
        });
    });

    /**
     * Menu bar clone
     */
    $(document).ready(function(){
        let headerHeight = $('.siteHeader').outerHeight();
        $('.siteHeader__clone').css('height', headerHeight);
    });

    /**
     * Menu bar scrolled
     */
    $(document).ready(function(){
        setTimeout(function(){
            var siteHeader = $('.siteHeader');
            var didScroll;
            var lastScrollTop = 0;
            var delta = 50;
            var navbarHeight = siteHeader.outerHeight();

            $(window).scroll(function(event){
                var siteHeader = $('.siteHeader');
                if($(document).scrollTop() > 67){
                    siteHeader.addClass('siteHeader--shadow');
                }else{
                    siteHeader.removeClass('siteHeader--shadow');
                }
                didScroll = true;
            });

            setInterval(function() {
                if (didScroll) {
                    hasScrolled();
                    didScroll = false;
                }
            }, 250);

            function hasScrolled() {
                var siteHeader = $('.siteHeader');
                var st = $(this).scrollTop();
                
                if(Math.abs(lastScrollTop - st) <= delta)
                    return;
                
                if (st > lastScrollTop && st > navbarHeight){
                    if($('body').hasClass('promocode-blackweek')){
                        siteHeader.css('top', - siteHeader.height() - 35);
                    }else{
                        siteHeader.addClass('siteHeader--scrolled');
                    }
                } else {
                    if(st + $(window).height() < $(document).height()) {
                        if($('body').hasClass('promocode-blackweek')){
                            siteHeader.css('top', 0);
                        }else{
                            siteHeader.removeClass('siteHeader--scrolled');
                        }
                    }
                }
                lastScrollTop = st;
            }
        }, 150);
    });

    /**
     * Menu mobile
     */
    $(document).ready(function(){
        $('.menu-toggle').on('click', function(){
            $('body').addClass('noscroll');
            $('.menuMobile').addClass('menuMobile--active');
        });
        $('.menuMobile__close').on('click', function(){
            $('body').removeClass('noscroll');
            $('.menuMobile').removeClass('menuMobile--active');
        });

        let mobileItem = $('.menuMobile').find('.menu-item');
        $(mobileItem).on('click', function(){
            $('body').removeClass('noscroll');
            $('.menuMobile').removeClass('menuMobile--active');
        });
    });

    /**
     * Home tools - mobile
     */
    $(document).ready(function(){
        let tools = $('.homeTools__list').find('.pos');

        $(tools).last().addClass('pos--end');
        
        if($(window).width() < 396){
            $(tools).each(function(){
                $(this).removeClass('pos--last');
            });
        }
    });

    /**
     * Checkbox
     */
     $(document).ready(function(){
        $('input[type="checkbox"]').on('click', function(){
            if($(this).is(':checked')){
                $(this).parent().find('.checkbox-trigger').addClass('active');
            }
            else if($(this).is(':not(:checked)')){
                $(this).parent().find('.checkbox-trigger').removeClass('active');
            }
        });
    });
}(jQuery));