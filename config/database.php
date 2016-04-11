<?php

define('DB_HOST','178.79.169.213');
define('DB_NAME','megaprem_homely');
define('DB_USER','megaprem_homely');
define('DB_PASS','LvsdvwZE*F?a');

try
{
  // Try to connect to database
  $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

  // Set fetch mode to object
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
  // Failed to connect
  die('Could not connect');
}