$(document).ready(function() {
	$(".movie_card_overview_result").hide();
    $(".movie_card_result").click(function(){
        $(".movie_card_overview_result").show();
    });
});

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

	    var html = "<h1>"+ title +"</h1><p>"+ overview +"</p><img src='http://image.tmdb.org/t/p/w500/"+ poster +"'>";

	    $('#view').html(html);
	});
});
