<?php

$title = 'Movies Screenings';
$class = 'home';
$result = array();
$user_q = null;

if (isset($_POST['user_q'])) {
	$user_q = $_POST['user_q'];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://api.themoviedb.org/3/search/movie?api_key=de6bcf23cd6c5009fd4ed90bc5127c45&query='.urlencode($user_q));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    $result = json_decode($result);
    curl_close($curl);
}
