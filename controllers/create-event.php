<?php
  	$title = 'Homely';
  	$class = 'create-event';

	$errors = array();

	if(!empty($_POST))
	{
		$date 	= strtotime($_POST['date']);
		$time 	= $_POST['time'];
		$owner 	= $_SESSION['user']['id'];
		$place	= $_POST['place'];
		$desc 	= $_POST['desc'];

		if(isset($_POST['movies']))
			$movies = $_POST['movies'];

		if(isset($_POST['vote']))
			$vote = ($_POST['vote'] == true) ? 1 : 0;
		else
		{
			$vote = 0;
		}

		if(empty($time))
		{
			$errors['time'] = 'Please enter an hour';
		}

		if(empty($movies))
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

		if(empty($errors))
		{
			$prepare = $pdo->prepare('INSERT INTO rooms(owner, day, time, place, description, vote, actual_movie) VALUES (:owner, :day, :time, :place, :description, :vote, :actual_movie)');

			$prepare->bindValue('owner', $owner);
			$prepare->bindValue('day', $date);
			$prepare->bindValue('time', $time);
			$prepare->bindValue('place', $place);
			$prepare->bindValue('description', $desc);
			$prepare->bindValue('vote', $vote);
			$prepare->bindValue('actual_movie', $movies[0]);

			$prepare->execute();

			$prepare = $pdo->prepare('SELECT * FROM rooms');
			$prepare->execute();
			$query	= $prepare->fetchAll();

			$count = 0;

			foreach($query as $_results)
			{
				if($count < $_results->id)
				{
					$count = $_results->id;
				}
			}

			$date 	= '';
			$owner 	= '';
			$place	= '';
			$desc 	= '';
			$vote 	= '';
			$time	= '';

			foreach($movies as $_movie)
			{
				$prepare = $pdo->prepare('INSERT INTO movies(event_id, movie_id) VALUES (:event, :movie)');
				$prepare->bindValue(':event', $count);
				$prepare->bindValue(':movie', $_movie);

				$prepare->execute();
			}



			// header('Location:' . URL . 'show/' . $count . '/');
			// exit;
		}
	}

