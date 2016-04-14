<?php

// DEFINE API KEYS
define('GOOGLE_API_KEY', 'AIzaSyDWr3LNmFyHsaRslYyIq7RcByVbpkeaRT8');
define('THEMOVIEDB_API_KEY', '18e60637716db2e62d06a0e2a8c0f026');

// DEFINE RESSOURCES
define('USE_RESETCSS', true);
define('USE_JQUERY', true);

// DEFINE URL AUTOMATICALLY
$file = "config/url.txt";
$url = file_get_contents($file);
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$actual_url = "http://".$_SERVER['HTTP_HOST'].$uri_parts[0];

if(empty($_GET['q']) && ($url != $actual_url)){
  file_put_contents($file, $actual_url);
  $url = $actual_url;
}

define('URL', $url);