<?php session_start();

require 'config/config.php';
require 'config/database.php';

// SEND EMAIL BRUNO & MATHIEU
// require 'controllers/functions/send_email.php';
// send_email_reminder("bruno.simon@hetic.net", "Bruno", "Brad Pitt", "9PM", "http://homely-app.com/myevents");
// send_email_reminder("mathieu.letyrant@gmail.com", "Mathieu", "Brad Pitt", "9PM", "http://homely-app.com/myevents");

// Remove www.
if(preg_match('/^www./', $_SERVER['HTTP_HOST'])){
  header('Location: http://homely-app.com'.$_SERVER['REQUEST_URI']);
}

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