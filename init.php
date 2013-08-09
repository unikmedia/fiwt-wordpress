<?php   
    /* 
    Plugin Name: Fill it with tweets (fiwt)
    Plugin URI: http://www.unikmedia.ca 
    Description: Plugin for displaying tweets and interact with it
    Author: Mike Boutin (DWboutin)
    Version: 1.0 
    Author URI: http://www.unikmedia.ca 
    */  
    
// the admin page
    function fiwt_admin(){
    	include('fiwt_admin.php'); 
    }
// the documentation page
    function fiwt_doc(){
    	include('fiwt_doc.php'); 
    }
// add the admin page
    function fiwt_admin_actions(){
    	add_menu_page("Fill it with tweets", "Fill it with tweets", 1, "fiwt", "fiwt_admin");
		add_submenu_page("fiwt", "FIWT Documentation", 'Documentation', 1, 'fiwt-documentation','fiwt_doc');
    }
    add_action('admin_menu', 'fiwt_admin_actions'); 
	
// Add the scripts
	function add_these_scripts(){
		/*wp_enqueue_script('jQuery', WP_CONTENT_URL . '/plugins/fiwt/js/jquery.js');
		wp_enqueue_script('handlebars', WP_CONTENT_URL . '/plugins/fiwt/js/handlebars.js', array('jQuery'));
		wp_enqueue_script('timeago', WP_CONTENT_URL . '/plugins/fiwt/js/jquery.timeago.js', array('jQuery'));
		wp_enqueue_script('twitterFeed', WP_CONTENT_URL . '/plugins/fiwt/js/twitterFeed.js', array('jQuery','handlebars','timeago'));
		wp_enqueue_script('fiwt_init', WP_CONTENT_URL . '/plugins/fiwt/js/init_script.php', array('jQuery','handlebars','timeago','twitterFeed'));	*/
	?>
		<script id="fiwtTemplate" type="text/x-handlebars-template">
			<?php echo stripcslashes(get_option('fiwt_template')); ?>
		</script>
	<?php
		wp_enqueue_script('handlebars', WP_CONTENT_URL . '/plugins/fiwt/js/handlebars.js');
		wp_enqueue_script('timeago', WP_CONTENT_URL . '/plugins/fiwt/js/jquery.timeago.js');
		wp_enqueue_script('twitterFeed', WP_CONTENT_URL . '/plugins/fiwt/js/twitterFeed.js', array('handlebars','timeago'));
		wp_enqueue_script('fiwt_init', WP_CONTENT_URL . '/plugins/fiwt/js/init_script.php', array('handlebars','timeago','twitterFeed'));
	}
	add_action('wp_footer', 'add_these_scripts');