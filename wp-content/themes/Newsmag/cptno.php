function register_destination_post_type() {
    $args = array(
        'labels'    => array(
            'name'               => __( 'Destinations', 'mt-destination' ),
            'singular_name'      => __( 'Destination', 'mt-destination' ),
            'menu_name'          => __( 'Destinations', 'mt-destination' ),
            'name_admin_bar'     => __( 'Destination', 'mt-destination' ),
            'add_new'            => __( 'Add New', 'mt-destination' ),
            'add_new_item'       => __( 'Add New Destination', 'mt-destination' ),
            'new_item'           => __( 'New Destination', 'mt-destination' ),
            'edit_item'          => __( 'Edit Destination', 'mt-destination' ),
            'view_item'          => __( 'View Destination', 'mt-destination' ),
            'all_items'          => __( 'All Destinations', 'mt-destination' ),
            'search_items'       => __( 'Search Destinations', 'mt-destination' ),
            'parent_item_colon'  => __( 'Parent Destinations:', 'mt-destination' ),
            'not_found'          => __( 'No Destinations found.', 'mt-destination' ),
            'not_found_in_trash' => __( 'No Destinations found in Trash.', 'mt-destination' )
        ),
        'query_var'              => 'mt_destinations',
        'rewrite'                => array(
            'slug'               => 'destinations/%destination_location%/%destination_category%',
            'with_front'         => false
        ),
        'public'                 => true,  // If you don't want it to make public, make it false
        'publicly_queryable'     => true,  // you should be able to query it
        'show_ui'                => true,  // you should be able to edit it in wp-admin
        'has_archive'            => 'destinations',    //true,
        'menu_position'          => 51,
        'supports'               => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );
    flush_rewrite_rules();

    register_post_type('mt_destinations', $args);
}
add_action( 'init', 'register_destination_post_type' );



function taxonomies() {
    $taxonomies = array();

    $taxonomies['destination_category'] = array(
        'hierarchical'  => true,
        'query_var'     => 'destination-category',
        'rewrite'       => array(
            'slug'      => 'destination/category'
        ),
        'labels'            => array(
            'name'          => 'Destination Category',
            'singular_name' => 'Destination Category',
            'edit_item'     => 'Edit Destination Category',
            'update_item'   => 'Update Destination Category',
            'add_new_item'  => 'Add Destination Category',
            'new_item_name' => 'Add New Destination Category',
            'all_items'     => 'All Destination Category',
            'search_items'  => 'Search Destination Category',
            'popular_items' => 'Popular Destination Category',
            'separate_items_with_commas' => 'Separate Destination Categories with Commas',
            'add_or_remove_items' => 'Add or Remove Destination Categories',
            'choose_from_most_used' => 'Choose from most used categories',
        ),
        'show_admin_column' => true
    );

    $taxonomies['destination_location'] = array(
            'hierarchical'  => true,
            'query_var'     => 'location',
            'rewrite'       => array(
                'slug'      => 'destinations' 
            ),
            'labels'            => array(
                'name'          => 'Location',
                'singular_name' => 'Location',
                'edit_item'     => 'Edit Location',
                'update_item'   => 'Update Location',
                'add_new_item'  => 'Add Location',
                'new_item_name' => 'Add New Location',
                'all_items'     => 'All Location',
                'search_items'  => 'Search Location',
                'popular_items' => 'Popular Location',
                'separate_items_with_commas' => 'Separate Location Categories with Commas',
                'add_or_remove_items' => 'Add or Remove Location Categories',
                'choose_from_most_used' => 'Choose from most used categories',
            ),
            'show_admin_column' => true
        );

    flush_rewrite_rules();

    foreach( $taxonomies as $name => $args ) {
        register_taxonomy( $name, array( 'mt_destinations' ), $args );
    }
}
add_action( 'init', 'taxonomies' );


function filter_post_type_link($link, $post)
{
    if ($post->post_type != 'mt_destinations')
        return $link;

    if ($cats = get_the_terms($post->ID, 'destination_category'))
        $link = str_replace('%destination_category%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

function filter_post_type_link_location($link, $post)
{
    if ($post->post_type != 'mt_destinations')
        return $link;

    if ($cats = get_the_terms($post->ID, 'destination_location'))
        $link = str_replace('%destination_location%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link_location', 10, 2);



<?php
// get the currently queried taxonomy term, for use later in the template file
$destination_location = get_queried_object();

// getting post ids that are assigned to current taxonomy term
$destination_post_IDs = get_posts(array(
  'post_type' => 'mt_destinations',
  'posts_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'destination_location',
      'field' => 'slug',
      'terms' => $destination_location->slug
    )
  ),
  'fields' => 'ids'
));

// getting the terms of 'destination_category', which are assigned to these posts
$destination_category = wp_get_object_terms($destination_post_IDs, 'destination_category');

echo '<ul>';
foreach( $destination_category as $category ){
    echo '<li><a href="' . esc_url( site_url("destinations/location/".$destination_location->slug."/destination-category/".$category->slug) ) . '">'.$category->name.'</a></li>';
}
echo '</ul>';



function eg_add_rewrite_rules() {
    global $wp_rewrite;
 
    $new_rules = array(
        'destinations/(destination-category|location)/(.+?)/(destination-category|location)/(.+?)/?$' => 'index.php?post_type=mt_destinations&' . $wp_rewrite->preg_index(1) . '=' . $wp_rewrite->preg_index(2) . '&' . $wp_rewrite->preg_index(3) . '=' . $wp_rewrite->preg_index(4),
        'destinations/(destination-category|location)/(.+)/?$' => 'index.php?post_type=mt_destinations&' . $wp_rewrite->preg_index(1) . '=' . $wp_rewrite->preg_index(2)
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action( 'generate_rewrite_rules', 'eg_add_rewrite_rules' );