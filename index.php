<?php
session_start();
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
	$page = 'about';
else if($q == 'showtimes')
  $page = 'showtimes';
else if($q == 'routes')
  $page = 'routes';
else if($q == 'results')
	$page = 'results';
else if($q == 'aide')
  $page = 'aide';
else if($q == 'results')
	$page = 'results';
else if($q == 'buy')
	$page = 'buy';
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


date_default_timezone_set('Europe/Paris');
$date_hour = date('H', time());
$date_minutes = date('i', time());
// echo $date_hour." heures et ".$date_minutes." minutes.";

// echo "<pre>";
// var_dump($_SESSION["showtimes"]);
// echo "</pre>";
