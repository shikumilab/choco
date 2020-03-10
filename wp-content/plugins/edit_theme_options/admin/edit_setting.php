<?php
	$action_url = 'themes.php?page=theme_options';
	$h2_title =  'テーマオプション';

	$arr_option = array();

	/* --------------------------------------------------------------------- */

	$sec_id = 'Header';
	$arr_option[$sec_id] = array('title' => 'Header設定');

	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'ad_header_javascript',               'title'  => 'ヘッダー Javascript');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_header_javascript',               'title'  => 'PC_ヘッダー Javascript');


	/* --------------------------------------------------------------------- */

	$sec_id = 'sp';
	$arr_option[$sec_id] = array('title' => 'SP　広告設定');
	$arr_option[$sec_id]['item'][] = array('type' => 'line', 'id' => '', 'title' => '記事詳細');

	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'sp_overlay',                         'title' => 'SP_オーバレイ');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_title_bottom',                    'title' => 'RP_タイトル下');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_content_inside_1',                'title' => 'RP_記事中1');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_content_inside_2',                'title' => 'RP_記事中2');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_content_inside_3',                'title' => 'RP_記事中3');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_content_inside_4',                'title' => 'RP_記事中4');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_content_inside_5',                'title' => 'RP_記事中5');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_content_inside_6',                'title' => 'RP_記事中6');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_content_bottom_1',                'title' => 'RP_記事下1');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_content_bottom_2',                'title' => 'RP_記事下2');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'rp_recommend_1',                     'title' => 'RP_記事下レコメンド');

	/* --------------------------------------------------------------------- */

	$sec_id = 'amp';
	$arr_option[$sec_id] = array('title' => 'AMP　広告設定');
	$arr_option[$sec_id]['item'][] = array('type' => 'line', 'id' => '', 'title' => 'AMP');

	/* --------------------------------------------------------------------- */

	$sec_id = 'pc';
	$arr_option[$sec_id] = array('title' => 'PC　広告設定');

	$arr_option[$sec_id]['item'][] = array('type' => 'line', 'id' => '', 'title' => '記事詳細');

	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_content_inside_1',                'title' => 'PC_記事中1');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_content_inside_2',                'title' => 'PC_記事中2');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_content_inside_3',                'title' => 'PC_記事中3');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_content_inside_4',                'title' => 'PC_記事中4');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_content_inside_5',                'title' => 'PC_記事中5');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_content_inside_6',                'title' => 'PC_記事中6');

	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_sidebar_top',                     'title' => 'PC_サイドバートップ');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_sidebar_middle',                  'title' => 'PC_サイドバー中');
	$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => 'pc_sidebar_bottom',                  'title' => 'PC_サイドバー下');
	//$arr_option[$sec_id]['item'][] = array('type' => 'textarea', 'id' => '',                      'title' => '');

	/* --------------------------------------------------------------------- */


	include 'inc/option-settings.php';

	if (is_user_logged_in()) {

		wp_register_script( 'admin-to', plugins_url() . '/edit_theme_options/admin/js/admin-to.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'admin-to' );

		// thickboxに必要なコンテンツを読込
		add_thickbox();

		// add_option
		foreach ($arr_option as $key_sec => $val_sec) {
			foreach ($val_sec['item'] as $key => $val) {
				if($val['type'] == 'text' || $val['type'] == 'textarea' || $val['type'] == 'image' || $val['type'] == 'color' || $val['type'] == 'check' || $val['type'] == 'radio' || $val['type'] == 'select') {
					add_option($val['id']);
				}
			}
		}

		// update_option
		if ($_REQUEST['submit']){
			foreach ($arr_option as $key_sec => $val_sec) {
				foreach ($val_sec['item'] as $key => $val) {
					if($val['type'] == 'text' || $val['type'] == 'textarea' || $val['type'] == 'image' || $val['type'] == 'color' || $val['type'] == 'check' || $val['type'] == 'radio' || $val['type'] == 'select') {
						update_option($val['id'], $_REQUEST[$val['id']]);
					}
				}
			}
		}
?>
<link rel="stylesheet" href="<?php echo plugins_url(); ?>/edit_theme_options/admin/css/option.css">
<script type="text/javascript">
var wpUrl = '<?php echo get_bloginfo("wpurl"); ?>';
var action_url = '<?php echo $action_url; ?>';
</script>

<div class="wrap">
	<form id="to_action" method="post" action="<?php echo $action_url; ?>">

		<h2><?php echo $h2_title; ?></h2>
		<p>修正後は「変更を保存」ボタンをクリックして下さい</p>
		<p class="submit to">
			<input type="submit" name="submit" id="submit" class="button-primary" value="変更を保存">
		</p>

		<?php print_option_html($arr_option); ?>

		<p class="submit to">
			<input type="submit" name="submit" id="submit" class="button-primary" value="変更を保存">
		</p>
	</form>
</div>
<?php
	//ログインチェックEND
	}
?>
