<?php

   //Let's set the header straight
   	header('Content-type: text/javascript');

   //Get the WP-specifics, so that we can use constants and what not
   	$home_dir = preg_replace('^wp-content/plugins/[a-z0-9\-/]+^', '', getcwd());
   	include($home_dir . 'wp-load.php');
   
   	$jquery_selector = get_option('fiwt_jquery_selector');
  	$twitter_username = get_option('fiwt_twitter_username');
  	$tweets_count = get_option('fiwt_tweets_count');
  	$loading_message = get_option('fiwt_loading_message');
?>
	$(document).ready(function(){
		$('<?php echo $jquery_selector ?>').fillItWithTweets({
			template: '#fiwtTemplate',
			username: '<?php echo $twitter_username ?>', 
			container: '<?php echo $jquery_selector ?>',
			count: <?php echo $tweets_count ?>,
			messageLoading: '<?php echo $loading_message ?>',
			hookUrl: '<?php echo WP_CONTENT_URL . '/plugins/fiwt/hook.php' ?>',
			beforeRender: function(){
				console.log('before');
			},
			afterRender: function(){
			// pour faire apparaitre les tweets apres le load des images
				$('<?php echo $jquery_selector ?>').children().on({
					'load': function(){
						$('<?php echo $jquery_selector ?>').children().each(function(){
							$(this).delay($(this).index() * 50).fadeIn(700);
						});	
					}
				});
				
			}
		});
	});