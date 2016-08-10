<?php

//** === === === === === === ===>>> FIX ADMIN MENU IN CHROME
add_action('admin_enqueue_scripts','chrome_fix');
function chrome_fix(){
 if(strpos($_SERVER['HTTP_USER_AGENT'],'Chrome') !== false) wp_add_inline_style('wp-admin','#adminmenu{transform:translateZ(0);}');
}


//** === === === === === === ===>>> THEME SETUP
if(!function_exists('msm_setup')){function msm_setup(){

	// REGISTER NAV MENU
	register_nav_menu('nav-menu',__('Nav Menu'));

	// ADD WOOCOMMERCE SUPPORT
	// add_theme_support('woocommerce');

	// ADD FEATURED IMAGE SUPPORT
	add_theme_support('post-thumbnails');

	// ADD CUSTOM IMAGE SIZES
	// add_image_size('slider',1200,400,true);

	// CUSTOM POST THUMBNAIL SIZE
	// set_post_thumbnail_size(300,300,true);

	// CREATE ACF OPTIONS PAGE
	if(function_exists('acf_add_options_page')){
		acf_add_options_page(array(
			'page_title' 	=> 'The Laundromat Guys Info',
			'menu_title'	=> 'Sitewide Info',
			'menu_slug' 	=> 'site-options',
			'redirect'		=> false
		));
	}	

	// LOAD FAVICON.PNG
	if(file_exists(TEMPLATEPATH . "/images/favicon.png")){
		add_action('wp_head','include_favicon');
		function include_favicon(){ ?>
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/ico"/>
		<?php }
	}

}} add_action('after_setup_theme','msm_setup');


//** === === === === === === ===>>> LOAD JAVASCRIPT AND CSS
if(!function_exists('msm_scripts')){ function msm_scripts(){

	// LOAD CSS
	wp_enqueue_style('flexslider',get_template_directory_uri().'/css/flexslider.css',null,null);
	wp_enqueue_style('fancybox',get_template_directory_uri().'/css/jquery.fancybox.css',null,null);
	wp_enqueue_style('slicknav',get_template_directory_uri().'/css/slicknav.css',null,null);
	wp_enqueue_style('googlefonts','https://fonts.googleapis.com/css?family=Lato:400,700',null,null);
	wp_enqueue_style('fontawesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',null,null);
	wp_enqueue_style('style',get_stylesheet_uri(),null,null);

	// LOAD JQUERY - IN FOOTER
	wp_deregister_script('jquery');
	wp_register_script('jquery','/wp-includes/js/jquery/jquery.js',false,null,true);
	wp_enqueue_script('jquery');

	// LOAD SLICKNAV
	wp_register_script('slicknav',get_template_directory_uri() . '/js/jquery.slicknav.min.js',array('jquery'),NULL,true);
	wp_enqueue_script('slicknav');

	// LOAD CENTERR
	wp_register_script('centerr',get_template_directory_uri() . '/js/jquery.centerr-min.js',array('jquery'),NULL,true);
	wp_enqueue_script('centerr');

	// LOAD SAMESIZR
	// wp_register_script('samesizr',get_template_directory_uri() . '/js/jquery.samesizr-min.js',array('jquery'),NULL,true);
	// wp_enqueue_script('samesizr');

	// LOAD VALIDATR
	wp_register_script('validatr',get_template_directory_uri() . '/js/jquery.validatr.js',array('jquery'),NULL,true);
	wp_enqueue_script('validatr');

	// LOAD FLEXSLIDER
	wp_register_script('flexslider',get_template_directory_uri() . '/js/jquery.flexslider-min.js',array('jquery'),NULL,true);
	wp_enqueue_script('flexslider');

	// LOAD FANCYBOX
	wp_register_script('fancybox',get_template_directory_uri() . '/js/jquery.fancybox.js',array('jquery'),NULL,true);
	wp_enqueue_script('fancybox');

	// LOAD MAIN.JS
	wp_register_script('main',get_template_directory_uri() . '/js/main.js',array('jquery'),NULL,true);
	wp_enqueue_script('main');

}} add_action('wp_enqueue_scripts','msm_scripts',999);


//** === === === === === === ===>>> ADD ADMIN THEME
if(!function_exists('msm_admin_theme')){ function msm_admin_theme(){

	wp_enqueue_style('custom-admin',get_template_directory_uri().'/css/admin.css',null,null);

}} add_action('admin_enqueue_scripts','msm_admin_theme');


//** === === === === === === ===>>> PAGE TITLES SANS SEO PLUGIN
function sans_seo_wp_title($title,$sep){
	global $paged,$page;
	if (is_feed()){
		return $title;
	}
	$title .= get_bloginfo('name');
	$site_description = get_bloginfo('description','display');
	if ($site_description && (is_home() || is_front_page())){
		$title = "$title $sep $site_description";
	}
	if ($paged >= 2 || $page >= 2){
		$title = sprintf(__('Page %s','mayer'),max($paged,$page)) . " $sep $title";
	}
	return $title;
}
add_filter('wp_title','sans_seo_wp_title',10,2);


//** === === === === === === ===>>> ADD ABILITY TO CUSTOMIZE HEADER IMAGE
$args = array(
	'flex-width'    => true,
	'width'         => 300,
	'flex-height'   => true,
	'height'        => 100,
	'uploads'		=> true,
	'default-image' => get_template_directory_uri() . '/images/headers/great-stuff-logo.png'
);
add_theme_support('custom-header',$args);

//** === === === === === === ===>>> GRAB FEATURED IMAGE URL
function wp_get_thumbnail_url($id){
	if(has_post_thumbnail($id)){
		$imgArray = wp_get_attachment_image_src(get_post_thumbnail_id($id),'single-post-thumbnail');
		$imgURL = $imgArray[0];
		return $imgURL;
	} else {
		return false;	
	}
}


//** === === === === === === ===>>> REGISTER CUSTOM POST TYPES
// add_action('init','msm_register_my_post_types');
// function msm_register_my_post_types(){
// 	register_post_type('slide',
// 		array(
// 			'labels' => array(
// 				'name' => 'Slides',
// 				'singular_name' => 'Slide',
// 				'add_new' => 'Post New Slide',
// 				'add_new_item' => 'Post New Slide',
// 				'edit_item' => 'Edit Slide',
// 				'new_item' => 'New Slide',
// 				'all_items' => 'All Slides',
// 				'menu_name' => 'Slides'
// 			),
// 			'menu_icon' => 'dashicons-images-alt2',
// 			'public' => true,
// 			'supports' => array('title','thumbnail')
// 		)
// 	);
// }


//** === === === === === === ===>>> LOAD PAGE-SPECIFIC JAVSCRIPTS IN FOOTER
function get_page_javascripts(){
	global $post;
	wp_reset_query();

	// Check if it's a child page
	if(is_page() && $post->post_parent > 0){
	    $parent = get_post($post->post_parent)->post_name;
	    if(file_exists(TEMPLATEPATH . "/js/$parent.js")){ ?>
			<script src="<?php echo get_template_directory_uri(); ?>/js/<?php echo $parent; ?>.js"></script>
		<?php }
	}

	$slug = (is_home() || is_front_page()) ? "home" : get_post($post)->post_name;
	if(file_exists(TEMPLATEPATH . "/js/$slug.js")){ ?>
		<script src="<?php echo get_template_directory_uri(); ?>/js/<?php echo $slug; ?>.js"></script>
<?php }
}
add_action('wp_footer','get_page_javascripts',31); // Load it in the footer


//** === === === === === === ===>>> SUBPAGE HEADER IMAGE
function msm_header_image(){ ?>
	<img src="<?php echo get_template_directory_uri(); ?>/images/msm-header02.jpg"/>
<?php }


//** === === === === === === ===>>> FUNCTION TO TURN TITLES INTO IDS (FOR JQUERY USAGE)
function make_id($input){
	return str_replace('&','and',str_replace('/','-',strtolower(str_replace(' ','-',strip_tags($input)))));
}


//** === === === === === === ===>>> GET PARENT PAGE SLUG
function get_parent_page_slug(){
	global $post;
	wp_reset_query();

	if(is_page() && $post->post_parent > 0){
	    $parent = get_post($post->post_parent)->post_name;
	    return $parent;
	} else {
		return false;
	}
}


//** === === === === === === ===>>> ADD SHORTCODE FOR SITE_URL: [site_url]
function url_shortcode() {
	return get_bloginfo('url');
}
add_shortcode('site_url','url_shortcode');


//** === === === === === === ===>>> ADD SHORTCODE FOR TEMPLATE DIRECTORY: [template_directory_uri]
function template_directory_shortcode(){
	return get_template_directory_uri();
}
add_shortcode('template_directory_uri','template_directory_shortcode');


//** === === === === === === ===>>> ADD PAGENAME TO BODY CLASS
function add_slug_body_class($classes){
	global $post;
	if(isset($post)){
		$classes[] = $post->post_type . '-' . $post->post_name; // Prepend "PAGE" TO PAGENAME
	}
	return $classes;
}

add_filter('body_class','add_slug_body_class');



//** === === === === === === ===>>> CUSTOM EXCERPT LENGTH
function custom_excerpt_length($length){
	return 29;
}
add_filter('excerpt_length','custom_excerpt_length',999);


//** === === === === === === ===>>> SINGLE-{CAT-SLUG}.PHP
// add_filter('single_template',create_function(
// 	'$the_template',
// 	'foreach((array) get_the_category() as $cat){
// 		if(file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php"))
// 		return TEMPLATEPATH . "/single-{$cat->slug}.php";}
// 	return $the_template;')
// );


//** === === === === === === ===>>> CUSTOM READ MORE BUTTON
function new_excerpt_more($more){
    global $post;
    //return '...';
	return '<a class="moretag" href="'.get_permalink($post->ID).'">... Read more</a>';
}
add_filter('excerpt_more','new_excerpt_more');


//** === === === === === === ===>>> TWITTER FEED WIDGET
// function msm_widgets_init(){
// 	register_sidebar(array(
// 		'name' 			=> __('Twitter Feed','msm'),
// 		'id' 			=> 'sidebar-1',
// 		'before_widget'	=> '',
// 		'after_widget' 	=> '',
// 		'before_title' 	=> '<h6 style="display:none;">',
// 		'after_title' 	=> '</h6>',
// 	));
// }
// add_action('init','msm_widgets_init');


//** === === === === === === ===>>> SECURITY <<<=== === === === === === ===**\\

//** === === === === === === ===>>> AMBIGIOUS LOGIN ERROR
function wrong_login(){
 	return 'Wrong username and/or password.';
}
add_filter('login_errors','wrong_login');


//** === === === === === === ===>>> DISABLE FILE EDITOR
define('DISALLOW_FILE_EDIT',true);


//** === === === === === === ===>>> HIDE WORDPRESS VERSION
function remove_version(){
  return '';
}
add_filter('the_generator','remove_version');

?>