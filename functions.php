<?php
/**
 * MWBC functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MWBC
 */

if ( ! function_exists( 'mwbc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mwbc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mwbc, use a find and replace
		 * to change 'mwbc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'GkaTheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mwbc' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mwbc_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mwbc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mwbc_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mwbc_content_width', 640 );
}
add_action( 'after_setup_theme', 'mwbc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mwbc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'After Content', 'mwbc' ),
		'id'            => 'mwbc_widget_after_content',
		'description'   => esc_html__( 'Add widgets here.', 'mwbc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>'
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Before Content', 'mwbc' ),
		'id'            => 'mwbc_widget_before_content',
		'description'   => esc_html__( 'Add widgets here.', 'mwbc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>'
	) );
}
add_action( 'widgets_init', 'mwbc_widgets_init' );

/**
 * Custom Widgets
 */
require get_template_directory() . '/widgets/controllers/news-widget.php';
require get_template_directory() . '/widgets/controllers/events-widget.php';
require get_template_directory() . '/widgets/controllers/services-widget.php';
require get_template_directory() . '/widgets/controllers/img-text-2-col-widget.php';
require get_template_directory() . '/widgets/controllers/slider-text-2-col-widget.php';
require get_template_directory() . '/widgets/controllers/advisory-board-widget.php';
require get_template_directory() . '/widgets/controllers/team-widget.php';
require get_template_directory() . '/widgets/controllers/albums-widget.php';
require get_template_directory() . '/widgets/controllers/partners-widget.php';
require get_template_directory() . '/widgets/controllers/success-stories-widget.php';
require get_template_directory() . '/widgets/controllers/testimonials-widget.php';
require get_template_directory() . '/widgets/controllers/custom-text-widget.php';
require get_template_directory() . '/widgets/controllers/keynote-speaker-widget.php';
require get_template_directory() . '/widgets/controllers/donate-widget.php';
require get_template_directory() . '/widgets/controllers/join-newsletter-widget.php';
require get_template_directory() . '/widgets/controllers/donate-box-widget.php';
require get_template_directory() . '/widgets/controllers/contact-form-widget.php';
require get_template_directory() . '/widgets/controllers/test-widget.php';

/**
 * Enqueue scripts and styles.
 */
function mwbc_scripts() {
	wp_enqueue_style( 'mwbc-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'mwbc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'mwbc-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' );

	wp_enqueue_script( 'mwbc-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js' );

	wp_enqueue_script( 'mwbc-twitter-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js' );

	wp_enqueue_script( 'mwbc-custom-js', get_template_directory_uri() . '/scripts/js/mdb.min.js', array(), '20201208', true );

	wp_enqueue_script( 'mwbc-custom-js-1', get_template_directory_uri() . '/scripts/js/main.min.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mwbc_scripts' );

// Custom styles 
function mwbc_styles() {
	// Font Awesome
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	// Bootstrap core CSS 
	wp_enqueue_style( 'bootstrap-core', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css' );
	// Material Design Bootstrap
	wp_enqueue_style( 'custom-styling1', get_stylesheet_directory_uri() . '/styles/css/mdb.min.css' );
	wp_enqueue_style( 'custom-styling', get_stylesheet_directory_uri() . '/styles/css/main.min.css' );

}
add_action('wp_enqueue_scripts', 'mwbc_styles');

/*
  Admin Bar Tweak. This changes the default CSS added by WordPress to place the admin bar margin in the body element instead of the html element.

Add this code to your active theme's functions.php or a custom plugin.
*/
add_theme_support( 'admin-bar', array( 'callback' => 'my_admin_bar_css') );
function my_admin_bar_css()
{
?>
<style type="text/css" media="screen">	
	html body { margin-top: 28px !important; }
</style>
<?php
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// console log function

function console_log($output, $with_script_tags = true) {
	$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
	if ($with_script_tags) {
		$js_code = '<script>' . $js_code . '</script>';
	}
	echo $js_code;
}

/**
 * Get NextGen plugin gallery
 */
function mwbc_get_gallery($id) {
	global $wpdb;
	$result = $wpdb->get_results("	SELECT 	pictures.pid,
											pictures.description,
											pictures.alttext,
											pictures.filename,
											gallery.path,
											MAX(
												CASE 
													WHEN field.fid = 1 
													THEN field.field_value
													ELSE NULL 
												END
											) AS 'link',
											MAX(
												CASE 
													WHEN field.fid = 2 
													THEN field.field_value
													ELSE NULL 
												END
											) AS 'title'
									FROM wp_ngg_pictures AS pictures 
									INNER JOIN wp_ngg_gallery AS gallery 
									ON pictures.galleryid = gallery.gid
									LEFT JOIN wp_nggcf_field_values AS field
									ON field.pid = pictures.pid 
									WHERE pictures.galleryid = {$id} 
									GROUP BY pictures.pid
									ORDER BY sortorder");
	return $result;
}

function customize_tribe_events_breakpoint() {
	return 600;
}
add_filter( 'tribe_events_mobile_breakpoint', 'customize_tribe_events_breakpoint' );	