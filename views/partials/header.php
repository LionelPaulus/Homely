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
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,100italic,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="import" href="https://www.polymer-project.org/0.5/components/paper-ripple/paper-ripple.html">
  <link rel="stylesheet" href="<?= URL ?>src/css/main.css">
</head>

<body class="page-<?= $class ?>">
  <div class="sidebar">
    <div><i class="material-icons">inbox</i><span class="link-name">Inbox</span></div>
    <div><i class="material-icons">settings_system_daydream</i>System Info</div>
    <div><i class="material-icons">cloud</i>Cloud</div>
    <div><i class="material-icons">settings</i>Settings</div>
    <nav>
      <ul>
        <li><i class="material-icons">home</i>Home</li>
      </ul>
    </nav>
  </div>
  <header>
    <li id="menuBtn" class="material-icons menuBtn">menu</li>
    <img src="src/images/logo.png" class="logo" alt="Logo">
  </header>