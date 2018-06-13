<?php 

// Loading Site Assets

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' ); 

function my_enqueue_assets() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 
    //wp_enqueue_script( 'divi', plugin_dir_url( __FILE__ ) . 'js/scripts.js', array( 'jquery', 'divi-custom-script' ), '0.1.2', true );
    wp_enqueue_script( 'app', get_bloginfo( 'stylesheet_directory' ) . '/js/scripts.js', array( 'jquery' ), '1.0.0' );
    wp_enqueue_style( 'normalize', get_bloginfo( 'stylesheet_directory' ) . '/css/normalize.css');
}



// PXP WP Custom Dashboard Logo

function dev_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
  background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/pxp_fvcn.png) !important;
  background-position: 0 0;
  background-size: cover;
  background-repeat: no-repeat;
  color:rgba(0, 0, 0, 0);
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
  background-position: 0 0;
}
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'dev_custom_logo');


// PXP Custom WordPress Development Dashboard Widget


add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p>Welcome to Pixel Parlor Custom Theme ! Need help? Contact the developer <a href="mailto:dev@pixelparlor.com">here</a>. For More info visit: <a href="http://www.pixelparlor.com/" target="_blank">pixelparlor.com</a></p>';
}


// Adding Custom Social Icons To Footer

function my_added_social_icons($kkoptions) {
	global $themename, $shortname;
	
	$open_social_new_tab = array( "name" =>esc_html__( "Open Social URLs in New Tab", $themename ),
                   "id" => $shortname . "_show_in_newtab",
                   "type" => "checkbox",
                   "std" => "off",
                   "desc" =>esc_html__( "Set to ON to have social URLs open in new tab. ", $themename ) );
				   
	$replace_array_newtab = array ( $open_social_new_tab );
	
	$show_instagram_icon = array( "name" =>esc_html__( "Show Instagram Icon", $themename ),
                   "id" => $shortname . "_show_instagram_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the Instagram Icon on your header or footer. ", $themename ) );
	$show_pinterest_icon = array( "name" =>esc_html__( "Show Pinterest Icon", $themename ),
                   "id" => $shortname . "_show_pinterest_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the Pinterest Icon on your header or footer. ", $themename ) );
	$show_tumblr_icon = array( "name" =>esc_html__( "Show Tumblr Icon", $themename ),
                   "id" => $shortname . "_show_tumblr_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the Tumblr Icon on your header or footer. ", $themename ) );
	$show_dribbble_icon = array( "name" =>esc_html__( "Show Dribbble Icon", $themename ),
                   "id" => $shortname . "_show_dribbble_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the Dribbble Icon on your header or footer. ", $themename ) );
	$show_vimeo_icon = array( "name" =>esc_html__( "Show Vimeo Icon", $themename ),
                   "id" => $shortname . "_show_vimeo_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the Vimeo Icon on your header or footer. ", $themename ) );
	$show_linkedin_icon = array( "name" =>esc_html__( "Show LinkedIn Icon", $themename ),
                   "id" => $shortname . "_show_linkedin_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the LinkedIn Icon on your header or footer. ", $themename ) );
	$show_myspace_icon = array( "name" =>esc_html__( "Show MySpace Icon", $themename ),
                   "id" => $shortname . "_show_myspace_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the MySpace Icon on your header or footer. ", $themename ) );
	$show_skype_icon = array( "name" =>esc_html__( "Show Skype Icon", $themename ),
                   "id" => $shortname . "_show_skype_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the Skype Icon on your header or footer. ", $themename ) );
	$show_youtube_icon = array( "name" =>esc_html__( "Show Youtube Icon", $themename ),
                   "id" => $shortname . "_show_youtube_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the Youtube Icon on your header or footer. ", $themename ) );
	$show_flickr_icon = array( "name" =>esc_html__( "Show Flickr Icon", $themename ),
                   "id" => $shortname . "_show_flickr_icon",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" =>esc_html__( "Here you can choose to display the Flickr Icon on your header or footer. ", $themename ) );
				   
	$repl_array_opt = array( $show_instagram_icon,
							$show_pinterest_icon,
							$show_tumblr_icon,
							$show_dribbble_icon,
							$show_vimeo_icon,
							$show_linkedin_icon,
							$show_myspace_icon,
							$show_skype_icon,
							$show_youtube_icon,
							$show_flickr_icon,
							);
	
	$show_instagram_url =array( "name" =>esc_html__( "Instagram Profile Url", $themename ),
                   "id" => $shortname . "_instagram_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your Instagram Profile. ", $themename ) );
	$show_pinterest_url =array( "name" =>esc_html__( "Pinterest Profile Url", $themename ),
                   "id" => $shortname . "_pinterest_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your Pinterest Profile. ", $themename ) );
	$show_tumblr_url =array( "name" =>esc_html__( "Tumblr Profile Url", $themename ),
                   "id" => $shortname . "_tumblr_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your Tumblr Profile. ", $themename ) );
	$show_dribble_url =array( "name" =>esc_html__( "Dribbble Profile Url", $themename ),
                   "id" => $shortname . "_dribble_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your Dribbble Profile. ", $themename ) );
	$show_vimeo_url =array( "name" =>esc_html__( "Vimeo Profile Url", $themename ),
                   "id" => $shortname . "_vimeo_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your Vimeo Profile. ", $themename ) );
	$show_linkedin_url =array( "name" =>esc_html__( "LinkedIn Profile Url", $themename ),
                   "id" => $shortname . "_linkedin_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your LinkedIn Profile. ", $themename ) );
	$show_myspace_url =array( "name" =>esc_html__( "MySpace Profile Url", $themename ),
                   "id" => $shortname . "_mysapce_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your MySpace Profile. ", $themename ) );
	$show_skype_url =array( "name" =>esc_html__( "Skype Profile Url", $themename ),
                   "id" => $shortname . "_skype_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your Skype Profile. ", $themename ) );
	$show_youtube_url =array( "name" =>esc_html__( "Youtube Profile Url", $themename ),
                   "id" => $shortname . "_youtube_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your Youtube Profile. ", $themename ) );
	$show_flickr_url =array( "name" =>esc_html__( "Flickr Profile Url", $themename ),
                   "id" => $shortname . "_flickr_url",
                   "std" => "#",
                   "type" => "text",
                   "validation_type" => "url",
				   "desc" =>esc_html__( "Enter the URL of your Flickr Profile. ", $themename ) );
				   
	$repl_array_url = array( $show_instagram_url,
							$show_pinterest_url,
							$show_tumblr_url,
							$show_dribble_url,
							$show_vimeo_url,
							$show_linkedin_url,
							$show_myspace_url,
							$show_skype_url,
							$show_youtube_url,
							$show_flickr_url,
							);


	$srch_key = array_column($kkoptions, 'id');
	
	$key = array_search('divi_show_facebook_icon', $srch_key);
	array_splice($kkoptions, $key + 6, 0, $replace_array_newtab);
	
	$key = array_search('divi_show_google_icon', $srch_key);
	array_splice($kkoptions, $key + 8, 0, $repl_array_opt);

	$key = array_search('divi_rss_url', $srch_key);
	array_splice($kkoptions, $key + 17, 0, $repl_array_url);
	
	//print_r($kkoptions);

	return $kkoptions;
}
add_filter('et_epanel_layout_data', 'my_added_social_icons', 99);

define( 'DDPL_DOMAIN', 'my-domain' ); // translation domain
require_once( 'vendor/divi-disable-premade-layouts/divi-disable-premade-layouts.php' );




// PXP Register Additional Navigation Menus


function register_theme_menus() {

    register_nav_menus(
      array(
        'second-footer-menu' => __( 'Second Footer Menu' )
      )
    );
  }
add_action( 'init', 'register_theme_menus' );



// Register Additonal Sidebars

function pxp_widgets_init() {

    register_sidebar( array(
        'name' =>__( 'New Sidebar', 'nsdbr'),
        'id' => 'sidebar-new',
        'description' => __( 'Appears on x pages', 'nsdbr' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    }

add_action( 'widgets_init', 'pxp_widgets_init' );



// Allow WP SVG uploads

function allow_svgimg_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svgimg_types');



// Hide Wordpress Loggin Errors


function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );



// PXP FontAwesome 4 Load

// function pxp_load_fa() {

// wp_enqueue_style( 'pxp-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

// }

// add_action( 'wp_enqueue_scripts', 'pxp_load_fa' );


// PXP FontAwesome 5 Load

function pxp_load_fa() {

wp_enqueue_style( 'pxp-fa', 'https://use.fontawesome.com/releases/v5.0.8/css/all.css' );

}

add_action( 'wp_enqueue_scripts', 'pxp_load_fa' );



// DIVI REMOVE PROJECTS CPT

//* Mind this opening php tag
/**
 *	This will hide the Divi "Project" post type.
 *	Thanks to georgiee (https://gist.github.com/EngageWP/062edef103469b1177bc#gistcomment-1801080) for his improved solution.
 */
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}



// PXP Theme Customizr Footer Editor Script

function ds_footer_links_editor($wp_customize) {

 $wp_customize->add_panel( 'footer_links_option', array(
 'priority' => 30,
 'capability' => 'edit_theme_options',
 'title' => __('Edit Footer Links', footer_links_title),
 'description' => __('Customize the login of your website.', footer_links_title),
 ));

 $wp_customize->add_section('ds_footer_links_section', array(
 'priority' => 5,
 'title' => __('Footer Links Editor', footer_links_title),
 'panel' => 'footer_links_option',
 ));
 // Before Link One
 $wp_customize->add_setting('ds_footer_links_before_link_one', array(
 'default' => 'Designed By',
 'type' => 'option',
 'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control('ds_footer_links_before_link_one', array(
 'label' => __('Text Before First Link', footer_links_title),
 'section' => 'ds_footer_links_section',
 'type' => 'option',
 'priority' => 5,
 'settings' => 'ds_footer_links_before_link_one'
 ));
 // Link One
 $wp_customize->add_setting('ds_footer_links_link_one', array(
 'default' => 'Elegant Themes',
 'type' => 'option',
 'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control('ds_footer_links_link_one', array(
 'label' => __('First Link Text', footer_links_title),
 'section' => 'ds_footer_links_section',
 'type' => 'option',
 'priority' => 10,
 'settings' => 'ds_footer_links_link_one'
 ));
 // Link One URL
 $wp_customize->add_setting('ds_footer_link_one_url', array(
 'default' => '#',
 'type' => 'option',
 'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control('ds_footer_link_one_url', array(
 'label' => __('First Link URL', footer_links_title),
 'section' => 'ds_footer_links_section',
 'type' => 'option',
 'priority' => 15,
 'settings' => 'ds_footer_link_one_url'
 ));
// Before Link Two
 $wp_customize->add_setting('ds_footer_links_before_link_two', array(
 'default' => 'Powered By',
 'type' => 'option',
 'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control('ds_footer_links_before_link_two', array(
 'label' => __('Text Before Second Link', footer_links_title),
 'section' => 'ds_footer_links_section',
 'type' => 'option',
 'priority' => 20,
 'settings' => 'ds_footer_links_before_link_two'
 ));
 // Link Two
 $wp_customize->add_setting('ds_footer_links_link_two', array(
 'default' => 'WordPress',
 'type' => 'option',
 'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control('ds_footer_links_link_two', array(
 'label' => __('Second Link Text', footer_links_title),
 'section' => 'ds_footer_links_section',
 'type' => 'option',
 'priority' => 25,
 'settings' => 'ds_footer_links_link_two'
 ));
 // Link Two URL
 $wp_customize->add_setting('ds_footer_link_two_url', array(
 'default' => '###',
 'type' => 'option',
 'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control('ds_footer_link_two_url', array(
 'label' => __('Second Link URL', footer_links_title),
 'section' => 'ds_footer_links_section',
 'type' => 'option',
 'priority' => 30,
 'settings' => 'ds_footer_link_two_url'
 ));
 // Footer Divider
 $wp_customize->add_setting('ds_footer_link_divider', array(
 'default' => '|',
 'type' => 'option',
 'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control('ds_footer_link_divider', array(
 'label' => __('Footer Link Divider', footer_links_title),
 'section' => 'ds_footer_links_section',
 'type' => 'option',
 'priority' => 35,
 'settings' => 'ds_footer_link_divider'
 ));
}

add_action('customize_register', 'ds_footer_links_editor');

function ds_new_bottom_footer() {

$footer_one = get_option('ds_footer_links_before_link_one','Designed By');
$footer_two = get_option('ds_footer_links_link_one','Elegant Themes');
$footer_link_one = get_option('ds_footer_link_one_url','http://www.elegantthemes.com/');
$footer_three = get_option('ds_footer_links_before_link_two','Powered By');
$footer_four = get_option('ds_footer_links_link_two', 'WordPress');
$footer_link_two = get_option('ds_footer_link_two_url', 'https://wordpress.org/');
$footer_divider = get_option('ds_footer_link_divider','|');

?>

<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#footer-info").text(' ');
jQuery('<p id="footer-info"><?php echo $footer_one; ?> <a href="<?php echo $footer_link_one; ?>"><?php echo $footer_two; ?></a> <?php echo $footer_divider; ?> <?php echo $footer_three; ?> <a href="<?php echo $footer_link_two; ?>"><?php echo $footer_four; ?></a></p>').insertAfter("#footer-info");
});
</script>

<?php
}

add_action( 'wp_head', 'ds_new_bottom_footer' );

?>