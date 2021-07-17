(function ($){
    'use strict';
    $(document).ready(function ($) {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 20) {
                $('header').addClass("sticky");
            } else {
                $('header').removeClass("sticky");
            }
        })

        $('.hamburger').click(function(e) {
            e.preventDefault()
            $(this).toggleClass('active')
            $('.header__navigation > nav').slideToggle()
        })
    });
})(jQuery)