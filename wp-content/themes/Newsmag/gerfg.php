<?php


//Destination(Page from Menu) -> Locations (Custom Taxonomy) -> Destination Category (Custom Taxonomy) -> Destination Archive Page (Based on visits) -> Destination (The CPT post)

function register_mt_company_post_type() {
    $args = array(
        'labels'    => array(
            'name'               => __( 'companies', 'mt-company' ),
            'singular_name'      => __( 'company', 'mt-company' ),
            'menu_name'          => __( 'companies', 'mt-company' ),
            'name_admin_bar'     => __( 'company', 'mt-company' ),
            'add_new'            => __( 'Add New', 'mt-company' ),
            'add_new_item'       => __( 'Add New Destination', 'mt-company' ),
            'new_item'           => __( 'New company', 'mt-company' ),
            'edit_item'          => __( 'Edit company', 'mt-company' ),
            'view_item'          => __( 'View Destination', 'mt-company' ),
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
add_action( 'init', 'register_company_post_type' );


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
            'query_var'     => 'location',
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
        $link = str_replace('%company _category%', array_pop($cats)->slug, $link);
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
$company_category = wp_get_object_terms($company_post_IDs, 'destination_category');

echo '<ul>';
foreach( $company_categoryas $category ){
    echo '<li><a href="' . esc_url( site_url("destinations/location/".$company_name->slug."/destination-category/".$category->slug) ) . '">'.$category->name.'</a></li>';
}
echo '</ul>';