<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <title><?= $title ?></title>
  <? if(USE_RESETCSS){ ?>
    <link rel="stylesheet" href="<?= URL ?>src/css/reset.min.css">
  <? } if(USE_BOOTSTRAP){ ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <? } if(USE_EMBEBJS){ ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/embed.js/3.6.2/embed.min.css">
  <? } ?>
  <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
</head>

<body class="page-<?= $class ?>">
  <header>
    <h1>Mon site</h1>

    <nav>
      <a href="<?= URL ?>">Home</a>
      <a href="<?= URL ?>about">About</a>
      <a href="<?= URL ?>news">News</a>
      <br>
      <a href="<?= URL ?>news/article-1/">Article 1</a>
      <a href="<?= URL ?>news/article-2/">Article 2</a>
    </nav>
  </header>