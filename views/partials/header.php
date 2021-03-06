<?php
function truncate($string,$length=18,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cineto.me - <?= $title ?></title>
  <!-- <link rel="stylesheet" href="<?= URL ?>src/css/reset.css"> -->
  <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700,900,700italic,900italic,600italic,400italic,300italic,200italic,200' rel='stylesheet' type='text/css'>
  <link rel="icon" href="src/images/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body class="page-<?= $class ?>">
  <nav>
    <div class="container">
      <a id="logo" href="<?= URL ?>" title="Cineto.me"></a>
      <ul class="navist left">
        <li <?php if ($class =="") {?>class="active"<?php } ?>><a href="<?= URL ?>results">Recherche</a></li>
        <li <?php if ($class =="results") {?>class="active"<?php } ?>><a href="<?= URL ?>showtimes">Seances</a></li>
        <li <?php if ($class =="routes") {?>class="active"<?php } ?>><a href="<?= URL ?>routes">Itinéraires</a></li>
      </ul>
      <ul class="navist right">
        <li <?php if ($class =="about") {?>class="active"<?php } ?>><a href="<?= URL ?>about">A propos</a></li>
        <li <?php if ($class =="aide") {?>class="active"<?php } ?>><a href="<?= URL ?>aide">Aide</a></li>
      </ul>
    </div>
  </nav>
