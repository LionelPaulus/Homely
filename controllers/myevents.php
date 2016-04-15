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
	$class = 'myevents';

	$id = $_SESSION['user']['id'];


	// JOIN ROOMS & GUESTS 
	$prepare = $pdo->prepare("SELECT * FROM rooms LEFT JOIN guests ON rooms.id = guests.room_id LEFT JOIN movies ON rooms.actual_movie = movies.movie_id WHERE rooms.owner = '$id' OR user_id = '$id' ORDER BY date DESC");
	$prepare->execute();

	$query = $prepare->fetchAll();

	echo '<pre>';
	print_r($query);
	echo '</pre>';

	$rooms = array();

	foreach($query as $_result) // GET ALL ROOM ID ABOUT SESSION USER
	{
		array_push($rooms, $_result->id);
	}

	$rooms = implode(',', $rooms);

	// JOIN USERS & GUESTS

	$prepare = $pdo->prepare("SELECT * FROM users LEFT JOIN guests ON users.id = guests.user_id WHERE room_id IN ($rooms)");
	$prepare->execute();

	$data = $prepare->fetchAll();