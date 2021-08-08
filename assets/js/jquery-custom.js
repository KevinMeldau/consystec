$(document).ready(function(){
    /**
     * Arrow Down
     */

    $(".arrow-down").click(function() {
        $('html, body').animate({
            scrollTop: $("#services").offset().top
        }, 500);
    });

    /**
     * Mobile Navigation
     */

    $shown = false;
    $( '.js-mobile-close-icon' ).on( 'click', function(){
        // Open Mobile Navigation
        if ( $shown == false ) {
            $( '.mobile-navigation' ).addClass( 'mobile-navigation-open' );
            $shown = true;
        } else {
            $( '.mobile-navigation' ).removeClass( 'mobile-navigation-open' );
            $shown = false;
        }
    } );

    // inside mobile mobile menu close icon
    $( '.js-menu-close-icon' ).on( 'click', function(){
        $( '.mobile-navigation' ).removeClass( 'mobile-navigation-open' );
        $( '.js-mobile-close-icon' ).removeClass( 'ct-icon-rotate-45' );
    } );
});


















