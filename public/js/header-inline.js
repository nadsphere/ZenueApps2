$(document).ready(function() {
    // Mobile navigation toggle
    $('.mobile-nav-toggle').on('click', function() {
        $('.mobile-nav').addClass('active');
        $('.mobile-nav-overlay').fadeIn();
    });

    $('.mobile-nav-close, .mobile-nav-overlay').on('click', function() {
        $('.mobile-nav').removeClass('active');
        $('.mobile-nav-overlay').fadeOut();
    });

    // Navbar scroll behavior for home page
    var lastScroll = 0;
    var heroHeight = 600;
    $(window).on('scroll', function() {
        var scrollTop = $(window).scrollTop();
        if ($('body').hasClass('is-home')) {
            if (scrollTop > heroHeight) {
                $('body').addClass('is-scrolled');
            } else {
                $('body').removeClass('is-scrolled');
            }
        }
        lastScroll = scrollTop;
    });

    // Fetch unread notification count
    $.ajax({
        url: '/notifications/unread-count',
        type: 'GET',
        success: function(response) {
            var count = response.count || 0;
            if (count > 0) {
                var display = count > 99 ? '99+' : count;
                $('#notif-badge-user, #notif-badge-eo').text(display).show();
                $('#notif-badge-user-mobile, #notif-badge-eo-mobile').text(display).show();
            }
        }
    });

    // Initialize WOW.js
    new WOW().init();
});
