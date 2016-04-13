<?php session_start();

require 'config/config.php';
require 'config/database.php';
require 'controllers/functions/url_shortener.php';

$q = empty($_GET['q']) ? '' : $_GET['q'];

if($q == '')
  $page = 'home';
else if($q == 'create-event')
  $page = 'create-event';
else if($q =='myevents')
	$page='myevents';
else if($q =='event-info')
	$page='event-info';
else if($q =='info-films')
	$page='info-films';
else
  $page = '404';

require 'controllers/'.$page.'.php';
require 'views/partials/header.php';
require 'views/pages/'.$page.'.php';
require 'views/partials/footer.php';