<?php

if (isset($_POST['user_q'])) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://api.themoviedb.org/3/search/movie?api_key=de6bcf23cd6c5009fd4ed90bc5127c45&query='.urlencode($_POST['user_q']));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    $result = json_decode($result);
    curl_close($curl);

    for ($film = 0; $film < count($result->results); $film++) {
        $wanted_id_movie = $result->results[$film]->id;

        $curl1 = curl_init();
        curl_setopt($curl1, CURLOPT_URL, 'http://api.themoviedb.org/3/movie/'.$wanted_id_movie.'?api_key=de6bcf23cd6c5009fd4ed90bc5127c45');
        curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($curl1);
        curl_close($curl1);
        $result1 = json_decode($result1);
        
    ?>
            <div class="movie_card"> 
            <div class="movie_card_title"><?= $result->results[$film]->title ?></div>
            <div class="movie_card_overview">
              		<?= $result->results[$film]->overview ?>
            </div>
            <div class="movie_card_runtime">
                <?= $result1->runtime .' minutes' ?>
            </div>
          </div>
<?php
    }  
}
?>
