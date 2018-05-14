let geocoder;
let map;

function initMap() {
    geocoder = new google.maps.Geocoder();
    const address = document.getElementById('zip_code_geocoding').innerText;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            const marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location

            });
        }
    });
    const latlng = new google.maps.LatLng();
    const mapOptions = {
        zoom: 14,
        center: latlng
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
}

function codeAddress() {
    const address = document.getElementById('address').value;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            const marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        }
    });
}
