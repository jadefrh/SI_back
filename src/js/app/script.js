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
	    var title = $(this).attr('data-title');
	    var overview = $(this).attr('data-overview');
	    var date = $(this).attr('data-date');
	    var popularity = $(this).attr('data-popularity');

	    var html = "<h1>"+ title +"</h1>
	    			<p id='overview'>"+ overview +"</p>
	    			<img src='http://image.tmdb.org/t/p/w500/"+ poster +"'>
	    			<p id='date'>"+ date +"</p>
	    			<p id='popularity'>"+ popularity +"</p>";

function roundToTwo(num) {
  return +(Math.round(num + "e+5")  + "e-5");
}

