<div class="content">
  <div class="container">
    <div class="left panel pad">
      <div class="search">
        <h3 id="recherche">50 Séances autour de "<?= $_GET["zipcode"]?>"</h3>
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
          data-popularity="<?= $film->popularity ?>">
          <div class="overlay">
            <div class="movie-title"><?= $film->title ?></div>
            <div class="cinema-title"><?= $_SESSION["showtimes"][$i][1] ?></div>
            <div class="time-title">A <span style="color: #E6DA3A;"><?= $_SESSION["showtimes"][$i][5]."h".$_SESSION["showtimes"][$i][5] ?></span></div>
          </div>
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
        <p class="movie-data">Date de sortie: 30 mars 2016 <br> Genres: Animation, Aventure, Comédie <br> Casting: Leo, Gauthier, Seb, Jade, Bilal</p>
      </div>
      <p class="synopsis">
        Ratchet et Clank unissent leur force, intelligence et courage pour lutter contre le maléfique Drek qui veut détruire la galaxie. Avec l’aide des Rangers Galactiques ils vont se lancer dans une aventure spectaculaire ! Ce duo de choc est basé sur la franchise des jeux vidéo Ratchet & Clank de Sony, qui a été écoulée à plus de 13 millions d’exemplaires à travers le monde. Ce duo de choc est basé sur la franchise des jeux vidéo Ratchet & Clank de Sony, qui a été écoulée à plus de 13 millions d’exemplaires à travers le monde.
        Ce duo de choc est basé sur la franchise des jeux vidéo Ratchet & Clank de Sony, qui a été écoulée à plus de 13 millions.
      </p>
    </div>
    <div class="cinema">
      <h3 style="text-align: left;">Pathé Beaugrenelle <br> 7 Rue Linois, 75015 Paris</h3>
      <a href="commande.html"><h3 style="text-decoration: underline; text-align: right; right: 0px; position: absolute;">Réserver </h3></a>
      <a href="direction.html"><h3 style="text-decoration: underline; text-align: right; top: 20px; right: 0px; position: absolute;">Accèder à l'itinéraire</h3></a>
      <!-- <iframe class="maps-frame" style="border: none; width: 100%; height: 225px; margin-left: auto; margin-right: auto;" src="https://www.google.com/maps/embed/v1/place?q=Harrods,Brompton%20Rd,%20UK&zoom=17&key=AIzaSyD4iE2xVSpkLLOXoyqT-RuPwURN3ddScAI"></iframe>-->
    </div>
  </div>
<!-- </div> -->
