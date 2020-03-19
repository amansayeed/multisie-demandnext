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
	.td-sound-square .block-title > *,
	.td-sound-square .td-post-template-4 .td-related-title a:hover,
	.td-sound-square .td-post-template-4 .td-related-title .td-cur-simple-item {
      color: @theme_color;
    }
	.td-sound-square .td_block_2 .td_module_6 .entry-title a:before {
      background-color: @theme_color;
	}

	</style>
	";

	$td_demo_css_compiler = new td_css_compiler($td_demo_custom_css);

	$td_demo_css_compiler->load_setting('theme_color');
	$td_demo_css_compiler->load_setting('menu_text_color');

	return $td_demo_css_compiler->compile_css();
}
