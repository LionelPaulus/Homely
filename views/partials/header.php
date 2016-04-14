<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <title><?= $title ?></title>
  <? if(USE_RESETCSS){ ?>
    <link rel="stylesheet" href="<?= URL ?>src/css/reset.min.css">
  <? } ?>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,100italic,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="//cdn.muicss.com/mui-0.5.0/css/mui.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?= URL ?>src/css/main.css">
  <link rel="stylesheet" href="<?= URL ?>src/css/info-films.css">
</head>

<body class="page-<?= $class ?>">
  <div class="sidebar">
    <div><a href="<?= URL ?>"><i class="material-icons">home</i>Home</a></div>
    <div><a href="<?= URL ?>myevents"><i class="material-icons">event</i>My movie sessions</a></div>
    <div><a href="<?= URL ?>create-event"><i class="material-icons">add_box</i>Create a movie session</a></div>
    <div><a href="<?= URL ?>settings"><i class="material-icons">settings</i>Settings</a></div>
  </div>
  <header>
    <li id="menuBtn" class="material-icons menuBtn">menu</li>
    <div class="logo">
      <img src="<?= URL ?>src/images/logo.png" alt="Logo">
    </div>
  </header>