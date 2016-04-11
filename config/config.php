<?php

// DEFINE API KEYS
define('GOOGLE_API_KEY', 'AIzaSyDWr3LNmFyHsaRslYyIq7RcByVbpkeaRT8');

// DEFINE RESSOURCES
define('USE_RESETCSS', false);
define('USE_BOOTSTRAP', false);
define('USE_JQUERY', false);
define('USE_SCROLLREVEAL', false); // https://github.com/jlmakes/scrollreveal.js
define('USE_EMBEBJS', false); // https://embedjs.readme.io

// DEFINE URL AUTOMATICALLY
$file = "config/url.txt";
$url = file_get_contents($file);
$actual_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if(empty($_GET['q']) && ($url != $actual_url)){
  file_put_contents($file, $actual_url);
  $url = $actual_url;
}

define('URL', $url);