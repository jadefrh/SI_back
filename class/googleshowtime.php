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

// Default data printr for Default CURLOPT_URL
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
$showtimes = array();
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
			if (utf8_encode($movie->find('.times text', 0)->plaintext) == "VO st Fr") $movie_lang = 'VOSTFR';
			else $movie_lang = 'VF';

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
		if($m==15) break;
	}
	$t++;
	if($s==50) break;
	if($m==15) break;
	if($t==6) break;
}

function build_sorter($key) {
	return function ($a, $b) use ($key) {
		return strnatcmp($a[$key], $b[$key]);
	};
}
usort($showtimes, build_sorter('4'));

$_SESSION["showtimes"] = $showtimes;

// echo "<pre>";
// var_dump($_SESSION["showtimes"]);
// echo "</pre>";

// echo $t." cinémas, ".$m." films, et ".$s." séances."."<br />";
// echo $date_hour." heures et ".$date_minutes." minutes.";

// clean up memory
$html->clear();
