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
  	$class = 'info-films';

  	preg_match('/movie\/[0-9|A-z]+/', $q, $match);
  	$id = str_replace('movie/', '', $match[0]);

  	$prepare = $pdo->prepare("SELECT * FROM movies WHERE movie_id = '$id'");
  	$prepare->execute();

  	$query_movie = $prepare->fetchAll();

  	if($query_movie[0]->movie_type == 'movie'){
        $movie = $cache->get_data($id, 'http://api.themoviedb.org/3/movie/' . $id . '?api_key=' . THEMOVIEDB_API_KEY);
        $movie = json_decode($movie);
        $title = $movie->title;
    }
    else
    {
        $movie = $cache->get_data($id, 'http://api.themoviedb.org/3/tv/' . $id . '?api_key=' . THEMOVIEDB_API_KEY);
        $movie = json_decode($movie);
        $title = $movie->name;
    }