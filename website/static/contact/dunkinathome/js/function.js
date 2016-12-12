$(document).ready(function (e) {

    /*****************'
     mobile navigation
     '******************/

    $("#callout-find-store").hide();

    $('#top-nav-btn').on('click touchstart', function (e) {

        /*****  slide navigation  to left  from body   ***/
        $(this).parent('.navigation').toggleClass('open');

        /**** change button image  ****/
        $('#top-nav-btn').toggleClass('active');

        /**** add class to body to stop scroll  ****/
        $("body").toggleClass('stop');

        /**** add overlay effect on body ****/
        $('#overlay').toggleClass('overlay');


        /****  stop parent propagation  ****/
        e.preventDefault();
        e.stopPropagation();

        /****  Creamer popup display hidden on menu click  ****/
        $('#buyOnlineLeavingGlobal').removeClass('reveal-modal-open');

        /****  Creamer popup overlay display hidden on menu click  ****/
        $('.reveal-modal-bg').hide();



        /**** sub menu hide and remove class from expand   ****/
        $('.sub-menu').slideUp();
        $('.expand').removeClass('active');

    });


    /****  Sub menu open on expand button "+" Click  ****/

    $('.expand').on('click', function (e) {
        $('.sub-menu').slideToggle('open-sub-menu');
        $(this).toggleClass('active');

        /****  stop parent propagation  ****/
        e.preventDefault();
        e.stopPropagation();
    });


    /**** Navigation click stop propagation  ****/
    $('.navigation').on('click touchstart', function (e) {
        e.stopPropagation();
    });

    /****  on Document / Body click animation   ****/
    $(document).on('click touchstart', function () {

        /****  Creamer popup display hidden on document click  ****/
        $('#buyOnlineLeavingGlobal').removeClass('reveal-modal-open');

        /****  Creamer popup overlay display hidden on document click  ****/
        $('.reveal-modal-bg').hide();

        /****  slide navigation  move into  body   ****/
        $('#top-nav-btn').parent('.navigation').removeClass('open');

        /**** change button image  ****/
        $('#top-nav-btn').removeClass('active');

        /****  remove class from body to allow scroll  ****/
        $("body").removeClass('stop');

        /**** remove overlay effect from body ****/
        $('#overlay').removeClass('overlay');

    });

    /*****************'
     mobile navigation
     '******************/

    $('#buyOnlineLeavingGlobal').on('click touchstart', function (e) {

        /****  stop parent propagation  ****/
        e.preventDefault();
        e.stopPropagation();
    });

    /**************
     creamer popup display
     *******************/

    $('.openCreamer').on('click touchstart', function (e) {

        /**** Creamer popup display on open Creamer click   ****/
        $('#buyOnlineLeavingGlobal').addClass('reveal-modal-open');

        /****   Creamer popup overlay display   ****/
        $('.reveal-modal-bg').show();

        /****  slide navigation  move into  body   ****/
        $('#top-nav-btn').parent('.navigation').removeClass('open');

        /**** change button image  ****/
        $('#top-nav-btn').removeClass('active');

        /****  remove class from body to allow scroll  ****/
        $("body").removeClass('stop');

        /**** remove overlay effect from body ****/
        $('#overlay').removeClass('overlay');


        /**** sub menu hide and remove class from expand   ****/
        $('.sub-menu').hide();
        $('.expand').removeClass('active');

        /****  stop parent propagation  ****/
        e.preventDefault();
        e.stopPropagation();
    });

    $('#close-reveal-modal, #outbound-link').on('click touchstart', function () {

        /****  Creamer popup display hidden on close click  ****/
        $('#buyOnlineLeavingGlobal').removeClass('reveal-modal-open');

        /****  Creamer popup overlay display hidden on close click  ****/
        $('.reveal-modal-bg').hide();



    });


    $('#outbound-link').on('click touchstart', function (e) {
        return !window.open(this);
    });



});

$(window).on('load', function () {

    /********* check chrome browser and implement jquery on images *********/
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;


    if (navigator.userAgent.search("Chrome") >= 0 || navigator.userAgent.search("Safari") >= 0 || userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/iPod/i)) {
        $('.product, .product-listing').children('li').each(function (listItemIndex) {
            itemwidth = $(this).width();
            $(this).css('width', itemwidth);
            $('.product-button').each(function (listItemIndex) {
                itemwidth = $(this).parent().parent('li').width();
                $(this).css('left', itemwidth / 12);
                if (itemwidth < 167) {
                    $(this).css('left', itemwidth / 27);
                }
                if (itemwidth < 159) {
                    $(this).css('left', 0);
                }
            });
        });
    }


});

function retrieve_zip(callback)
{
    try {
        if (!google) {
            google = 0;
        }
    } catch (err) {
        google = 0;
    } // Stupid Exceptions
    if (navigator.geolocation) // FireFox/HTML5 GeoLocation
    {
        navigator.geolocation.getCurrentPosition(function (position)
        {
            zip_from_latlng(position.coords.latitude, position.coords.longitude, callback);
        });
    } else if (google && google.gears) // Google Gears GeoLocation
    {
        var geloc = google.gears.factory.create('beta.geolocation');
        geloc.getPermission();
        geloc.getCurrentPosition(function (position)
        {
            zip_from_latlng(position.latitude, position.longitude, callback);
        }, function (err) {});
    }
}
function zip_from_latlng(latitude, longitude, callback)
{
    // Setup the Script using Geonames.org's WebService
    //var script = document.createElement("script");
    var addressComponents, postalCode;
    $.ajax({
        dataType: "json",
        url: "https://maps.googleapis.com/maps/api/geocode/json",
        data: {latlng: latitude+','+longitude},
        success: function(data) {
            addressComponents = data.results[0].address_components;
            $.each(addressComponents, function() {
                if(this.types[0] === 'postal_code') {
                    postalCode = this.long_name;
                }
            });
            $("#zipcode").val(postalCode);
        }
    });
}

if(navigator.userAgent.match(/Android/i)
         || navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         || navigator.userAgent.match(/Windows Phone/i)) {
    retrieve_zip("example_callback");
}