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
   <link rel="stylesheet" href="<?= URL ?>src/css/event-info.css">
   <link rel="stylesheet" href="<?= URL ?>src/css/info-films.css">
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
    <div class="logo">
      <img src="src/images/logo.png" alt="Logo">
    </div>
  </header>