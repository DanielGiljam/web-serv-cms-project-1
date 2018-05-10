<<<<<<< HEAD
var geocoder;
var map;

=======
let geocoder;
let map;
>>>>>>> 057cefc310cb5eb9e0680a20f6dc60dafbc08d9a

function initMap() {
    geocoder = new google.maps.Geocoder();
    const address = document.getElementById('zip-code-geocoding').innerText;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
<<<<<<< HEAD
            /*var marker = new google.maps.Marker({
=======
            const marker = new google.maps.Marker({
>>>>>>> 057cefc310cb5eb9e0680a20f6dc60dafbc08d9a
                map: map,
                position: results[0].geometry.location

            });*/

        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });

    const latlng = new google.maps.LatLng();
    const mapOptions = {
        zoom: 14,
        center: latlng
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
}

<<<<<<< HEAD
=======
function codeAddress() {
    const address = document.getElementById('address').value;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            const marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}
>>>>>>> 057cefc310cb5eb9e0680a20f6dc60dafbc08d9a
