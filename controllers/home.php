<?php
  	require_once dirname(__DIR__) . '/vendor/autoload.php';

  	$class = "home";
  	$title = 'Homely';

	$fb = new Facebook\Facebook([
	  'app_id' => '984573141638694',
	  'app_secret' => 'f766ca0e588e54e1f06759832f0a7788',
	  'default_graph_version' => 'v2.4',
	  ]);
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; // Optional

	$idE = 'essaye';

	try {
		if (isset($_SESSION['facebook_access_token'])) {
			$accessToken = $_SESSION['facebook_access_token'];
		} else {
	  		$accessToken = $helper->getAccessToken();
		}
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	 	// When Graph returns an error
	 	echo 'Graph returned an error: ' . $e->getMessage();
	  	exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	 	// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  	exit;
	}

	if (isset($accessToken)) {
		if (isset($_SESSION['facebook_access_token'])) {
			$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
		} else {
			// Getting short-lived access token
			$_SESSION['facebook_access_token'] = (string) $accessToken;
		  	// OAuth 2.0 client handler
			$oAuth2Client = $fb->getOAuth2Client();
			// Exchanges a short-lived access token for a long-lived one
			$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
			$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
			// Setting default access token to be used in script
			$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
		}
		// Redirect the user back to the same page if it has "code" GET variable
		if (isset($_GET['code'])) {
			header('Location: ./');
		}
		// Getting basic info about user
		try {
			$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
			$profile = $profile_request->getGraphNode()->asArray();
			$profile_picture_request = $fb->get( '/me/picture?type=large&height=200&width=200&redirect=false' );
			$picture = $profile_picture_request->getGraphNode()->asArray();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			session_destroy();
			// 4edirecting user back to app login page
			header("Location: ./");
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		$prepare = $pdo->prepare('SELECT * FROM WHERE id = $id ');
		$prepare->execute();
		$query = $prepare->fetchAll();

		if(empty($query)){
			$prepare = $pdo->prepare('INSERT INTO users(id, first_name, last_name, email, picture) VALUES (:id, :first_name, :last_name, :email, :picture)');
			$prepare->bindValue('id', $profile['id']);
			$prepare->bindValue('first_name', $profile['first_name']);
			$prepare->bindValue('last_name', $profile['last_name']);
			$prepare->bindValue('email', $profile['email']);
			$prepare->bindValue('picture', $picture['url']);

			$prepare->execute();
		}

		$_SESSION['user']['name'] = $profile['first_name'] . ' ' . $profile['last_name'];
		$_SESSION['user']['id'] = $profile['id'];

		if(!isset($idE) || $idE = 0)
		{
			header('Location: myevents');
			exit;
		}
		else
		{
			$idmov = $_SESSION['redirect'];
			
			header('Location: event/' . $idmov);
			exit;
		}

	}
	else
	{
		// Redirection link
		$loginUrl = $helper->getLoginUrl(URL, $permissions);
	}