<?php
session_start();
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
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://www.google.fr/movies?near=montreuil'); // Default CURLOPT_URL - near Montreuil
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
$str = curl_exec($curl);
curl_close($curl);

$html = str_get_html($str);

// Default data printr for Defaut CURLOPT_URL
// print '<pre>';
// foreach($html->find('#movie_results .theater') as $div) {
//   // print theater and address info
//   print "Cinéma:  ".$div->find('h2 a',0)->innertext."\n";
//   print "Adresse: ". $div->find('.info',0)->innertext."\n";
//
//   // print all the movies with showtimes
//   foreach($div->find('.movie') as $movie) {
//     print "Film:    ".$movie->find('.name a',0)->innertext.'<br />';
//     print "Horaire:    ".$movie->find('.times',0)->innertext.'<br />';
//   }
//   print "\n\n";
// }


// Tentative data printr for our application
// print '<pre>';
// print 'AFFICHAGE PAR SEANCE :'.'<br /><br />';
$showtimes = array();
$t = 0;
foreach ($html->find('#movie_results .theater') as $div) {
  foreach ($div->find('.movie') as $movie) {
    $i = 0;
    foreach ($movie->find('.times > span[style="color:"]') as $showtime) {
      $movie_name             = utf8_encode($movie->find('.name > a', 0)->innertext);
      $movie_theater          = utf8_encode($div->find('h2 > a', 0)->innertext);
      $movie_address          = utf8_encode($div->find('.info',0)->innertext);
      $movie_lang             = utf8_encode($movie->find('.times text', 0)->plaintext);

      if ($movie_lang !== "VO st Fr") {
        $movie_lang = 'VF';
      } else {
        $movie_lang = "VOSTFR";
      }
      $movie_showtime_raw     = preg_replace('/<span[^>]*>([\s\S]*?)<\/span[^>]*>/', '', $showtime->innertext); // strips the showtime from its useless <span> tag
      $movie_showtime_decoded = explode(':', $movie_showtime_raw); // splits the showtime in 2 (hour | minutes) in 24h format
      $movie_showtime         = $movie_showtime_decoded[0].":".$movie_showtime_decoded[1]; // binds the showtime together

      $showtime_to_add = array($movie_name, $movie_theater, $movie_address, $movie_lang, $movie_showtime);
      $showtimes[] = $showtime_to_add;

      $i++;
      $t++;
      if($i==1) break;
    }
    if($t==50) break;
    print "\n\n";
  }
  if($t==50) break;
}

$_SESSION["showtimes"] = $showtimes;

// echo "<pre>";
// var_dump($showtimes);
// echo "</pre>";

// echo "TOTAL : ".$t." séances.";

// clean up memory
$html->clear();
