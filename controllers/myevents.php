<?php

	require 'vendor/autoload.php';
	$cache = new Gilbitron\Util\SimpleCache();
	require 'functions/config_tmdb.php';

	$title = 'Homely';
	$class = 'myevents';

	$id = $_SESSION['user']['id'];

	$prepare = $pdo->prepare("SELECT * FROM rooms LEFT JOIN guests ON rooms.id = guests.room_id WHERE rooms.owner = '$id' OR user_id = '$id' ORDER BY day DESC");
	$prepare->execute();

	$query = $prepare->fetchAll();
