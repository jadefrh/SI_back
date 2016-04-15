<div class="content">
  <div class="container">
    <div class="left panel pad">
      <div class="search">
        <h3 id="recherche">50 Séances autour de "<span id="zipcode-result">91300</span>"</h3>
      </div>
      <div class="results-view">
        <?php
        $i = 0;
        foreach ($_SESSION["showtimes"] as $i => $_showtime) {
          $q_r_curl = curl_init();
          curl_setopt($q_r_curl, CURLOPT_URL, 'http://api.themoviedb.org/3/search/movie?api_key=de6bcf23cd6c5009fd4ed90bc5127c45&query='.urlencode($_SESSION["showtimes"][$i][0]).'&primary_release_year='.$year);
          curl_setopt($q_r_curl, CURLOPT_RETURNTRANSFER, true);
          $q_r_array = curl_exec($q_r_curl);
          curl_close($q_r_curl);
          $q_r_array = json_decode($q_r_array);

          if (empty($q_r_array->results[0])) continue;

          $film = $q_r_array->results[0];
          $filmJson = json_encode($film);
          ?>
          <div class="results movie_card_result"
          data-title="<?= $film->title ?>"
          data-poster="<?= $film->poster_path ?>"
          data-backdrop="<?= $film->backdrop_path ?>"
          data-overview="<?= $film->overview ?>"
          data-date="<?= $film->release_date ?>"
          data-popularity="<?= $film->popularity ?>"
          style="background: url(http://image.tmdb.org/t/p/w500/<?=$film->backdrop_path?>) no-repeat; background-size: 100%;">
          <div class="overlay"></div>
          <div class="movie-title"><?= truncate($film->title) ?></div>
          <div class="cinema-title"><?= $_SESSION["showtimes"][$i][1] ?></div>
          <div class="time-title">À <span style="color: #E6DA3A;"><?= $_SESSION["showtimes"][$i][5]."h".$_SESSION["showtimes"][$i][6] ?></span></div>
        </div>
        <?php
        $i++;
      }
      ?>
    </div>
  </div>
  <div class="right panel" id="view">
    <div class="movie">
      <img class="poster" src="src/images/kfposter.png" alt="kung fu panda 3">
      <div class="text-area">
        <h3 class="movie-title">KUNG FU PANDA 3</h3>
        <p class="movie-data">Date de sortie: 30 mars 2016</p>
        <p class="movie-popularity">Popularité : </p>
      </div>
      <p class="synopsis">
        Ratchet et Clank unissent leur force, intelligence et courage pour lutter contre le maléfique Drek qui veut détruire la galaxie. Avec l’aide des Rangers Galactiques ils vont se lancer dans une aventure spectaculaire ! Ce duo de choc est basé sur la franchise des jeux vidéo Ratchet & Clank de Sony, qui a été écoulée à plus de 13 millions d’exemplaires à travers le monde. Ce duo de choc est basé sur la franchise des jeux vidéo Ratchet & Clank de Sony, qui a été écoulée à plus de 13 millions d’exemplaires à travers le monde.
        Ce duo de choc est basé sur la franchise des jeux vidéo Ratchet & Clank de Sony, qui a été écoulée à plus de 13 millions.
      </p>
    </div>
    <div class="cinema">
      <h3 class="movie-cinename">UGC Ciné Cité Rosny</h3>
      <h3 class="movie-cineadress">16 Rue Conrad Adenauer, 93110 Rosny-sous-Bois</h3>
      <a href="<? URL ?>buy"><h3 style="text-decoration: underline;">Réserver </h3></a>
      <a href="<? URL?>routes" id="routes-link"><h3 style="text-decoration: underline;">Accèder à l'itinéraire</h3></a>
      <iframe class="maps-frame" style="border: none; width: 100%; height: 225px; margin-left: auto; margin-right: auto;" src="https://www.google.com/maps/embed/v1/place?q=Harrods,Brompton%20Rd,%20UK&zoom=17&key=AIzaSyBEctbGttoe3FU3tn_wbHpZaiw_j_SKNc0"></iframe>
    </div>
  </div>
