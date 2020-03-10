(function ($) {

	var custom_uploader;

	$('.btn-add-image').click(function(e) {
		e.preventDefault();

		// inputフィールドを取得
		$box = $(this).closest('.imagebox');
		$inp = $box.find('input.image-text');

		// 既にメディアアップローダーのインスタンスが存在する場合
		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		// メディアアップローダーのインスタンスを生成
		custom_uploader = wp.media({
			title: "画像ファイルを選択",
			/* ライブラリの一覧は画像のみにする */
			library: {
				type: "image"
			},
			button: {
				text: "画像ファイルを選択"
			},
			/* 選択できる画像は 1 つだけにする */
			multiple: false
		});

		// メディア選択時のイベント
		custom_uploader.on('select', function() {

			// 選択したメディア情報を取得
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			var file_dir_name = attachment.url.replace(wpUrl, "");

			// メディアのURLをinputフィールドに設定
			// [参考] http://webcake.no003.info/webdesign/wordpress-media-uploader-values.html
			$inp.val(file_dir_name);

			/* プレビュー用に選択されたサムネイル画像を表示 */
			$box
				.find('a.image')
				.attr('href',file_dir_name)
				.html('<img src="' + file_dir_name + '" width="150" />');
		});

		custom_uploader.open();

	});

	/* クリアボタンを押した時の処理 */
	$("input:button[name=media-clear]").click(function() {
	
		$("input:text[name=mediaid]").val("");
		$("#media").empty();

	});

})(jQuery);
