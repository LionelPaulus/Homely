<?php

  require 'vendor/autoload.php';
  $cache = new Gilbitron\Util\SimpleCache();
  require 'functions/config_tmdb.php';
  require 'functions/url_shortener.php';

  $title = 'Homely';
  $class = 'event';

  $errors = array();

  $user = $_SESSION['user']['id'];

  preg_match('/[0-9]+/', $q, $match);
  $id = $match[0];

  $prepare = $pdo->prepare("SELECT * FROM rooms LEFT JOIN users ON rooms.owner = users.id WHERE rooms.id = '$id'");
  $prepare->execute();

  $query = $prepare->fetchAll();

  $prepare = $pdo->prepare("SELECT * FROM guests LEFT JOIN users ON guests.user_id = users.id WHERE guests.room_id = '$id'");
  $prepare->execute();

  $data = $prepare->fetchAll();

  if(!empty($_POST))
  {
  	if($_POST['type'] == 'participation')
  	{
  		if($query[0]->owner != $user){
	  		if($_POST['choice'] == 'true')
	  		{
	  			$prepare = $pdo->prepare("UPDATE guests SET participation = '1' WHERE user_id = '$user' AND guests.room_id = '$id'");
	  			$prepare->execute();

	  			header('Location:'. $_SERVER['REDIRECT_URL']);
	  			exit;
	  		}
	  		else
	  		{
	  			$prepare = $pdo->prepare("UPDATE guests SET participation = '0' WHERE user_id = '$user' AND guests.room_id = '$id'");
	  			$prepare->execute();

	  			header('Location:'. $_SERVER['REDIRECT_URL']);
	  			exit;
	  		}
	  	}
  	}
  }

  $prepare = $pdo->prepare("SELECT * FROM movies LEFT JOIN rooms ON rooms.id = movies.event_id WHERE rooms.id = '$id'");
  $prepare->execute();

  $query_movie = $prepare->fetchAll();


