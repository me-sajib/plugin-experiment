<?php 

	/**
	 * Plugin Name: f-plugin
	 * Plugin URI: https://www.pluginbazar.com
	 * Description: This is first test plugin develop by sajib.
	 * version: 1.0
	 * Author: sajib
	 * Author URI: https://www.sajib.com
	 * License: GPL2
	 */
	 
	 if( !defined("ABSPATH") ) exit;
	 
	 if(is_admin()){
		 require_once dirname(__FILE__) ."/includes/admin/profile.php";
	 }
	 
	 /**
	 * Print Seo tag in the header
	 * @return void
	 */
	 function fplugin_seo_tag(){
		 ?>
		 <meta name="description" content="sajib | web application developer"/>
		 <meta name="keyword" content="php, javascript, jquery, wordpress, twitter"/>
		 <?php
	 }
	 
	 add_action("wp_head", "fplugin_seo_tag");
	 
	
	function fplugin_author_bio($content){
		global $post;
		
		$author = get_user_by("id", $post->post_author);
		$bio = get_user_meta($author->ID, "description", true);
		$facebook = get_user_meta($author->ID, "facebook", true);
		$linkedin = get_user_meta($author->ID, "linkedin", true);
		ob_start();
		?>
		
		<p>Facebook: <?php echo $facebook; ?> </P>
		<p>
		<span><?php echo get_avatar($author->ID, 64);?></span>
		<span><?php echo $author->display_name;?> </span></p>
		<p><?php echo wpautop(wp_kses_post($bio));?>	 </p>
		<?php 
		$bioData = ob_get_clean();
		
		return $content. $bioData;
	}
	
	add_filter("the_content", "fplugin_author_bio");
	  
	  