<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"> <!—320—>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/css/bootstrap.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>

<?php wp_enqueue_script("jquery"); ?>
<?php wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js'); ?>

<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/functions.js"></script>
<script>
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
</head>

<body <?php body_class(); ?>>

<div class="container">
  <img class="bg-image" src="<?php bloginfo("template_url"); ?>/image/site_background2.jpg">
  <img class="bg-image second" src="<?php bloginfo("template_url"); ?>/image/site_background5.png">
  <img class="bg-image third" src="<?php bloginfo("template_url"); ?>/image/site_background3.png">
    <nav id="navigation">
		<?php 

			$args = array('theme_location' => 'main-nav');
			wp_nav_menu($args);

		?>
	</nav>
  <div class="content">