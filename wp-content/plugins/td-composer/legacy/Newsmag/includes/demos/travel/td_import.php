<?php
/**
 * Created by ra on 5/14/2015.
 */


/*  ----------------------------------------------------------------------------
    pages
 */
//homepage
$td_homepage_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/homepage.txt',
    'template' => 'default',   // the page template full file name with .php, for default no extension needed
    'td_layout' => '',
    'homepage' => true
));
$td_contactpage_id = td_demo_content::add_page(array(
    'title' => 'Contact',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/contact.txt',
    'template' => 'page-pagebuilder-title.php',   // the page template full file name with .php, for default no extension needed
    'td_layout' => '',
    'sidebar_position' => 'no_sidebar',
    'homepage' => false
));

/*  ---------------------------------------------------------------------------
    top menu - MENUS MUST HAVE THE FOLLOWING NAMES:
    td-demo-top-menu
    td-demo-header-menu
    td-demo-footer-menu
*/


//main menu
$td_demo_header_menu_id = td_demo_menus::create_menu('td-demo-header-menu', 'header-menu');


//footer menu
$td_demo_footer_menu = td_demo_menus::create_menu('td-demo-footer-menu', 'footer-menu');
td_demo_menus::add_link(array(
    'title' => 'About',
    'add_to_menu_id' => $td_demo_footer_menu,
    'url' => '#',
    'parent_id' => ''
));
td_demo_menus::add_link(array(
    'title' => 'Blog',
    'add_to_menu_id' => $td_demo_footer_menu,
    'url' => '#',
    'parent_id' => ''
));
//add the contact-page to the top menu
td_demo_menus::add_page(array(
    'title' => 'Contact Us',
    'add_to_menu_id' => $td_demo_footer_menu,
    'page_id' => $td_contactpage_id,
    'parent_id' => ''
));


/*  ----------------------------------------------------------------------------
    background - leave empty if you want to make sure that there is NO background on the demo - td_demo_misc::update_background('');
 */
td_demo_misc::update_background('td_travel_bg');
td_demo_misc::update_background_login('td_travel_bg');
td_demo_misc::update_background_mobile('td_travel_bg');



/*  ----------------------------------------------------------------------------
    logo
 */
td_demo_misc::update_logo(array(
    'normal' => 'td_header_logo',
    'retina' => '',
    'mobile' => 'td_mobile_logo'
));


//footer
td_demo_misc::update_footer_logo(array(
    'normal' => 'td_footer_logo',
    'retina' => ''
));


/*  ----------------------------------------------------------------------------
    footer text
 */
td_demo_misc::update_footer_text('We provide the latest breaking news and videos straight from the travel industry.');



/*  ----------------------------------------------------------------------------
    socials
 */
td_demo_misc::add_social_buttons(array(
    'facebook' => 'https://www.facebook.com/TagDiv/',
    'twitter' => 'https://twitter.com/tagdivofficial',
    'googleplus' => 'https://plus.google.com/+tagdivThemes',
    'instagram' => 'https://www.instagram.com/tagdiv/',
    'youtube' => 'https://www.youtube.com/user/tagdiv'
));


/*  ----------------------------------------------------------------------------
    ads
 */
td_demo_misc::clear_all_ads();
td_demo_misc::add_ad_image('header', 'td_travel_ad_header');
td_demo_misc::add_ad_image('sidebar', 'td_travel_ad_sidebar');
td_demo_misc::add_ad_image('custom_ad_1', 'td_travel_ad_big');


/*  ----------------------------------------------------------------------------
    sidebars
 */

//default sidebar
td_demo_widgets::remove_widgets_from_sidebar('default');
td_demo_widgets::add_widget_to_sidebar('default', 'td_block_social_counter_widget',
    array (
        'facebook' => 'tagdiv',
        'twitter' => 'tagdivofficial',
        'youtube' => 'tagdiv',
        'border_top'=> 'no_border_top'
    )
);
td_demo_widgets::add_widget_to_sidebar('default', 'td_block_ad_box_widget',
    array (
        'spot_title' => '- Advertisement -',
        'spot_id' => 'sidebar'
    )
);
td_demo_widgets::add_widget_to_sidebar('default', 'td_block_9_widget',
    array (
        'sort' => 'random_posts',
        'custom_title' => 'Don\'t Miss',
        'limit' => '4',
        'header_color' => '',
        'ajax_pagination' => "load_more"
    )
);


/*  ---------------------------------------------------------------------------
    categories
*/
$demo_cat_1_id =td_demo_category::add_category(array(
    'category_name' => 'Places',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
));
    $demo_cat_2_id =td_demo_category::add_category(array(
        'category_name' => 'Countryside',
        'parent_id' => $demo_cat_1_id,
        'category_template' => '',
        'top_posts_style' => '',
        'description' => '',
        'background_td_pic_id' => '',
        'sidebar_id' => '',
        'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
        'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar

    ));
    $demo_cat_3_id =td_demo_category::add_category(array(
        'category_name' => 'Desert',
        'parent_id' => $demo_cat_1_id,
        'category_template' => '',
        'top_posts_style' => '',
        'description' => '',
        'background_td_pic_id' => '',
        'sidebar_id' => '',
        'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
        'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
    ));
    $demo_cat_4_id =td_demo_category::add_category(array(
        'category_name' => 'Mountains',
        'parent_id' => $demo_cat_1_id,
        'category_template' => '',
        'top_posts_style' => '',
        'description' => '',
        'background_td_pic_id' => '',
        'sidebar_id' => '',
        'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
        'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
    ));
    $demo_cat_5_id =td_demo_category::add_category(array(
        'category_name' => 'Seaside',
        'parent_id' => $demo_cat_1_id,
        'category_template' => '',
        'top_posts_style' => '',
        'description' => '',
        'background_td_pic_id' => '',
        'sidebar_id' => '',
        'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
        'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
    ));
    $demo_cat_6_id =td_demo_category::add_category(array(
        'category_name' => 'Urban',
        'parent_id' => $demo_cat_1_id,
        'category_template' => '',
        'top_posts_style' => '',
        'description' => '',
        'background_td_pic_id' => '',
        'sidebar_id' => '',
        'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
        'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
    ));
$demo_cat_7_id =td_demo_category::add_category(array(
    'category_name' => "Food",
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
));

$demo_cat_8_id =td_demo_category::add_category(array(
    'category_name' => 'Resorts',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
));
$demo_cat_9_id =td_demo_category::add_category(array(
    'category_name' => 'Airplane',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
));
$demo_cat_10_id =td_demo_category::add_category(array(
	'category_name' => 'Cruises',
	'parent_id' => 0,
	'category_template' => '',
	'top_posts_style' => '',
	'description' => '',
	'background_td_pic_id' => '',
	'sidebar_id' => '',
	'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
	'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
));
$demo_cat_11_id =td_demo_category::add_category(array(
    'category_name' => 'Tips',
    'parent_id' => 0,
    'category_template' => '',
    'top_posts_style' => '',
    'description' => '',
    'background_td_pic_id' => '',
    'sidebar_id' => '',
    'tdc_layout' => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
    'tdc_sidebar_pos' => '' //sidebar_left, sidebar_right, no_sidebar
));




/*  ----------------------------------------------------------------------------
    menu
 */

//add the homepage to the menu
td_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $td_demo_header_menu_id,
    'page_id' => $td_homepage_id,
    'parent_id' => ''
));

// mega menu multiple subcateg
td_demo_menus::add_mega_menu(array(
    'title' => 'Places',
    'add_to_menu_id' => $td_demo_header_menu_id,
    'category_id' => $demo_cat_1_id
));

// mega menu one subcateg
td_demo_menus::add_mega_menu(array(
    'title' => 'Food',
    'add_to_menu_id' => $td_demo_header_menu_id,
    'category_id' => $demo_cat_7_id
));
td_demo_menus::add_mega_menu(array(
    'title' => 'Resorts',
    'add_to_menu_id' => $td_demo_header_menu_id,
    'category_id' => $demo_cat_8_id
));

// add a subcategory to the sub-menu
$parent_submenu_id = td_demo_menus::add_link(array(
    'title' => 'More',
    'add_to_menu_id' => $td_demo_header_menu_id,
    'url' => '#',
    'parent_id' => ''
));

td_demo_menus::add_category(array(
    'title' => 'Airplane',
    'add_to_menu_id' => $td_demo_header_menu_id,
    'category_id' => $demo_cat_9_id,
    'parent_id' => $parent_submenu_id
));
td_demo_menus::add_category(array(
    'title' => 'Cruises',
    'add_to_menu_id' => $td_demo_header_menu_id,
    'category_id' => $demo_cat_10_id,
    'parent_id' => $parent_submenu_id
));
td_demo_menus::add_category(array(
    'title' => 'Tips',
    'add_to_menu_id' => $td_demo_header_menu_id,
    'category_id' => $demo_cat_11_id,
    'parent_id' => $parent_submenu_id
));

/*  ---------------------------------------------------------------------------
    posts
*/
// post in featured category
td_demo_content::add_post(array(
    'title' => 'Don’t Make These Rookie Travel Mistakes',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array(get_cat_ID(TD_FEATURED_CAT), $demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_1'
));
td_demo_content::add_post(array(
    'title' => 'USA Resorts Awesome for Lovers',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array(get_cat_ID(TD_FEATURED_CAT), $demo_cat_8_id),
    'featured_image_td_id' => 'td_pic_2'
));
td_demo_content::add_post(array(
    'title' => "From Paris to Prague on Water",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array(get_cat_ID(TD_FEATURED_CAT), $demo_cat_10_id),
    'featured_image_td_id' => 'td_pic_3'
));
td_demo_content::add_post(array(
    'title' => "5 Things Flight Travelers Want",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array(get_cat_ID(TD_FEATURED_CAT), $demo_cat_9_id),
    'featured_image_td_id' => 'td_pic_4'
));
td_demo_content::add_post(array(
    'title' => "Unique Elephant Experience",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array(get_cat_ID(TD_FEATURED_CAT), $demo_cat_2_id),
    'featured_image_td_id' => 'td_pic_5'
));
td_demo_content::add_post(array(
    'title' => "America’s White Mountains",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array(get_cat_ID(TD_FEATURED_CAT), $demo_cat_4_id),
    'featured_image_td_id' => 'td_pic_6'
));


//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => 'Don’t Make These Rookie Travel Mistakes',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id,$demo_cat_3_id,$demo_cat_4_id,$demo_cat_5_id,$demo_cat_6_id,$demo_cat_7_id,$demo_cat_8_id,$demo_cat_9_id,$demo_cat_10_id,$demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_1'
));
td_demo_content::add_post(array(
    'title' => 'USA Resorts Awesome for Lovers',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id,$demo_cat_3_id,$demo_cat_4_id,$demo_cat_5_id,$demo_cat_6_id,$demo_cat_7_id,$demo_cat_8_id,$demo_cat_9_id,$demo_cat_10_id,$demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_2'
));
td_demo_content::add_post(array(
    'title' => "From Paris to Prague on Water",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id,$demo_cat_3_id,$demo_cat_4_id,$demo_cat_5_id,$demo_cat_6_id,$demo_cat_7_id,$demo_cat_8_id,$demo_cat_9_id,$demo_cat_10_id,$demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_3'
));
td_demo_content::add_post(array(
    'title' => "5 Things Flight Travelers Want",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id,$demo_cat_3_id,$demo_cat_4_id,$demo_cat_5_id,$demo_cat_6_id,$demo_cat_7_id,$demo_cat_8_id,$demo_cat_9_id,$demo_cat_10_id,$demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_4'
));
td_demo_content::add_post(array(
    'title' => "Unique Elephant Experience",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id,$demo_cat_3_id,$demo_cat_4_id,$demo_cat_5_id,$demo_cat_6_id,$demo_cat_7_id,$demo_cat_8_id,$demo_cat_9_id,$demo_cat_10_id,$demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_5'
));
td_demo_content::add_post(array(
    'title' => "America’s White Mountains",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id,$demo_cat_3_id,$demo_cat_4_id,$demo_cat_5_id,$demo_cat_6_id,$demo_cat_7_id,$demo_cat_8_id,$demo_cat_9_id,$demo_cat_10_id,$demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_6'
));

//  ----------------------------------------------------------------------------
//  Mix Cat

td_demo_content::add_post(array(
    'title' => "Don’t Make These Rookie Travel Mistakes",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_7'
));
td_demo_content::add_post(array(
    'title' => 'A Guide to Staying Healthy on Vacation',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_8'
));
td_demo_content::add_post(array(
    'title' => "Best Budget Destinations for Fall",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_9'
));
td_demo_content::add_post(array(
    'title' => "Avoid These Three Pastravel Scams",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_10'
));
td_demo_content::add_post(array(
    'title' => "Best Things You Can Do on a Solo Trip",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_1'
));
td_demo_content::add_post(array(
    'title' => "Top 10 Mistakes Tourists Make in Italy",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_11_id),
    'featured_image_td_id' => 'td_pic_2'
));

//  ----------------------------------------------------------------------------
//
td_demo_content::add_post(array(
    'title' => "Cuba Resorts that are Simply Awesome",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_8_id),
    'featured_image_td_id' => 'td_pic_3'
));
td_demo_content::add_post(array(
    'title' => 'Top 10 Family Resorts Worldwide',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_8_id),
    'featured_image_td_id' => 'td_pic_4'
));
td_demo_content::add_post(array(
    'title' => "Cheapest Luxury Hotels in the World",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_8_id),
    'featured_image_td_id' => 'td_pic_5'
));
td_demo_content::add_post(array(
    'title' => "New & Remodeled Las Vegas Hotels",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_8_id),
    'featured_image_td_id' => 'td_pic_6'
));
td_demo_content::add_post(array(
    'title' => "5 Bad Hotel Habits to Break Now",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_8_id),
    'featured_image_td_id' => 'td_pic_7'
));
td_demo_content::add_post(array(
    'title' => "Best All-Inclusive Resorts in Turkey",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_8_id),
    'featured_image_td_id' => 'td_pic_8'
));

//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => "25 Big Differences Between River & Ocean Cruises",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_10_id),
    'featured_image_td_id' => 'td_pic_9'
));
td_demo_content::add_post(array(
    'title' => 'Cruise from Charleston to the Bahamas',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_10_id),
    'featured_image_td_id' => 'td_pic_10'
));
td_demo_content::add_post(array(
    'title' => "Cruise from Budapest to the Danube Delta",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_10_id),
    'featured_image_td_id' => 'td_pic_1'
));
td_demo_content::add_post(array(
    'title' => "10 Myths About Cruise Ships and Cruising",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_10_id),
    'featured_image_td_id' => 'td_pic_2'
));
td_demo_content::add_post(array(
    'title' => "How to Choose the Best Cabin on a Cruise Ship",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_10_id),
    'featured_image_td_id' => 'td_pic_3'
));
td_demo_content::add_post(array(
    'title' => "Cruises of a Lifetime You Can Actually Afford",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_10_id),
    'featured_image_td_id' => 'td_pic_4'
));

//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => "5 Things Flight Travelers Want",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_9_id),
    'featured_image_td_id' => 'td_pic_5'
));
td_demo_content::add_post(array(
    'title' => '10 Actions That Will Get You Kicked Off a Plane',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_9_id),
    'featured_image_td_id' => 'td_pic_6'
));
td_demo_content::add_post(array(
    'title' => "What is the Cheapest Day to Book a Flight",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_9_id),
    'featured_image_td_id' => 'td_pic_7'
));
td_demo_content::add_post(array(
    'title' => "Worst Things to Tell a Flight Attendant",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_9_id),
    'featured_image_td_id' => 'td_pic_8'
));
td_demo_content::add_post(array(
    'title' => "5 Airport Expenses to Avoid",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_9_id),
    'featured_image_td_id' => 'td_pic_9'
));
td_demo_content::add_post(array(
    'title' => "The World’s Most Dangerous Airlines",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_9_id),
    'featured_image_td_id' => 'td_pic_10'
));

//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => "Unique Places to Stay and Visit in Italy",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id),
    'featured_image_td_id' => 'td_pic_1'
));
td_demo_content::add_post(array(
    'title' => 'Discover a Motel in Mystic, Connecticut',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id),
    'featured_image_td_id' => 'td_pic_2'
));
td_demo_content::add_post(array(
    'title' => "Unique Countryside Tour in Toscany",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id),
    'featured_image_td_id' => 'td_pic_3'
));
td_demo_content::add_post(array(
    'title' => "Hiking Trails in San Jose and Silicon Valley",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id),
    'featured_image_td_id' => 'td_pic_4'
));
td_demo_content::add_post(array(
    'title' => "Take an Epic Cross-Country Road Trip",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id),
    'featured_image_td_id' => 'td_pic_5'
));
td_demo_content::add_post(array(
    'title' => "Where to Find Morocco’s True Flavors",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_2_id),
    'featured_image_td_id' => 'td_pic_6'
));

//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => "6 Tips for Visiting Oslo in Winter",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_6_id),
    'featured_image_td_id' => 'td_pic_7'
));
td_demo_content::add_post(array(
    'title' => 'Top French Cities You Should Visit',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_6_id),
    'featured_image_td_id' => 'td_pic_8'
));
td_demo_content::add_post(array(
    'title' => "10 Cities That Are Stylish Steals",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_6_id),
    'featured_image_td_id' => 'td_pic_9'
));
td_demo_content::add_post(array(
    'title' => "Most Spectacular Labor Day Getaways",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_6_id),
    'featured_image_td_id' => 'td_pic_10'
));
td_demo_content::add_post(array(
    'title' => "Coolest Small Towns in America 2015",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_6_id),
    'featured_image_td_id' => 'td_pic_1'
));
td_demo_content::add_post(array(
    'title' => "5 Ways to Do Tokyo Like a Chef",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_6_id),
    'featured_image_td_id' => 'td_pic_2'
));

//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => "Yummy Honeymoons for Food Travelers",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_7_id),
    'featured_image_td_id' => 'td_pic_3'
));
td_demo_content::add_post(array(
    'title' => 'How Much Should You Tip in Swiss Restaurants',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_7_id),
    'featured_image_td_id' => 'td_pic_4'
));
td_demo_content::add_post(array(
    'title' => "September 2015 Food Festivals",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_7_id),
    'featured_image_td_id' => 'td_pic_5'
));
td_demo_content::add_post(array(
    'title' => "Travel the World For Your Favorite Foods",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_7_id),
    'featured_image_td_id' => 'td_pic_6'
));
td_demo_content::add_post(array(
    'title' => "Dishes We’d Travel Back in Time to Eat Again",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_7_id),
    'featured_image_td_id' => 'td_pic_7'
));
td_demo_content::add_post(array(
    'title' => "7 Healthy D.I.Y. Airplane Snacks",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_7_id),
    'featured_image_td_id' => 'td_pic_8'
));

//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => 'Top 12 Desert Escapes You’ll Love',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_3_id),
    'featured_image_td_id' => 'td_pic_9'
));
td_demo_content::add_post(array(
    'title' => "California Desert Travel Insights",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_3_id),
    'featured_image_td_id' => 'td_pic_10'
));
td_demo_content::add_post(array(
    'title' => 'Best 10 Dubai Travel Tips',
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_3_id),
    'featured_image_td_id' => 'td_pic_1'
));
td_demo_content::add_post(array(
    'title' => "The Mojave Desert Travel Guide",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_3_id),
    'featured_image_td_id' => 'td_pic_2'
));
td_demo_content::add_post(array(
    'title' => "How to Travel in the Desert",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_3_id),
    'featured_image_td_id' => 'td_pic_3'
));
td_demo_content::add_post(array(
    'title' => "Top 5 Things to Do in the Sahara Desert",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_3_id),
    'featured_image_td_id' => 'td_pic_4'
));


//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => "Everest: Mountaineering Goes Hollywood",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_4_id),
    'featured_image_td_id' => 'td_pic_5'
));
td_demo_content::add_post(array(
    'title' => "Top 10 Ideas for a Greener Vacation",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_4_id),
    'featured_image_td_id' => 'td_pic_6'
));
td_demo_content::add_post(array(
    'title' => "Best Spots to See Wildlife in the U.S.",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_4_id),
    'featured_image_td_id' => 'td_pic_7'
));
td_demo_content::add_post(array(
    'title' => "Europe’s Most Beautiful Mountains",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_4_id),
    'featured_image_td_id' => 'td_pic_8'
));
td_demo_content::add_post(array(
    'title' => "Lake Como: A True Love Story",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_4_id),
    'featured_image_td_id' => 'td_pic_9'
));
td_demo_content::add_post(array(
    'title' => "Rafting the Grand Canyon",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_4_id),
    'featured_image_td_id' => 'td_pic_10'
));

//  ----------------------------------------------------------------------------
td_demo_content::add_post(array(
    'title' => "6 Most Beautiful Beaches of Brazil",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_5_id),
    'featured_image_td_id' => 'td_pic_1'
));
td_demo_content::add_post(array(
    'title' => "Best Island Escapes You Can Drive To",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_5_id),
    'featured_image_td_id' => 'td_pic_2'
));
td_demo_content::add_post(array(
    'title' => "12 Beautiful Beach Town Bargains",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_5_id),
    'featured_image_td_id' => 'td_pic_3'
));
td_demo_content::add_post(array(
    'title' => "Affordable Tropical Island Getaways",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_5_id),
    'featured_image_td_id' => 'td_pic_4'
));
td_demo_content::add_post(array(
    'title' => "Costa Rica: Living La Vida Loca",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_5_id),
    'featured_image_td_id' => 'td_pic_5'
));
td_demo_content::add_post(array(
    'title' => "5 Must-See Islands of the World",
    'file' => TDC_PATH_LEGACY . '/includes/demos/travel/pages/post_default.txt',
    'categories_id_array' => array($demo_cat_5_id),
    'featured_image_td_id' => 'td_pic_6'
));