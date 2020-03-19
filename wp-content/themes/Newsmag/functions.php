<?php

define('TAGDIV_ROOT', get_template_directory_uri());
define('TAGDIV_ROOT_DIR', get_template_directory());


// load the deploy mode
require_once( TAGDIV_ROOT_DIR . '/tagdiv-deploy-mode.php' );


/**
 * Theme configuration.
 */
require_once TAGDIV_ROOT_DIR . '/includes/tagdiv-config.php';


/**
 * Theme wp booster.
 */
require_once( TAGDIV_ROOT_DIR . '/includes/wp-booster/tagdiv-wp-booster-functions.php');


/**
 * Theme page generator support.
 */
if ( ! class_exists('tagdiv_page_generator' ) ) {
	include_once ( TAGDIV_ROOT_DIR . '/includes/tagdiv-page-generator.php');
}


/**
 * Theme sidebar.
 */
add_action( 'widgets_init', function (){
	register_sidebar(
		array(
			'name'=> 'Newsmag default',
			'id' => 'td-default',
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="block-title"><span>',
			'after_title' => '</span></div>'
		)
	);
});

/**
 * Theme setup.
 */
add_action( 'after_setup_theme', function (){

	/**
	 * Loads the theme's translated strings.
	 */
	load_theme_textdomain( strtolower(TD_THEME_NAME ), get_template_directory() . '/translation' );

	/**
	 * Theme menu location.
	 */
	register_nav_menus(
		array(
			'header-menu' => 'Header Menu (main)',
			'footer-menu' => 'Footer Menu',
		)
	);
});


/* ----------------------------------------------------------------------------
 * Add theme support for features
 */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
add_theme_support('woocommerce');
add_theme_support('bbpress');

global $content_width;
if ( !isset($content_width) ) {
    $content_width = 640;
}


/* ----------------------------------------------------------------------------
 * WooCommerce
 */

// breadcrumb
add_filter('woocommerce_breadcrumb_defaults', 'tagdiv_woocommerce_breadcrumbs');
function tagdiv_woocommerce_breadcrumbs() {
    return array(
        'delimiter' => ' <i class="td-icon-right td-bread-sep"></i> ',
        'wrap_before' => '<div class="entry-crumbs" itemprop="breadcrumb">',
        'wrap_after' => '</div>',
        'before' => '',
        'after' => '',
        'home' => _x('Home', 'breadcrumb', 'newsmag'),
    );
}


// Override theme default specification for product 3 per row
add_filter( 'loop_shop_columns', 'tagdiv_wc_loop_shop_columns', 1, 10 );
function tagdiv_wc_loop_shop_columns( $number_columns ) {
	return 3;
}


// Number of product per page 6
add_filter( 'loop_shop_per_page', 'tagdiv_wc_loop_shop_per_page' );
function tagdiv_wc_loop_shop_per_page( $cols ) {
	return 6;
}


// use own pagination
if (!function_exists('woocommerce_pagination')) {
    // pagination
    function woocommerce_pagination() {
        echo tagdiv_page_generator::get_pagination();
    }
}

if ( ! function_exists('woocommerce_output_related_products' ) ) {
    // Number of related products
    function woocommerce_output_related_products() {
        woocommerce_related_products(array(
            'posts_per_page' => 3,
            'columns' => 3,
            'orderby' => 'rand',
        )); // Display 3 products in rows of 1
    }
}

/**
 * Add this function to your child theme's functions.php file which should be active site wide
 * Then log into the main site and select the menu for your "Main" menu location and it should display
 * on all subsites
 */
function my_wpex_ms_global_menu() {
	return true;
  }
  add_filter( 'wpex_ms_global_menu', 'my_wpex_ms_global_menu' );



  /*CUSTOM post type start */

//Destination(Page from Menu) -> Locations (Custom Taxonomy) -> Destination Category (Custom Taxonomy) -> Destination Archive Page (Based on visits) -> Destination (The CPT post)

function register_mt_company_post_type() {
    $args = array(
        'labels'    => array(
            'name'               => __( 'companies', 'mt-company' ),
            'singular_name'      => __( 'company', 'mt-company' ),
            'menu_name'          => __( 'companies', 'mt-company' ),
            'name_admin_bar'     => __( 'company', 'mt-company' ),
            'add_new'            => __( 'Add New', 'mt-company' ),
            'add_new_item'       => __( 'Add New company', 'mt-company' ),
            'new_item'           => __( 'New company', 'mt-company' ),
            'edit_item'          => __( 'Edit company', 'mt-company' ),
            'view_item'          => __( 'View company', 'mt-company' ),
            'all_items'          => __( 'All companies', 'mt-company' ),
            'search_items'       => __( 'Search companies', 'mt-company' ),
            'parent_item_colon'  => __( 'Parent companies:', 'mt-company' ),
            'not_found'          => __( 'No companies found.', 'mt-company' ),
            'not_found_in_trash' => __( 'No companiesfound in Trash.', 'mt-company' )
        ),
        'query_var'              => 'mt_companies',
        'rewrite'                => array(
            'slug'               => 'companies/%company_name%/%company_category%',
            'with_front'         => false
        ),
        'public'                 => true,  // If you don't want it to make public, make it false
        'publicly_queryable'     => true,  // you should be able to query it
        'show_ui'                => true,  // you should be able to edit it in wp-admin
        'has_archive'            => 'companies',    //true,
        'menu_position'          => 51,
        'supports'               => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );
    flush_rewrite_rules();

    register_post_type('mt_companies', $args);
}
add_action( 'init', 'register_mt_company_post_type' );


// http://www.mytourexample.com/{CPT}/{custom-taxonomy-1}/{custom-taxonomy-2}/{CPT-post-slug}/, 


function taxonomies() {
    $taxonomies = array();

    $taxonomies['company_category'] = array(
        'hierarchical'  => true,
        'query_var'     => 'company-category',
        'rewrite'       => array(
            'slug'      => 'company/category'
        ),
        'labels'            => array(
            'name'          => 'company Category',
            'singular_name' => 'company Category',
            'edit_item'     => 'Edit company Category',
            'update_item'   => 'Update company Category',
            'add_new_item'  => 'Add company Category',
            'new_item_name' => 'Add New company Category',
            'all_items'     => 'All company Category',
            'search_items'  => 'Search company Category',
            'popular_items' => 'Popular company Category',
            'separate_items_with_commas' => 'Separate company Categories with Commas',
            'add_or_remove_items' => 'Add or Remove company Categories',
            'choose_from_most_used' => 'Choose from most used categories',
        ),
        'show_admin_column' => true
    );

    $taxonomies['company_name'] = array(
            'hierarchical'  => true,
            'query_var'     => 'name',
            'rewrite'       => array(
                'slug'      => 'companies' 
            ),
            'labels'            => array(
                'name'          => 'name',
                'singular_name' => 'name',
                'edit_item'     => 'Edit name',
                'update_item'   => 'Update name',
                'add_new_item'  => 'Add name',
                'new_item_name' => 'Add New name',
                'all_items'     => 'All name',
                'search_items'  => 'Search name',
                'popular_items' => 'Popular name',
                'separate_items_with_commas' => 'Separate name Categories with Commas',
                'add_or_remove_items' => 'Add or Remove name Categories',
                'choose_from_most_used' => 'Choose from most used categories',
            ),
            'show_admin_column' => true
        );

    flush_rewrite_rules();

    foreach( $taxonomies as $name => $args ) {
        register_taxonomy( $name, array( 'mt_companies' ), $args );
    }
}
add_action( 'init', 'taxonomies' );

//registering taxonomies we have to apply few filters to modify our CPT post URL 


function filter_post_type_link($link, $post)
{
    if ($post->post_type != 'mt_companies')
        return $link;

    if ($cats = get_the_terms($post->ID, 'company_category'))
        $link = str_replace('%company_category%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

function filter_post_type_link_location($link, $post)
{
    if ($post->post_type != 'mt_companies')
        return $link;

    if ($cats = get_the_terms($post->ID, 'company_name'))
        $link = str_replace('%company_name%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_location', 10, 2);



function eg_add_rewrite_rules() {
    global $wp_rewrite;
 
    $new_rules = array(
        'companies/(company-category|name)/(.+?)/(company-category|name)/(.+?)/?$' => 'index.php?post_type=mt_companies&' . $wp_rewrite->preg_index(1) . '=' . $wp_rewrite->preg_index(2) . '&' . $wp_rewrite->preg_index(3) . '=' . $wp_rewrite->preg_index(4),
        'companies/(company-category|name)/(.+)/?$' => 'index.php?post_type=mt_companies&' . $wp_rewrite->preg_index(1) . '=' . $wp_rewrite->preg_index(2)
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action( 'generate_rewrite_rules', 'eg_add_rewrite_rules' );


//Destination(Page from Menu) -> Locations (Custom Taxonomy) -> Destination Category (Custom Taxonomy) -> Destination Archive Page (Based on visits) -> Destination (The CPT post)



// get the currently queried taxonomy term, for use later in the template file
$company_name = get_queried_object();

// getting post ids that are assigned to current taxonomy term
$company_post_IDs = get_posts(array(
  'post_type' => 'mt_companies',
  'posts_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'company_name',
      'field' => 'slug',
      'terms' => $company_name->slug
    )
  ),
  'fields' => 'ids'
));

// getting the terms of 'destination_category', which are assigned to these posts
$company_category = wp_get_object_terms($company_post_IDs, 'company_category');

echo '<ul>';
foreach( $company_category as $category ){
    echo '<li><a href="' . esc_url( site_url("companies/name/".$company_name->slug."/company-category/".$category->slug) ) . '">'.$category->name.'</a></li>';
}
echo '</ul>';

  


// function eg_add_rewrite_rules() {
//     global $wp_rewrite;
 
//     $new_rules = array(
//         'companies/(company-category|name)/(.+?)/(company-category|name)/(.+?)/?$' => 'index.php?post_type=mt_companies&' . $wp_rewrite->preg_index(1) . '=' . $wp_rewrite->preg_index(2) . '&' . $wp_rewrite->preg_index(3) . '=' . $wp_rewrite->preg_index(4),
//         'companies/(company-category|name)/(.+)/?$' => 'index.php?post_type=mt_companies&' . $wp_rewrite->preg_index(1) . '=' . $wp_rewrite->preg_index(2)
//     );
//     $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
// }
// add_action( 'generate_rewrite_rules', 'eg_add_rewrite_rules' );




  /*CUSTOM post type end  */