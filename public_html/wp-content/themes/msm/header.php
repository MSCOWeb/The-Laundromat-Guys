<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title('|',true,'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<div class="logo container">
		<a href="<?php echo site_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/the-laundromat-guys-logo.png"/></a>
	</div>
	<div class="main-nav">
		<nav class="container">
			<?php wp_nav_menu(array('theme_location' => 'nav-menu','container' => '')); ?>
		</nav>
	</div>
</header>