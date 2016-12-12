google.maps.visualRefresh = true;

var map,
        geocoder = null,
        locations = [],
        locationsLength = 0,
        geocodingQueue = [],
        bounds,
        letterCode = 'A'.charCodeAt(),
        geocodingDelay = 600,
        markerbackcolor,
        markerforecolor,
        theme, /* for changing background theme of map */
        startingNumber;

function setUpLocations() {
    for (var i = startingNumber; i <= locationsLength; ++i) {
        if (parseInt(locations[i].Latitude) === 0 || parseInt(locations[i].Longitude) === 0) {
            geocodingQueue.push(i);
        } else {
            addMarker(i);
        }
    }

    if (geocodingQueue.length > 0) {
        geocodeLocations();
    }
}

function geocodeLocations() {
    if (geocodingQueue.length < 1) {
        return;
    }

    var i = geocodingQueue.shift();
    var address = locations[i].Address + ', ' + locations[i].City + ', ' + locations[i].State + ' ' + locations[i].Zip;
    geocoder.geocode({address: address}, makeGeocodeCallback(i));
}

function makeGeocodeCallback(i) {
    return function (results, status) {
        // if we go over the query limit, add the location back to the
        // front of the queue and delay before trying again
        if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
            geocodingQueue.unshift(i);
            setTimeout(geocodeLocations, geocodingDelay);
        }

        // if the geocoding request was successful, add a marker to the
        // map and move on to the next location
        else if (status === google.maps.GeocoderStatus.OK) {
            locations[i].Latitude = results[0].geometry.location.lat();
            locations[i].Longitude = results[0].geometry.location.lng();
            addMarker(i);
            geocodeLocations();
        }

        // if there was any other error, just move on to the next location
        else {
            geocodeLocations();
        }
    };
}

function addMarker(i) {
    //var number = i + 1;
    var number = i;
    var backColor = markerbackcolor;
    var foreColor = markerforecolor;
    /* for changing pin image color according to type of location */
    if(locations[i].Type == 1 || locations[i].Type == 0){ 
        backColor = locations[i].Type == 1 ? '000000' : 'c40000';
        foreColor = locations[i].Type == 1 ? 'ffffff' : '000000';
    }else{
        backColor = markerbackcolor;
        foreColor = markerforecolor;
    }

    var latLng = new google.maps.LatLng(locations[i].Latitude, locations[i].Longitude);
    var popUpAddress = '<div class="info-window"><span class="name">' + locations[i].StoreName + "<\/span><br/>" + locations[i].Address + ", " + locations[i].City + ", " + locations[i].State + " " + locations[i].Zip + '<br><br> <a rel="external" href="http://maps.google.com/maps?daddr=' + locations[i].Address + ", " + locations[i].City + ", " + locations[i].State + " " + locations[i].Zip + '" target="_blank">Get Directions<\/a><\/div>'//;
    var infoWindow = new google.maps.InfoWindow({
        content: popUpAddress,
    });

    var image = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld=' + number + '|' + backColor + '|' + foreColor;

    var marker = new google.maps.Marker({
        map: map,
        position: latLng,
        title: locations[i].StoreName,
        icon: typeof locations[i].Icon == "undefined" || locations[i].Icon == '' ? image : locations[i].Icon,
    });

    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.open(map, marker);
    });

    bounds.extend(latLng);
    map.fitBounds(bounds);
}

function updateLocations(newLocations, locationsCount, start, themeFlag) {
    if (themeFlag != null) {
        theme = themeFlag;
    }
    locationsLength = locationsCount;
    startingNumber = typeof start !== "undefinded" ? start : 1;
    locations = newLocations;
    loadMap();
}

function unloadMap() {
    jQuery('#map').remove();
    //$('#map').append($('<div id="map-content"></div>'));
    map = bounds = null;
}

function loadMap() {
    if (google != null && google.maps != null) {
        geocoder = new google.maps.Geocoder();
        var mapOptions = {};
        if (theme == 1) { /* for changing background color theme of map */
            mapOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: 12,
                panControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                    position: google.maps.ControlPosition.TOP_RIGHT
                },
                styles: [{
                        featureType: 'all',
                        stylers: [
                            {hue: '#cccccc'},
                            {saturation: -100},
                            {lightness: 25},
                            {gamma: 0}
                        ]
                    }]
            };
        } else {
            mapOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: 12,
                panControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                    position: google.maps.ControlPosition.TOP_RIGHT
                },
            };
        }

        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        bounds = new google.maps.LatLngBounds();

        if (jQuery('#txtZipcode').val() !== '') {
            geocoder.geocode({address: jQuery('#txtZipcode').val()}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                } else {
                    map.setCenter(new google.maps.LatLng(25.824947, -80.32925));
                }

                setUpLocations();
            });
        } else {
            map.setCenter(new google.maps.LatLng(25.824947, -80.32925));
            setUpLocations();
        }
    }
}
