<?php 

	/*
	 * http://stackoverflow.com/questions/12916539/simplest-php-example-for-retrieving-user-timeline-with-twitter-api-version-1-1/15314662#15314662
	 * 
	 * http://localhost:8888/twitter-feed-plugin/hook.php?username=unik_media&count=1
	 */
	
	if(isset($_REQUEST['username']) && !empty($_REQUEST['username'])) {
	
		require_once 'lib/TwitterAPIExchange.php';
				
		$settings = array(
		    'oauth_access_token' => "189236790-OKgQR0ZcxnN9BD72sAqDBQbHFSyFr6xBKbzbbqq2",
		    'oauth_access_token_secret' => "WsyqXvY4i2D0Gw3Gpg0HC4SsBSiTG2uWWRtxtao6Sg",
		    'consumer_key' => "SFOrkamwC4mP1QUo2n2Dg",
		    'consumer_secret' => "87rYcxYgD1ah7ldCZ1j4Jz6QUjs9Sufmp2ntZ7mY"
		);
				
		$twitter = new TwitterAPIExchange($settings);
		
		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		//$getfield = '?screen_name='.$_POST['screen_name'];
		$getfield = '?screen_name=' . $_REQUEST['username'];
		$getfield .= '&count=' . $_REQUEST['count'];
		
		$requestMethod = 'GET';
		
		echo $twitter->setGetfield($getfield)
						->buildOauth($url, $requestMethod)
						->performRequest();

	}

?>