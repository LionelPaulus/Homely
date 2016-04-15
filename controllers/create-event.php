<?php

	if(!isset($_SESSION['user']))
	{
		header('Location:' . URL);
		exit;
	}

	require 'vendor/autoload.php';
	$cache = new Gilbitron\Util\SimpleCache();
	require 'functions/config_tmdb.php';

  	$title = 'Homely';
  	$class = 'create-event';

	$errors = array();

	// ERRORS CHECKING ... 
	if(!empty($_POST))
	{
		$date 	= strtotime($_POST['date'] . " " . $_POST['time']);
		$owner 	= $_SESSION['user']['id'];
		$place	= $_POST['place'];
		$desc 	= $_POST['desc'];

		if(isset($_POST['movies_id']))
		{
			$movies_id = $_POST['movies_id'];
			$movies_type = $_POST['movies_type'];
		}

		if(isset($_POST['vote']))
			$vote = ($_POST['vote'] == true) ? 1 : 0;
		else
		{
			$vote = 0;
		}

		if(empty($movies_id))
		{
			$errors['movies'] = 'Please chose at least one movie';
		}

		if(empty($date))
		{
			$errors['date'] = 'Please enter a date';
		}
		else if(date('Y-m-d', $date) < date('Y-m-d'))
		{
			$errors['date'] = 'Please enter a date greater than today';
		}

		if(empty($place))
		{
			$errors['place'] = 'Please enter an adresss';
		}

		if(empty($desc))
		{
			$errors['desc'] = 'Please enter a description';
		}
		else if(strlen($desc) > 1000)
		{
			$errors['desc'] = 'Your description can\'t exceed 1000 characters';
		}

		// ... END OF ERRORS CHECKING

		if(empty($errors))
		{
			$prepare = $pdo->prepare('INSERT INTO rooms(id, owner, date, place, description, vote, actual_movie) VALUES (:id, :owner, :date, :place, :description, :vote, :actual_movie)');

			$prepare->bindValue('id', uniqid());
			$prepare->bindValue('owner', $owner);
			$prepare->bindValue('date', $date);
			$prepare->bindValue('place', $place);
			$prepare->bindValue('description', $desc);
			$prepare->bindValue('vote', $vote);
			$prepare->bindValue('actual_movie', $movies_id[0]);

			$prepare->execute();

			$prepare = $pdo->prepare('SELECT * FROM rooms');
			$prepare->execute();
			$query	= $prepare->fetchAll();

			$count = 0;

			foreach($query as $_results) // GET LAST ID 
			{
				if($count < $_results->id)
				{
					$count = $_results->id;
				}
			}

			$date 	= '';
			$place	= '';
			$desc 	= '';
			$vote 	= '';
			$time	= '';

			$i = 0;

			foreach($movies_id as $_movie) // FOREACH MOVIE INSERT INTO MOVIE TABL
			{
				$prepare = $pdo->prepare('INSERT INTO movies(event_id, movie_id, movie_type) VALUES (:event, :movie, :movie_type)');
				$prepare->bindValue(':event', $count);
				$prepare->bindValue(':movie', $_movie);
				$prepare->bindValue(':movie_type', $movies_type[$i]);

				$prepare->execute();

				$i++;

			}
			// INESRT OWNER'S PARTICIPATION
			$prepare = $pdo->prepare('INSERT INTO guests(user_id, room_id, participation) VALUES (:user, :room, :participation)');
			$prepare->bindValue(':user', $owner);
			$prepare->bindValue(':room', $count);
			$prepare->bindValue(':participation', '1');

			$prepare->execute();

			$owner 	= '';



			header('Location:' . URL . 'event/' . $count);
			exit;
		}
	}

