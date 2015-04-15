<?php 

	function getResources()
	{
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css');
		wp_enqueue_style('style', get_stylesheet_uri());
	}

	function myajax_getMusic()
	{ 
		$songID = $_POST['songID'];
		$attachment = get_post($songID);
		$imageurl = wp_get_attachment_image_src(get_post_thumbnail_id($songID));
		echo wp_get_attachment_url($songID) . "|" . $imageurl[0] . "|" . $attachment->post_content;
	}

	function hasAttachments($post_id)
	{
		$args = array
		(
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'numberposts' => null,
			'post_status' => null,
			'post_parent' => $post_id
		);
		
		if (get_posts($args))
		{
			return get_attachment_link($post_id);
		}
	}

	add_action('wp_enqueue_scripts', 'getResources');
	add_action('wp_ajax_my_action_name', 'myajax_getMusic');
	add_action('wp_ajax_nopriv_my_action_name', 'myajax_getMusic');

	//Navigation
	register_nav_menus(array('main-nav' => __('Page Navigation')));

?>