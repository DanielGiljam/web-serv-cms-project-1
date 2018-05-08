var geocoder;
var map;
function initMap() {
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById('zip_code_geocoding').innerText;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });

    var latlng = new google.maps.LatLng();
    var mapOptions = {
        zoom: 14,
        center: latlng
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
}

function codeAddress() {
    var address = document.getElementById('address').value;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}