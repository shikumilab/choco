<?php
/*
Plugin Name: テーマオプション編集 for ad
Plugin URI: http://www.dmz.co.jp/
Version: 1.0
Description: 広告用スクリプトの設定の為、管理画面にテーマオプションの編集画面を追加
Author: DMZ Corp.
Author URI: http://www.dmz.co.jp/
*/

/* Add Theme Options
-------------------------------------------------------------------------------- */
add_action( 'admin_menu', 'theme_options_add_page' );
add_action( 'admin_bar_menu', 'theme_options_add_menu', 9999 );
function theme_options_add_page() {
	add_theme_page('テーマオプション(広告)', 'テーマオプション(広告)', 'edit_theme_options', 'theme_options', 'edit_setting_menu_page');
}
function edit_setting_menu_page() {
	require plugin_dir_path( __FILE__ )  . '/admin/edit_setting.php';
}
function theme_options_add_menu($wp_admin_bar) {
	if(!is_admin()) {
		$arr_add_menu = array(
			'parent'	=> 'site-name',
			'id'		=> 'theme_option',
			'meta'		=> array(),
			'title'		=> 'テーマオプション',
			'href'		=> admin_url().'/themes.php?page=theme_options'
		);
		$wp_admin_bar->add_menu($arr_add_menu);
	}
}

/* get_option_ex
-------------------------------------------------------------------------------- */
function get_option_ex ($option_name, $echo = true) {
	if($echo) {
		echo wp_unslash(get_option($option_name));
		return;
	} else {
		return wp_unslash(get_option($option_name));
	}
}