<?php 

	foreach ($query_results as $q_r) { 
		$q_r_curl = curl_init();
        curl_setopt($q_r_curl, CURLOPT_URL, 'http://api.themoviedb.org/3/search/movie?api_key=de6bcf23cd6c5009fd4ed90bc5127c45&query='.urlencode($q_r).'&primary_release_year='.$year);
        curl_setopt($q_r_curl, CURLOPT_RETURNTRANSFER, true);
        $q_r_array = curl_exec($q_r_curl);
        curl_close($q_r_curl);
        $q_r_array = json_decode($q_r_array); 

        if(isset($q_r_array->results[0]->title)) {?>

			<div class="movie_card_result"> 
        		<div class="movie_card_title_result"> <?= $q_r_array->results[0]->title ?> </div>
        		<div class="movie_card_overview_result"> hello world </div>
			</div>
            <?php }
	}
?>
