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

// Tentative data printr for us
// 1. loop through theaters
//  2. loop through movies
//    3. loop through showtimes
//      4. for each showtime, echo movie's Name, Theater, Address, showtime
print '<pre>';
print 'AFFICHAGE PAR SEANCE :'.'<br /><br />';
$times = array();
foreach ($html->find('#movie_results .theater') as $div) {
  foreach ($div->find('.movie') as $movie) {
    foreach ($movie->find('.times > span[style="color:"]') as $showtime) {
      if (!empty($showtime)) {
        $movie_name     = $movie->find('.name > a', 0)->innertext;
        $movie_theater  = $div->find('h2 > a', 0)->innertext;
        $movie_address  = $div->find('.info',0)->innertext;
        $movie_showtime = preg_replace('/<span[^>]*>([\s\S]*?)<\/span[^>]*>/', '', $showtime->innertext);
        echo $movie_name."<br />".$movie_theater."<br />".$movie_address."<br />".$movie_showtime."<br />";

        // array_push($times, array($movie_name, $movie_theater, $movie_address, $movie_showtime));

        // echo "<pre>";
        // print_r($times);
        // echo "</pre>";
        // print $times;

        // print "Film : ".$movie_name.'<br />';
        // print "Cinéma : ".$movie_theater."<br />";
        // print "Adresse: ".$movie_address."<br />";
        // print "Horaire : ".$movie_showtime.'<br />';


        // print "Film : ".$movie->find('.name > a', 0)->innertext.'<br />';
        // print "Cinéma : ".$div->find('h2 > a', 0)->innertext."<br />";
        // print "Adresse: ".$div->find('.info',0)->innertext."<br />";
        // print "Horaire : ".$showtime->innertext.'<br />';
      }
    }
    print "\n\n";
  }
}

// echo "<pre>";
// print_r($times);
// echo "</pre>";

// clean up memory
$html->clear();
