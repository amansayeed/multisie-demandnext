<?php
/*
    Our portfolio:  http://themeforest.net/user/tagDiv/portfolio
    Thanks for using our theme !
    tagDiv - 2016
*/


/**
 * Load the speed booster framework + theme specific files
 */

// load the deploy mode
require_once('td_deploy_mode.php');

// load the config
require_once('includes/td_config.php');
require_once('includes/td_config_helper.php');
add_action('td_global_after', array('td_config', 'on_td_global_after_config'), 9); //we run on 9 priority to allow plugins to updage_key our apis while using the default priority of 10

// load the wp booster
require_once(TDC_PATH . '/legacy/common/wp_booster/td_wp_booster_functions.php');

require_once('includes/widgets/td_page_builder_widgets.php'); // widgets
if ( ! td_util::is_mobile_theme() ) {
    require_once('includes/shortcodes/td_misc_shortcodes.php');
}

require_once('includes/td_css_generator.php');





//d(td_api_base::debug_get_components_list());


/* ----------------------------------------------------------------------------
 * Woo Commerce
 */

// use own pagination
if (!function_exists('woocommerce_pagination')) {
	// pagination
	function woocommerce_pagination() {
		echo td_page_generator::get_pagination();
	}
}



if (!function_exists('woocommerce_output_related_products')) {
	// Number of related products
	function woocommerce_output_related_products() {
		woocommerce_related_products(array(
			'posts_per_page' => 3,
			'columns' => 3,
			'orderby' => 'rand',
		)); // Display 3 products in rows of 1
	}
}




/* ----------------------------------------------------------------------------
 * bbPress
 */
// change avatar size to 40px
function td_bbp_change_avatar_size($author_avatar, $topic_id, $size) {
	$author_avatar = '';
	if ($size == 14) {
		$size = 40;
	}
	$topic_id = bbp_get_topic_id( $topic_id );
	if ( !empty( $topic_id ) ) {
		if ( !bbp_is_topic_anonymous( $topic_id ) ) {
			$author_avatar = get_avatar( bbp_get_topic_author_id( $topic_id ), $size );
		} else {
			$author_avatar = get_avatar( get_post_meta( $topic_id, '_bbp_anonymous_email', true ), $size );
		}
	}
	return $author_avatar;
}
add_filter('bbp_get_topic_author_avatar', 'td_bbp_change_avatar_size', 20, 3);
add_filter('bbp_get_reply_author_avatar', 'td_bbp_change_avatar_size', 20, 3);
add_filter('bbp_get_current_user_avatar', 'td_bbp_change_avatar_size', 20, 3);





/**
 * tdStyleCustomizer.js is required
 */
if (TD_DEBUG_LIVE_THEME_STYLE) {
    add_action('wp_footer', 'td_theme_style_footer');
    function td_theme_style_footer() {
	    ?>
		<a href="https://demo.tagdiv.com/select_demo/select_demo_newsmag#demos" target="_blank" id="td-theme-demos-button" class="td-right-demos-button">DEMOS</a>
		<a href="https://themeforest.net/item/newsmag-news-magazine-newspaper/9512331?license=regular&open_purchase_for_item_id=9512331&purchasable=source" id="td-theme-buy-button" class="td-right-demos-button">BUY</a>
	    <?php
    }
}

//td_demo_state::update_state("magazine", 'full');





