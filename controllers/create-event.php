<?php
  	$title = 'Homely';
  	$class = 'create-event';

	$errors = array();

	if(!empty($_POST))
	{
		$date 	= date($_POST['date']);
		$time 	= $_POST['time'];
		$owner 	= $_SESSION['user']['id'];
		$place	= $_POST['place'];
		$desc 	= $_POST['desc'];
		$movies = $_POST['movies'];

		if(isset($_POST['vote']))
		{
			if($_POST['vote'] == 'true'){
				$vote = 1;
			}
			else
			{
				$vote = 0;
			}
		}
		else
		{
			$vote = 0;
		}

		if(empty($time))
		{
			$errors['time'] = 'Please enter an hour';
		}

		if(empty($date))
		{
			$errors['date'] = 'Please enter a date';
		}
		else if($date < date('Y-m-d'))
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
			$prepare = $pdo->prepare('INSERT INTO rooms(owner, day, time, place, description, vote) VALUES (:owner, :day, :time, :place, :description, :vote)');

			$prepare->bindValue('owner', $owner);
			$prepare->bindValue('day', $date);
			$prepare->bindValue('time', $time);
			$prepare->bindValue('place', $place);
			$prepare->bindValue('description', $desc);
			$prepare->bindValue('vote', $vote);

			$prepare->execute();

			$prepare = $pdo->prepare('SELECT * FROM rooms');
			$prepare->execute();
			$query	= $prepare->fetchAll();

			$count = 0;

			print_r('test');

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

