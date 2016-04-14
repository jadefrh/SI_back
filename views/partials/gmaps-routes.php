<?php
echo "<script>
var startPos;
var geoOptions = {
  enableHighAccuracy: true
}
var geoSuccess = function(position) {
  startPos = position;
  document.getElementById('startLat').innerHTML = roundToTwo(startPos.coords.latitude);
  document.getElementById('startLon').innerHTML = roundToTwo(startPos.coords.longitude);
};
var geoError = function(error) {
  console.log('Error occurred. Error code: ' + error.code);
  // error.code can be:
  //   0: unknown error
  //   1: permission denied
  //   2: position unavailable (error response from location provider)
  //   3: timed out
};

navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);

function initMap() {
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var directionsService = new google.maps.DirectionsService;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: '{lat: 41.85, lng: -87.65}'
  });
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('right-panel'));

  var control = document.getElementById('floating-panel');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
  document.getElementById('start').addEventListener('change', onChangeHandler);
  document.getElementById('end').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;

  directionsService.route({
    origin: '1 rue renon vincennes', // to replace with current location
    destination: 'rue de rivoli, paris', // to replace with selected theater address
    travelMode: google.maps.TravelMode.TRANSIT
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}
</script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCPrTzpYb7UEfvHLy1rfPmc0pefyTTdRM0&signed_in=true&language=fr&callback=initMap' async defer>
";
