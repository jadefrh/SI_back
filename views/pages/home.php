<div class="content wp">
  <div class="container">
    <h1 class="home-title">
      Les films autour de chez vous<br>
      sont sur Cineto.me
    </h1>
    <div class="zone">
      <div class="left-zone">
        <form action="<?= URL?>results" method="get">
          <input type="text" placeholder="Ex : Montreuil, 13 Rue du Progrès" class='input-style left'>
          <input type="text" placeholder="Inception, Shutter Island, Her..." class='input-style left'>
          <a href="search.html"><button type="submit" name="submit" class='submit-style left'>LANCER LA RECHERCHE</button></a>
        </form>
      </div>
      <div class="middle-zone">
        <img src="src/images/ou.png" alt="ou">
      </div>
      <div class="right-zone">
        <form action="<?= URL?>results" method="get">
          <input type="text" placeholder="Code postal" class='input-style right'>
          <input type="text" id="zipcode" name="zipcode" value="93100" type="hidden">
          <script type="text/javascript">
          window.onload() = function() {
            document.getElementById('zipcode').value = zipcode;
          }
          </script>
          <a href="#"><input type="submit" name="submit" class='submit-style red-b right' value="SÉANCES AUTOUR DE MOI"></a>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<footer>
  <div class="container">
    <div class="partners">
      <div class="home-partners">
        Partenaires<br>Cineto.me
      </div>
      <img class="home-partners-logo" src="src/images/logo_citymapper.png" alt="Citymapper" title="Citymapper">
      <img class="home-partners-logo" src="src/images/logo_gaumont.png" alt="Gaumont" title="Gaumont">
      <img class="home-partners-logo" src="src/images/logo_citymapper.png" alt="Citymapper" title="Citymapper">
      <img class="home-partners-logo" src="src/images/logo_gaumont.png" alt="Gaumont" title="Gaumont">
    </div>
  </div>
</footer>
</form>
</section>
