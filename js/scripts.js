jQuery(document).ready(function($) {

    $('.menu-toggle').click(function() {

        $('#site-header nav').stop().slideToggle(400);

    });

    $('#site-header .menu-item-has-children > a').click(function(e) {

        e.preventDefault();

        $('#site-header .menu-item-has-children > a.active').not(this).removeClass('active').next().stop().slideUp(400);

        $(this).addClass('active').next().stop().slideToggle(400);

    });

});