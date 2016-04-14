<div class="container">
    
    <div id="results_list">

<?php 
	foreach ($query_results as $q_r) { 
		$q_r_curl = curl_init();
        curl_setopt($q_r_curl, CURLOPT_URL, 'http://api.themoviedb.org/3/search/movie?api_key=de6bcf23cd6c5009fd4ed90bc5127c45&query='.urlencode($q_r).'&primary_release_year='.$year);
        curl_setopt($q_r_curl, CURLOPT_RETURNTRANSFER, true);
        $q_r_array = curl_exec($q_r_curl);
        curl_close($q_r_curl);
        $q_r_array = json_decode($q_r_array); 

        if (empty($q_r_array->results[0])) continue;

        $film = $q_r_array->results[0];
        $filmJson = json_encode($film);
?>
		<div class="movie_card_result" 
            data-title="<?= $film->title ?>"
            data-poster="<?= $film->poster_path ?>"
            data-overview="<?= $film->overview ?>" 
            data-date="<?= $film->release_date ?>"
            data-popularity="<?= $film->popularity ?>">
    		<div class="movie_card_title_result"> <?= $film->title ?> </div>
		</div>
<?php
    }
?>
</div>

<div id="view"></div>
</div>
