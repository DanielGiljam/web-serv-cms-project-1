var map;
var infowindow;

function poi_map() {

    //gets lat and lng from address
    var latitude;
    var longitude;
    var map_address;
    var MyLatLng;
    var address = document.getElementById("zip_code_geocoding").innerText;
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': address}, function (results, status)
    {
        if (status == 'OK')
        {
            latitude = results[0].geometry.location.lat();
            longitude = results[0].geometry.location.lng();
            console.log("inside geocoder");
            console.log(latitude,longitude);
            MyLatLng = new google.maps.LatLng({lat: latitude, lng: longitude});

            map_address = MyLatLng;
            map = new google.maps.Map(document.getElementById('map'), {
                center: map_address,
                zoom: 14
            });

            infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
                location: map_address,
                radius: 1500,
                type: ['restaurant']
            }, callback);

        }
        else {
            alert("Error");
        }
    });

    MyLatLng = new google.maps.LatLng({lat: 60.192059, lng: 24.945831});
    map_address ={lat: 60.192059, lng: 24.945831};
    map_address = MyLatLng;
    console.log(MyLatLng);


    map = new google.maps.Map(document.getElementById('map'), {
        center: map_address,
        zoom: 15
    });

    infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    service.nearbySearch({
        location: map_address,
        radius: 1000,
        type: ['restaurant']
    }, callback);
}
//functions outside initMap
function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    });
}

