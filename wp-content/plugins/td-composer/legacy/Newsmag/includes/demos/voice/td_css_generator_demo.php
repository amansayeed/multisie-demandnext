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
	.td-newsmag-voice .td-subcategory-header a.td-current-sub-category,
	.td-newsmag-voice .td-subcategory-header .td-category a:hover,
	.td-newsmag-voice .td_block_5 .block-title span:after,
	.td-newsmag-voice .td-voice-sidebar .block-title span:after {
      background-color: @theme_color;
    }

	</style>
	";

	$td_demo_css_compiler = new td_css_compiler($td_demo_custom_css);

	$td_demo_css_compiler->load_setting('theme_color');
	$td_demo_css_compiler->load_setting('menu_text_color');

	return $td_demo_css_compiler->compile_css();
}
