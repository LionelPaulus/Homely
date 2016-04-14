<?php session_start();

require 'config/config.php';
require 'config/database.php';

$q = empty($_GET['q']) ? '' : $_GET['q'];

if($q == '')
  $page = 'home';
else if($q == 'create-event')
  $page = 'create-event';
else if($q =='myevents')
	$page='myevents';
else if(preg_match('/^movie\/[-a-z0-9]+$/',$q))
	$page='movie';
else if(preg_match('/^event\/[-a-z0-9]+$/',$q))
	$page = 'event';
else
  $page = '404';

require 'controllers/'.$page.'.php';
require 'views/partials/header.php';
require 'views/pages/'.$page.'.php';
require 'views/partials/footer.php';