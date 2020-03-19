<?php
/**
 * Created by ra.
 * Date: 9/2/2015
 * CSS generator for this specific demo
 */


function td_css_demo_gen() {
	$td_demo_custom_css = "
	<style>

	/*@theme_color */
	.td-newsmag-food .td-header-style-10 .sf-menu > li > a:hover,
    .td-newsmag-food .td-header-style-10 .sf-menu > .sfHover > a,
    .td-newsmag-food .td-header-style-10 .sf-menu > .current-menu-item > a,
    .td-newsmag-food .td-header-style-10 .sf-menu > .current-menu-ancestor > a,
    .td-newsmag-food .td-header-style-10 .sf-menu > .current-category-ancestor > a, 
    .td-newsmag-food .td-related-title .td-cur-simple-item, 
    .td-newsmag-food.td_module_wrap .td-post-category, 
    .td-newsmag-food.td_module_mega_menu .td-post-category, 
    .td-newsmag-food.td_module_related_posts .td-post-category,
    .td-newsmag-food .td-food-img-row .td-social-style9 .td_social_type:hover,
    .td-newsmag-food.single_template_3 .td-post-header .td-category a,
    .td-newsmag-food .td-related-title .td-related-left:hover, 
    .td-newsmag-food .td-related-title .td-related-right:hover {
      color: @theme_color;
    }

	</style>
	";

	$td_demo_css_compiler = new td_css_compiler($td_demo_custom_css);

	$td_demo_css_compiler->load_setting('theme_color');
	$td_demo_css_compiler->load_setting('menu_text_color');

	return $td_demo_css_compiler->compile_css();
}
