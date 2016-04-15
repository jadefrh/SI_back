// window.onload = function() {
//   var startPos;
//   var geoOptions = {
//     enableHighAccuracy: true
//   }
//
//   var geoSuccess = function(position) {
//     startPos = position;
//     document.getElementById('startLat').innerHTML = startPos.coords.latitude;
//     document.getElementById('startLon').innerHTML = startPos.coords.longitude;
//   };
//   var geoError = function(error) {
//     console.log('Error occurred. Error code: ' + error.code);
//     // error.code can be:
//     //   0: unknown error
//     //   1: permission denied
//     //   2: position unavailable (error response from location provider)
//     //   3: timed out
//   };
//
//   navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
// };

$(function () {
  $('.movie_card_result[data-title]').on('click', function () {
    $('.movie_card_result').removeClass('active');
    $(this).addClass('active');
    var viewcard = $('#view'),
        poster = $(this).attr('data-poster'),
        backdrop = $(this).attr('data-backdrop'),
        title = $(this).attr('data-title'),
        overview = $(this).attr('data-overview'),
        date = $(this).attr('data-date'),
        popularity = $(this).attr('data-popularity');
    viewcard.find('.movie-title').text(title);
    viewcard.find('.movie-data').text("Date de sortie : "+date);
    viewcard.find('.movie-popularity').text('Popularité : '+popularity);
    viewcard.find('.synopsis').text(overview);
    viewcard.find('.poster').attr('src', 'http://image.tmdb.org/t/p/w500/'+poster);
    viewcard.find('.poster').attr('alt', title);
    viewcard.find('.movie-cinename').text()
  });
});

$(function () {
  $('#routes-link').on('click', function(e) {
    e.preventDefault();
    // get cinema name + adress, movie name + time
    var cinema = $('.movie_card_result.active .cinema-title').text(),
        cinemaaddress = $('#view .movie-cineadress').text(),
        movie = $('#view .movie-title').text(),
        movietime = $('.movie_card_result.active .time-title span').text();
    // console.log(cinema);
    // console.log(cinemaaddress);
    // console.log(movie);
    // console.log(movietime);
    // var href =
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
