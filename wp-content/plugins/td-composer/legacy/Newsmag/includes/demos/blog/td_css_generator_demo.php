<?php

function td_css_demo_gen() {
	$td_demo_custom_css = "
	<style>
		/* @theme_color */
		.td-stack-classic-blog .td-post-text-content .more-link-wrap:hover a {
			color: @theme_color;
			outline-color: @theme_color;
		}
	</style>
	";

	$td_demo_css_compiler = new td_css_compiler($td_demo_custom_css);

	$td_demo_css_compiler->load_setting('theme_color');

	return $td_demo_css_compiler->compile_css();
}
