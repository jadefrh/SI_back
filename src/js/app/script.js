window.onload = function() {
  var startPos;
  var geoOptions = {
    enableHighAccuracy: true
  }

  var geoSuccess = function(position) {
    startPos = position;
    document.getElementById('startLat').innerHTML = startPos.coords.latitude;
    document.getElementById('startLon').innerHTML = startPos.coords.longitude;
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
};

$(function () {
  $('.movie_card_result[data-title]').on('click', function () {
    var poster = $(this).attr('data-poster');
    var backdrop = $(this).attr('data-backdrop');
    var title = $(this).attr('data-title');
    var overview = $(this).attr('data-overview');
    var date = $(this).attr('data-date');
    var popularity = $(this).attr('data-popularity');

    var html = "<h1>"+ title +"</h1><p id='overview'>"+ overview +"</p><img src='http://image.tmdb.org/t/p/w500/"+ poster +"'><img src='http://image.tmdb.org/t/p/w500/"+ backdrop +"'><p id='date'>"+ date +"</p><p id='popularity'>"+ popularity +"</p>";

    $('#view').html(html);
  });
});

// var x = document.getElementById("demo");
// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else {
//     x.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }
//
// function showPosition(position) {
//   x.innerHTML = "Latitude: " + position.coords.latitude +
//   "<br>Longitude: " + position.coords.longitude;
// }
// getLocation();

getZip = function(cb) {
  // if (document.location.protocol === 'http:' && (navigator.geolocation != null)) {
  return navigator.geolocation.getCurrentPosition(function(pos) {
    var coords, url;
    coords = pos.coords;
    url = "http://nominatim.openstreetmap.org/reverse?format=json&lat=" + coords.latitude + "&lon=" + coords.longitude + "&addressdetails=1";
    return $.ajax({
      url: url,
      dataType: 'jsonp',
      jsonp: 'json_callback',
      cache: true
    }).success(function(data) {
      return cb(data.address.postcode);
    });
  });
  // }
};
getZip(function(zipcode){ console.log("zip code found: " + zipcode); });
