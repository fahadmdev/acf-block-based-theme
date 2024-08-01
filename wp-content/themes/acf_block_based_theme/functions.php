<?php

/**
 * acf_based_custom_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package acf_based_custom_theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function acf_based_custom_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on acf_based_custom_theme, use a find and replace
		* to change 'acf_based_custom_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('acf_based_custom_theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'acf_based_custom_theme'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'acf_based_custom_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'acf_based_custom_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acf_based_custom_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('acf_based_custom_theme_content_width', 640);
}
add_action('after_setup_theme', 'acf_based_custom_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acf_based_custom_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Donation', 'acf_based_custom_theme'),
			'id'            => 'donation',
			'description'   => esc_html__('Add widgets here.', 'acf_based_custom_theme'),
			'before_widget' => '<div class="card-body">',
			'after_widget'  => '</div>',
			'before_title'  => ' <h5 class="card-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action('widgets_init', 'acf_based_custom_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function acf_based_custom_theme_scripts()
{

	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/styles/css/bootstrap.min.css', array(), '5.3.3');
	wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/assets/styles/fontawesome/css/all.min.css', array(), '6.4.2');
	wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/styles/css/swiper-bundle.min.css', array(), '11.1.4');
	wp_enqueue_style('themestyles', get_stylesheet_directory_uri() . '/assets/styles/css/style.min.css', array(), filemtime(get_stylesheet_directory() . '/assets/styles/css/style.min.css') . '-' . rand(), 'all');
	wp_enqueue_style('acf_based_custom_theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('acf_based_custom_theme-style', 'rtl', 'replace');

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
	wp_enqueue_script('swiper_bundle', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), '11.1.4', true);
	wp_enqueue_script('particles-js', get_template_directory_uri() . '/js/particles.min.js', array(), '2.0.0', true);
	wp_enqueue_script('acf_based_custom_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('custom_js', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true);
	wp_enqueue_script('custom-checkbox', get_template_directory_uri() . '/js/custom-gravity-forms.js', array('jquery'), '1.0', true);
	wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/js/filterAjax.js', array('jquery'), null, true);

	wp_localize_script('ajax-filter', 'ajax_filter_params', array(
		'ajax_url' => admin_url('admin-ajax.php'),

	));
	wp_enqueue_script('custom-filter-checkbox', get_template_directory_uri() . '/js/custom-filter-checkobx.js', array('jquery'), '1.0', true);
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action('wp_enqueue_scripts', 'acf_based_custom_theme_scripts');

//acf enable
function my_acf_json_save_point($path)
{
	return get_stylesheet_directory() . '/parent-acf-json';
}
function my_acf_json_load_point($path)
{
	return get_stylesheet_directory() . '/parent-acf-json';
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

// Implementation custom block feature.

function my_custom_acf_block_register()
{
	require_once get_template_directory() . '/blocks/init.php';
}
add_action('acf/init', 'my_custom_acf_block_register');



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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Service POst Type Query or Common Cards Block Query
function servceQueryTerms($term_name)
{
	$args = array(
		'post_type' => 'service',
		'tax_query' => array(
			array(
				'taxonomy' => 'services-category',
				'field'    => 'slug',
				'terms'    => $term_name,
			),
		),
		'orderby'        => 'modified',
		'order'          => 'DESC',
	);

	return new WP_Query($args);
}
add_filter('render_block_data', function ($block_content, $block) {
	unset($block['blockName']);
	return $block_content;
}, 10, 2);

//Loading Single Post Type pages or details Pages
function load_cpt_template($template)
{
	global $post;

	if ($post) {
		$post_type = $post->post_type;
		$new_template = locate_template(array("single_pages/single-{$post_type}.php"));
		if (!empty($new_template)) {
			return $new_template;
		}
	}

	return $template;
}
add_filter('single_template', 'load_cpt_template');

//Loading Archive Post or Archive Pages 
function load_archive_template($template)
{
	if (is_post_type_archive()) {
		$post_type = get_query_var('post_type');

		if ($post_type) {

			$new_template = locate_template(array("archive_pages/archive-{$post_type}.php"));

			if (!empty($new_template)) {
				return $new_template;
			}
		}
	}

	return $template;
}
add_filter('archive_template', 'load_archive_template');

//get taxonomy terms for contact form using in gforms
function get_custom_taxonomy_terms()
{
	$terms = get_terms(array(
		'taxonomy' => 'services-category',
		'hide_empty' => false,

	));

	$choices = array();
	foreach ($terms as $term) {
		$choices[] = array('text' => $term->name, 'value' => $term->term_id);
	}

	return $choices;
}



// Populate Gravity Forms checkbox field with custom taxonomy terms
add_filter('gform_pre_render', 'populate_taxonomy_terms');
add_filter('gform_pre_validation', 'populate_taxonomy_terms');
add_filter('gform_pre_submission_filter', 'populate_taxonomy_terms');
add_filter('gform_admin_pre_render', 'populate_taxonomy_terms');
function populate_taxonomy_terms($form)
{
	foreach ($form['fields'] as &$field) {

		if ($field->id == 25 && $field->type == 'checkbox') {
			$choices = get_custom_taxonomy_terms();
			$field->choices = $choices;
		}
	}

	return $form;
}

// serach query 
function include_custom_post_types_in_search($query)
{
	if ($query->is_search() && !is_admin()) {

		$query->set('post_type', array('post', 'page', 'team', 'service', 'project'));
		$query->set('paged', (get_query_var('paged')) ? get_query_var('paged') : 1);
		$query->set('posts_per_page', 10);
	}
	return $query;
}
add_filter('pre_get_posts', 'include_custom_post_types_in_search');
// search filter populate taxonomy and handling the query
function filter_search_results()
{
	$post_types = array('service', 'post', 'project', 'team');
	$selected_post_types = array();
	$tax_query = array('relation' => 'OR');

	if (isset($_POST['filter']) && !empty($_POST['filter'])) {
		foreach ($_POST['filter'] as $taxonomy => $terms) {
			foreach ($terms as $term) {
				$term_obj = get_term_by('slug', $term, $taxonomy);
				if ($term_obj) {
					$post_type = get_taxonomy($taxonomy)->object_type;
					foreach ($post_type as $pt) {
						if (!in_array($pt, $selected_post_types)) {
							$selected_post_types[] = $pt;
						}
					}
					$tax_query[] = array(
						'taxonomy' => $taxonomy,
						'field'    => 'slug',
						'terms'    => $terms,
					);
				}
			}
		}
	}

	if (empty($selected_post_types)) {
		$selected_post_types = $post_types;
	}

	$args = array(
		'post_type' => $selected_post_types,
		'tax_query' => $tax_query,
	);

	$query = new WP_Query($args);

	ob_start();

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			get_template_part('template-parts/content', 'search');
		}
	} else {
		echo '<p>No results found.</p>';
	}

	$response = ob_get_clean();
	echo $response;

	wp_die();
}
add_action('wp_ajax_filter_search', 'filter_search_results');
add_action('wp_ajax_nopriv_filter_search', 'filter_search_results');
//Changing post lable into blogs
function change_post_object_labels()
{
	global $wp_post_types;

	// Get the post type object.
	$post_type = get_post_type_object('post');

	// Change the labels.
	$labels = &$post_type->labels;
	$labels->name = 'Blogs';
	$labels->singular_name = 'Blog';
	$labels->add_new = 'Add Blog';
	$labels->add_new_item = 'Add New Blog';
	$labels->edit_item = 'Edit Blog';
	$labels->new_item = 'New Blog';
	$labels->view_item = 'View Blog';
	$labels->search_items = 'Search Blogs';
	$labels->not_found = 'No blogs found';
	$labels->not_found_in_trash = 'No blogs found in Trash';
	$labels->all_items = 'All Blogs';
	$labels->menu_name = 'Blogs';
	$labels->name_admin_bar = 'Blog';
}

add_action('init', 'change_post_object_labels');

function change_category_labels()
{
	global $wp_taxonomies;

	if (isset($wp_taxonomies['category'])) {
		$labels = &$wp_taxonomies['category']->labels;
		$labels->name = 'Blog Categories';
		$labels->singular_name = 'Blog Category';
		$labels->search_items = 'Search Blog Categories';
		$labels->all_items = 'All Blog Categories';
		$labels->parent_item = 'Parent Blog Category';
		$labels->parent_item_colon = 'Parent Blog Category:';
		$labels->edit_item = 'Edit Blog Category';
		$labels->view_item = 'View Blog Category';
		$labels->update_item = 'Update Blog Category';
		$labels->add_new_item = 'Add New Blog Category';
		$labels->new_item_name = 'New Blog Category Name';
		$labels->menu_name = 'Blog Categories';
	}
}
add_action('init', 'change_category_labels');

// Function to change Tag to Blog Tag
function change_tag_labels()
{
	global $wp_taxonomies;

	if (isset($wp_taxonomies['post_tag'])) {
		$labels = &$wp_taxonomies['post_tag']->labels;
		$labels->name = 'Blog Tags';
		$labels->singular_name = 'Blog Tag';
		$labels->search_items = 'Search Blog Tags';
		$labels->popular_items = 'Popular Blog Tags';
		$labels->all_items = 'All Blog Tags';
		$labels->edit_item = 'Edit Blog Tag';
		$labels->view_item = 'View Blog Tag';
		$labels->update_item = 'Update Blog Tag';
		$labels->add_new_item = 'Add New Blog Tag';
		$labels->new_item_name = 'New Blog Tag Name';
		$labels->separate_items_with_commas = 'Separate blog tags with commas';
		$labels->add_or_remove_items = 'Add or remove blog tags';
		$labels->choose_from_most_used = 'Choose from the most used blog tags';
		$labels->not_found = 'No blog tags found.';
		$labels->menu_name = 'Blog Tags';
	}
}
add_action('init', 'change_tag_labels');
//helper function for displaying news letter in detail page
function display_newsletter_banner()
{

	// Fetch ACF fields from options page
	$newsletter_banner_title = get_field('newsletter_banner_title', 'option');
	$newsletter_banner_description = get_field('newsletter_banner_description', 'option');

	$newsletter_CTA = get_field('newsletter_banner_cta', 'option');
	if ($newsletter_CTA) {
		$newsletter_button_url = $newsletter_CTA['url'];
		$newsletter_button_title = $newsletter_CTA['title'];
		$newsletter_button_target = $newsletter_CTA['target'] ?: '_self';
	}



	// Display banner if fields are not empty
	if ($newsletter_banner_title || $newsletter_banner_description || $newsletter_CTA) {
		echo '<div class="newsletter-banner padding">';
		echo '    <div class="container">';
		echo '        <div class="inner">';
		echo '            <div class="banner-text">';
		if ($newsletter_banner_title) {
			echo  $newsletter_banner_title;
		}
		if ($newsletter_banner_description) {
			echo '                <div class="description">' . esc_html($newsletter_banner_description) . '</div>';
		}
		echo '            </div>';
		if ($newsletter_CTA) {
			echo '            <div class="banner-cta">';
			echo '                <a class="icon-btn" href="' . esc_url($newsletter_button_url) . '" target="' . esc_attr($newsletter_button_target) . '">' . esc_html($newsletter_button_title) . '</a>';
			echo '            </div>';
		}
		echo '        </div>';
		echo '    </div>';
		echo '</div>';
	}
}
function change_post_archive_slug($args, $post_type)
{
	if ($post_type === 'post') {
		$args['rewrite']['slug'] = 'post';
		$args['has_archive'] = true;
	}
	return $args;
}
add_filter('register_post_type_args', 'change_post_archive_slug', 10, 2);
function flush_rewrite_rules_on_theme_switch()
{
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_rewrite_rules_on_theme_switch');
