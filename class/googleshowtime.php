<?php
/**
* Google Showtime grabber
*
* This file will grab the last showtimes of theatres nearby your zipcode.
* Please make the URL your own! You can also add parameters to this URL:
* &date=0|1|2|3 => today|1 day|2 days|etc..
* &start=10 gets the second page etc...
*
* Please download the latest version of simple_html_dom.php on sourceForge:
* http://sourceforge.net/projects/simplehtmldom/files/
*
* @author Bas van Dorst <info@basvandorst.nl>
* @version 0.1
* @package GoogleShowtime
*
* @modifyed by stephen byrne <gold.mine.labs@gmail.com>
* @GoldMinelabs.com
*/
$zip = $_GET["zipcode"];
$gmurl = 'http://www.google.fr/movies?near='.$zip;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $gmurl); // Default CURLOPT_URL - near Montreuil
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
$str = curl_exec($curl);
curl_close($curl);

$html = str_get_html($str);

// Google Movies Custom Parser
$showtimes = array();
$counts = array();
$t = 0; // sum of theaters
$m = 0; // sum of movies
$s = 0; // sum of showtimes
foreach ($html->find('#movie_results .theater') as $div) {
  foreach ($div->find('.movie') as $movie) {
    foreach ($movie->find('.times > span[style="color:"]') as $showtime) {
      $movie_name    = utf8_encode($movie->find('.name > a', 0)->innertext);
      $movie_theater = utf8_encode($div->find('h2 > a', 0)->innertext);
      $movie_address = utf8_encode($div->find('.info',0)->innertext);

      // Sanitize lang
      if (utf8_encode($movie->find('.times text', 0)->plaintext) == "VO st Fr") $movie_lang = 'Française';
      else $movie_lang = 'Originale';

      // Sanitize the showtime
      $movie_showtime = $showtime->innertext;
      $movie_showtime = substr(trim($movie_showtime), -5);
      $movie_showtime_arrsplit = explode(':', $movie_showtime); // strips the showtime from its useless <span> tag, splits the showtime in 2 (hour | minutes) in 24h format
      $movie_showtime = intval($movie_showtime_arrsplit[0]).":".intval($movie_showtime_arrsplit[1]); // binds the showtime together

      $showtime_to_add = array($movie_name, $movie_theater, $movie_address, $movie_lang, $movie_showtime, $movie_showtime_arrsplit[0], $movie_showtime_arrsplit[1]);
      $showtimes[] = $showtime_to_add;

      $s++;
      if($s==50) break;
    }
    $m++;
    if($s==50) break;
    if($m==20) break;
  }
  $t++;
  if($s==50) break;
  if($m==20) break;
  if($t==10) break;
}

function build_sorter($key) {
  return function ($a, $b) use ($key) {
    return strnatcmp($a[$key], $b[$key]);
  };
}
usort($showtimes, build_sorter('4'));

$_SESSION["showtimes"] = $showtimes;

// echo $t." cinémas, ".$m." films, et ".$s." séances."."<br />";
// echo $date_hour." heures et ".$date_minutes." minutes.";

// clean up memory
$html->clear();
