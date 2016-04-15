<script src="<?= URL ?>src/js/libs/jquery-2.2.0.js"></script>
<script type="text/javascript">
getZip = function(cb) {
  if (document.location.protocol === 'http:' && (navigator.geolocation != null)) {
  return navigator.geolocation.getCurrentPosition(function(pos) {
    var coords, url;
    coords = pos.coords;
    url = "http://nominatim.openstreetmap.org/reverse?format=json&lat=" + coords.latitude + "&lon=" + coords.longitude + "&addressdetails=1";
    return $.ajax({
      url: url,
      dataType: 'jsonp',
      jsonp: 'json_callback',
      cache: true
    }).success(function(data) {
      return cb(data.address.postcode);
    });
  });
  }
};
getZip(function(zipcode){
  console.log("zip code found: " + zipcode);
  document.getElementById('zipcodehidden').value = zipcode;
  document.getElementById('zipcodeinput').value = zipcode;
  document.getElementById('zipcode-result').innertext = zipcode;
  // window.location.href = 'http://sdancermichel.me/cine/routes/';
});
// </script>
<script src="<?= URL ?>src/js/app/script.js"></script>

</body>
</html>
