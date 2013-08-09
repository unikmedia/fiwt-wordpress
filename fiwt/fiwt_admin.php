<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Fill it with tweets <small>configurations</small></h2>
	<br /><br />
	
	<?php 
		if($_POST['fiwt_hidden'] == 'Y'):
			
			$access_token = $_POST['fiwt_access_token'];  
        	update_option('fiwt_access_token', $access_token);  
			
			$access_token_secret = $_POST['fiwt_access_token_secret'];  
        	update_option('fiwt_access_token_secret', $access_token_secret);  
			
			$consumer_key = $_POST['fiwt_consumer_key'];  
        	update_option('fiwt_consumer_key', $consumer_key);  
			
			$consumer_secret = $_POST['fiwt_consumer_secret'];  
        	update_option('fiwt_consumer_secret', $consumer_secret);
			
			$jquery_selector = $_POST['fiwt_jquery_selector'];
			update_option('fiwt_jquery_selector', $jquery_selector);
			
			$twitter_username = $_POST['fiwt_twitter_username'];
			update_option('fiwt_twitter_username', $twitter_username);
			
			$tweets_count = $_POST['fiwt_tweets_count'];
			update_option('fiwt_tweets_count', $tweets_count);
			
			$loading_message = $_POST['fiwt_loading_message'];
			update_option('fiwt_loading_message', $loading_message);
			
			$template = $_POST['templateFiwt'];
			
			update_option('fiwt_template', $template);
	?>
		<div class="updated"><p><strong><?php _e('Configurations saved.' ); ?></strong></div>
	<?php
		endif;
			  
			  $access_token = get_option('fiwt_access_token');  
			  $access_token_secret = get_option('fiwt_access_token_secret');  
			  $consumer_key = get_option('fiwt_consumer_key');  
			  $consumer_secret = get_option('fiwt_consumer_secret');  
			  $jquery_selector = get_option('fiwt_jquery_selector');
			  $twitter_username = get_option('fiwt_twitter_username');
			  $tweets_count = get_option('fiwt_tweets_count');
			  $loading_message = get_option('fiwt_loading_message');
			  $template = stripcslashes(get_option('fiwt_template'));
	?>
	
	<form name="fiwt_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="fiwt_hidden" value="Y">
		
		<?php echo "<h2>" . __('Twitter Api Settings', 'fiwt_trdom') . "</h2>"; ?>
			<p><?php _e("Access token: "); ?><input type="text" name="fiwt_access_token" value="<?php echo $access_token; ?>"></p>
			<p><?php _e("Access token secret: "); ?><input type="text" name="fiwt_access_token_secret" value="<?php echo $access_token_secret; ?>"></p>
			<p><?php _e("Consumer key: "); ?><input type="text" name="fiwt_consumer_key" value="<?php echo $consumer_key; ?>"></p>
			<p><?php _e("Consumer secret: "); ?><input type="text" name="fiwt_consumer_secret" value="<?php echo $consumer_secret; ?>"></p>
			<br /><br />
			<?php echo "<h2>" . __('Frontend informations', 'fiwt_trdom') . "</h2>"; ?>
			<p><?php _e("jQuery Selector (it's the container of the tweets): "); ?><input type="text" name="fiwt_jquery_selector" value="<?php echo $jquery_selector; ?>"></p>
			<p><?php _e("Twitter username: "); ?><input type="text" name="fiwt_twitter_username" value="<?php echo $twitter_username; ?>"></p>
			<p><?php _e("Tweets count: "); ?><input type="text" name="fiwt_tweets_count" value="<?php echo $tweets_count; ?>"></p>
			<p><?php _e("Loading message: "); ?><input type="text" name="fiwt_loading_message" value="<?php echo $loading_message; ?>"></p>
			<br /><br />
			<h2><?php _e("Template code: (don't click on visual)"); ?></h2>
			<p>
			<?php 
			
				$settings = array(
					'wpautop' => false,
				    'quicktags' => true
				);
				wp_editor($template, 'templateFiwt', $settings); 
				
			?>
			</p>
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'fiwt_trdom' ) ?>" />
		</p>
	</form>
	
</div>
