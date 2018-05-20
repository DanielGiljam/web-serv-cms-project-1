let info_window;

function poi_map() {
    let map_address;
    const address = document.getElementById('zip_code').innerText.slice(-5);
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': address}, function (results, status) {
        if (status === 'OK') {
            let latitude = results[0].geometry.location.lat();
            let longitude = results[0].geometry.location.lng();
            map_address = new google.maps.LatLng({lat: latitude, lng: longitude});
            map = new google.maps.Map(document.getElementById('map'), {
                center: map_address,
                zoom: 14
            });
            info_window = new google.maps.InfoWindow();
            const service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
                location: map_address,
                radius: 1500,
                type: ['restaurant']
            }, callback);

        }
    });
    map_address = new google.maps.LatLng({lat: 60.192059, lng: 24.945831});
    map = new google.maps.Map(document.getElementById('map'), {
        center: map_address,
        zoom: 15
    });
    info_window = new google.maps.InfoWindow();
    const service = new google.maps.places.PlacesService(map);
    service.nearbySearch({
        location: map_address,
        radius: 1000,
        type: ['restaurant']
    }, callback);
}

function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (let i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

function createMarker(place) {
    const location = place.geometry.location;
    const marker = new google.maps.Marker({
        map: map,
        position: location
    });
    google.maps.event.addListener(marker, 'click', function() {
        info_window.setContent(place.name);
        info_window.open(map, this);
    });
}
