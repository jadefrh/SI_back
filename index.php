<?php
session_start();
$_SESSION["showtimes"] = $showtimes;
date_default_timezone_set('Europe/Paris');
$date_hour = date('H', time());
$date_minutes = date('i', time());

// Config
include 'config/options.php';
// include 'config/database.php'; // Uncomment if you need database

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];

// Routes
if($q == '')
$page = 'home';
else if($q == 'about')
<<<<<<< Updated upstream
$page = 'about';
else if($q == 'news')
$page = 'news';
=======
	$page = 'about';
else if($q == 'results')
	$page = 'results';
>>>>>>> Stashed changes
else if(preg_match('/^news\/[-a-z0-9]+$/',$q)) // news/mon-titre-d-actualite
$page = 'news-single';
else
$page = '404';

// Includes
include 'controllers/'.$page.'.php';
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';

// Scraping classes
require_once('class/simple_html_dom.php');
require_once('class/googleshowtime.php');

<<<<<<< Updated upstream
// The Movie Database
require_once('class/themoviedb.php');
=======
date_default_timezone_set('Europe/Paris');
$date_hour = date('H', time());
$date_minutes = date('i', time());
echo $date_hour." heures et ".$date_minutes." minutes.";

echo "<pre>";
var_dump($_SESSION["showtimes"]);
echo "</pre>";
?>
>>>>>>> Stashed changes
