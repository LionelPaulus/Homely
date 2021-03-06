<?php

  require 'vendor/autoload.php';
  $cache = new Gilbitron\Util\SimpleCache();
  require 'functions/config_tmdb.php';
  require 'functions/url_shortener.php';

  preg_match('/event\/[0-9|A-z]+/', $q, $match);
  $id = str_replace('event/', '', $match[0]);

  $title = 'Homely';
  $class = 'event';

  $errors = array();

  $actual = 0;

  if(isset($_SESSION['user']))
    $user = $_SESSION['user']['id'];
  else
    $user = 0;


  $prepare = $pdo->prepare("SELECT * FROM rooms LEFT JOIN users ON rooms.owner = users.id WHERE rooms.id = '$id'");
  $prepare->execute();

  $query = $prepare->fetchAll();

  $prepare = $pdo->prepare("SELECT * FROM guests LEFT JOIN users ON guests.user_id = users.id WHERE guests.room_id = '$id'");
  $prepare->execute();

  $data = $prepare->fetchAll();

  $prepare = $pdo->prepare("SELECT * FROM movies LEFT JOIN rooms ON rooms.id = movies.event_id WHERE rooms.id = '$id'");
  $prepare->execute();

  $query_movie = $prepare->fetchAll();


  $prepare = $pdo->prepare("SELECT * FROM votes WHERE event = '$id'");
  $prepare->execute();

  $query_vote = $prepare->fetchAll();

  if(!empty($_POST))
  {
  	if($_POST['type'] == 'participation')
  	{
      if(empty($user)){
        setcookie("redirect", $id, time()+3600, '/');

        header('Location: '.URL);
        exit;
      }
  		if($query[0]->owner != $user){
	  		if($_POST['choice'] == 'true')
	  		{
          foreach($data as $_data){
            if($_data->user_id == $user)
            {

            $participation = 1;
            $prepare = $pdo->prepare("UPDATE guests SET participation = '1' WHERE user_id = '$user' AND guests.room_id = '$id'");
            $prepare->execute();

            header('Location:'. $_SERVER['REDIRECT_URL']);
            exit;
            }
          }

          if(empty($participation))
          {
            $prepare = $pdo->prepare("INSERT INTO guests(user_id, room_id, participation) VALUES (:user_id, :room_id, :participation)");
            $prepare->bindValue('user_id', $user);
            $prepare->bindValue('room_id', $id);
            $prepare->bindValue('participation', 1);
            $prepare->execute();

            header('Location:'. $_SERVER['REDIRECT_URL']);
            exit;
          }
	  		}
	  		else
	  		{
          if(!empty($data)){
            $prepare = $pdo->prepare("UPDATE guests SET participation = '0' WHERE user_id = '$user' AND guests.room_id = '$id'");
            $prepare->execute();

            header('Location:'. $_SERVER['REDIRECT_URL']);
            exit;
          }else{
            $prepare = $pdo->prepare("INSERT INTO guests(user_id, room_id, participation) VALUES (:user_id, :room_id, :participation)");
            $prepare->bindValue('user_id', $user);
            $prepare->bindValue('room_id', $id);
            $prepare->bindValue('participation', 0);
            $prepare->execute();

            header('Location:'. $_SERVER['REDIRECT_URL']);
            exit;
          }
	  		}
	  	}
  	}
  	else if($_POST['type'] == 'vote')
  	{
      if(isset($_SESSION['user']))
      {
    		$movieId = $_POST['whichMovie'];

    		$prepare = $pdo->prepare("SELECT * FROM votes WHERE event = '$id' AND movie = '$movieId'");
    		$prepare->execute();
    		$vote_data = $prepare->fetchAll();

    		if((count($vote_data)+1) >= $_POST['max'])
    		{
    			$prepare = $pdo->prepare("UPDATE rooms SET actual_movie = '$movieId' WHERE id = '$id'");
    			$prepare->execute();
    		}

    		$prepare = $pdo->prepare("DELETE FROM votes WHERE event = '$id' AND user = '$user'");
  	  	$prepare->execute();

    		$prepare = $pdo->prepare("INSERT INTO votes(event, movie, user) VALUES (:event, :movie, :user)");
    		$prepare->bindValue('event', $id);
    		$prepare->bindValue('movie', $movieId);
    		$prepare->bindValue('user', $user);

  	  	$prepare->execute();

  	  	header('Location:'. $_SERVER['REDIRECT_URL'] . '#' . $movieId);
  	  	exit;
      }
  	}
  	else if($_POST['type'] == 'remove')
  	{
  		$prepare = $pdo->prepare("DELETE FROM rooms WHERE id = '$id'");
	  	$prepare->execute();

	  	$prepare = $pdo->prepare("DELETE FROM votes WHERE event = '$id'");
	  	$prepare->execute();

	  	$prepare = $pdo->prepare("DELETE FROM movies WHERE event_id = '$id'");
	  	$prepare->execute();

	  	$prepare = $pdo->prepare("DELETE FROM guests WHERE room_id = '$id'");
	  	$prepare->execute();

	  	header('Location:' . URL);
	  	exit;
  	}
  	else if($_POST['type'] == 'update')
  	{
  		$movies_id = $_POST['movies_id'];
		  $movies_type = $_POST['movies_type'];

		  $i = 0;

		  $prepare = $pdo->prepare("DELETE FROM movies WHERE event_id = '$id'");
		  $prepare->execute();

  		foreach($movies_id as $_movie)
  		{
  			$prepare = $pdo->prepare("INSERT INTO movies(event_id, movie_id, movie_type) VALUES (:event, :movie, :type)");
  	  	$prepare->bindValue('event', $id);
  	  	$prepare->bindValue('movie', $_movie);
  	  	$prepare->bindValue('type', $movies_type[$i]);


  		  $prepare->execute();
  		}

      header('Location:'. $_SERVER['REDIRECT_URL']);
      exit;
  	}
    else if($_POST['type'] == 'triggerVote')
    {
      if($_POST['vote'] == 'off')
      {
        $prepare = $pdo->prepare("UPDATE rooms SET vote = '1' WHERE id = '$id'");
        $prepare->execute();
      }
      else
      {
        $prepare = $pdo->prepare("UPDATE rooms SET vote = '0' WHERE id = '$id'");
        $prepare->execute();
      }

      header('Location:'. $_SERVER['REDIRECT_URL']);
      exit;
    }
  }