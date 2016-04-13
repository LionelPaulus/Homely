<?php
	$config = $cache->get_data('config', 'http://api.themoviedb.org/3/configuration?api_key=52b219f9c6d4de9c68f38eb1bcb73a8f');
	$config = json_decode($config, true);
