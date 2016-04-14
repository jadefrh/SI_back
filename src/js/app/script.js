$(document).ready(function() {
  $(".movie_card_overview_result").hide();
  $(".movie_card_result").click(function(){
    $(".movie_card_overview_result").show();
  });
});

function roundToTwo(num) {
  return +(Math.round(num + "e+5")  + "e-5");
}

$(function () {
  $('.movie_card_result[data-title]').on('click', function () {
    var poster = $(this).attr('data-poster');
    var title = $(this).attr('data-title');
    var overview = $(this).attr('data-overview');

    var html = "<h1>"+ title +"</h1><p>"+ overview +"</p><img src='http://image.tmdb.org/t/p/w500/"+ poster +"'>";

    $('#view').html(html);
  });
});
