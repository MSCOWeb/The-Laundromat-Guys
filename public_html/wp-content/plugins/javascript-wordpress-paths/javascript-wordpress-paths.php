<?php /*
Plugin Name: JavaScript WordPress Paths
Plugin URI: https://github.com/StephenWidom/javascript-wordpress-paths
Description: Define WordPress paths, like site_url(), as JavaScript variables for easy access within your JavaScripts!
Version: 0.1
Author: Stephen Widom
Author URI: http://stephenwidom.com
License: GPL
*/ 
defined('ABSPATH') or die('No direct script access!');

// ADD JAVASCRIPT VARIABLES FOR WORDPRESS PATHS
function javascript_wordpress_paths(){ ?>
	<script>
	//Plugins
	var jwp_plugins_url = '<?php echo plugins_url(); ?>';

	// Themes
	var jwp_get_template_directory_uri = '<?php echo get_template_directory_uri(); ?>';
	var jwp_get_stylesheet_directory_uri = '<?php echo get_stylesheet_directory_uri(); ?>';
	var jwp_get_stylesheet_uri = '<?php echo get_stylesheet_uri(); ?>';
	var jwp_get_theme_root_uri = '<?php echo get_theme_root_uri(); ?>';
	var jwp_get_theme_root = '<?php echo get_theme_root(); ?>';
	var jwp_get_theme_roots = '<?php echo get_theme_roots(); ?>';
	var jwp_get_stylesheet_directory = '<?php echo get_stylesheet_directory(); ?>';
	var jwp_get_template_directory = '<?php echo get_template_directory(); ?>';

	// Site Home
	var jwp_home_url = '<?php echo home_url(); ?>';

	// WordPress
	var jwp_admin_url = '<?php echo admin_url(); ?>';
	var jwp_site_url = '<?php echo site_url(); ?>';
	var jwp_content_url = '<?php echo content_url(); ?>';
	var jwp_includes_url = '<?php echo includes_url(); ?>';
	<?php $upload_dir = wp_upload_dir(); // Upload directory paths ?>
	var jwp_wp_upload_dir_path = '<?php echo $upload_dir["path"]; ?>';
	var jwp_wp_upload_dir_url = '<?php echo $upload_dir["url"]; ?>';
	var jwp_wp_upload_dir_basedir = '<?php echo $upload_dir["basedir"]; ?>';
	var jwp_wp_upload_dir_baseurl = '<?php echo $upload_dir["baseurl"]; ?>';

	// Multisite
	var jwp_get_admin_url = '<?php echo get_admin_url(); ?>';
	var jwp_get_home_url = '<?php echo get_home_url(); ?>';
	var jwp_get_site_url = '<?php echo get_site_url(); ?>';
	var jwp_network_admin_url = '<?php echo network_admin_url(); ?>';
	var jwp_network_site_url = '<?php echo network_site_url(); ?>';
	var jwp_network_home_url = '<?php echo network_home_url(); ?>';
	</script>
<?php }
add_action('wp_head','javascript_wordpress_paths',1);
?>