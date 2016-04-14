<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cineto.me - <?= $title ?></title>
  <link rel="stylesheet" href="<?= URL ?>src/css/reset.css">
  <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link rel="icon" href="src/images/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body class="page-<?= $class ?>">
  <nav>
    <div class="container">
      <a id="logo" href="<?= URL ?>" title="Cineto.me"></a>
      <ul class="navist left">
        <li><a href="<?= URL ?>results">Recherche</a></li>
        <li><a href="<?= URL ?>showtimes">Seances</a></li>
        <li><a href="<?= URL ?>routes">Itinéraires</a></li>
      </ul>
      <ul class="navist right">
        <li><a href="<?= URL ?>about">A propos</a></li>
        <li><a href="<?= URL ?>legal">Mentions légales</a></li>
      </ul>
    </div>
  </nav>
