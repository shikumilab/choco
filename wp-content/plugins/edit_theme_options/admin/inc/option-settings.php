<?php
	/* print_option_html
	-------------------------------------------------------------------------------- */
	function print_option_html ($arr_option) {

		echo '<div id="to-wrapper" class="clf">';
		echo '	<div id="to-tabs">';
		echo '		<ul>';
		foreach ($arr_option as $key_sec => $val_sec) {
			echo '<li id="tab-'.$key_sec.'">'.$val_sec['title'].'</li>';
		}
		echo '		</ul>';
		echo '	</div>';

		echo '	<div id="to-items">';

		foreach ($arr_option as $key_sec => $val_sec) {

			echo '<div id="'.$key_sec.'" class="to-item">';
			echo '	<h3>'.$val_sec['title'].'</h3>';
			echo '	<table class="form-table">';

			foreach ($val_sec['item'] as $key => $val) {

				switch ($val['type']) {
					case 'line':
						print_item_line($val);
						break;
					case 'text':
						print_item_text($val);
						break;
					case 'color':
						print_item_color($val);
						break;
					case 'textarea':
						print_item_textarea($val);
						break;
					case 'image':
						print_item_image($val);
						break;
					case 'check':
						print_item_check($val);
						break;
					case 'radio':
						print_item_radio($val);
						break;
					case 'select':
						print_item_select($val);
						break;
					default:
						break;
				}
			}

			echo '	</table>';
			echo '</div>';
		}

		echo '	</div>';
		echo '</div>';

		return;
	}

	/* print_item_line
	-------------------------------------------------------------------------------- */
	function print_item_line ($arr_option) {
?>
			<tr class="line <?php echo $arr_option['class']; ?> <?php if($arr_option['title']) { echo 'title'; } ?>">
				<th class="row" colspan="2"><?php echo $arr_option['title']; ?></th>
			</tr>
<?php
		return;
	}

	/* print_item_text
	-------------------------------------------------------------------------------- */
	function print_item_text ($arr_option) {
?>
			<tr class="text <?php echo $arr_option['class']; ?>">
				<th scope="row">
					<label for="<?php echo $arr_option['id']; ?>"><?php echo $arr_option['title']; ?></label>
				</th>
				<td>
					<div><?php echo $arr_option['id']; ?></div>
					<input type="text" name="<?php echo $arr_option['id']; ?>" id="<?php echo $arr_option['id']; ?>" value="<?php echo esc_textarea(wp_unslash(get_option($arr_option['id']))); ?>" />
				</td>
			</tr>
<?php
		return;
	}

	/* print_item_color
	-------------------------------------------------------------------------------- */
	function print_item_color ($arr_option) {
?>
			<tr class="text color <?php echo $arr_option['class']; ?>">
				<th scope="row">
					<span class="color" style="background-color: #<?php esc_attr_e(get_option($arr_option['id'])); ?>;">&nbsp;</span><label for="<?php echo $arr_option['id']; ?>"><?php echo $arr_option['title']; ?></label>
				</th>
				<td>
					<div><?php echo $arr_option['id']; ?></div>
					<input type="text" name="<?php echo $arr_option['id']; ?>" id="<?php echo $arr_option['id']; ?>" value="<?php echo esc_textarea(wp_unslash(get_option($arr_option['id']))); ?>" />
				</td>
			</tr>
<?php
		return;
	}

	/* print_item_textarea
	-------------------------------------------------------------------------------- */
	function print_item_textarea ($arr_option) {
?>
			<tr class="textarea <?php echo $arr_option['class']; ?>">
				<th scope="row">
					<label for="<?php echo $arr_option['id']; ?>"><?php echo $arr_option['title']; ?></label>
				</th>
				<td>
					<div><?php echo $arr_option['id']; ?></div>
					<textarea name="<?php echo $arr_option['id']; ?>" id="<?php echo $arr_option['id']; ?>" style="<?php echo $arr_option['style']; ?>"><?php echo esc_textarea(wp_unslash(get_option($arr_option['id']))); ?></textarea>
				</td>
			</tr>
<?php
		return;
	}

	/* print_item_image
	-------------------------------------------------------------------------------- */
	function print_item_image ($arr_option) {
?>
			<tr class="image <?php echo $arr_option['class']; ?>">
				<th scope="row">
					<label for="<?php echo $arr_option['id']; ?>"><?php echo $arr_option['title']; ?></label>
				</th>
				<td>
					<p class="imagebox">
						<input type="submit" class="btn-add-image" value="画像を変更" />
						<input type="text" name="<?php echo $arr_option['id']; ?>" id="<?php echo $arr_option['id']; ?>" class="image-text" value="<?php esc_attr_e(get_option($arr_option['id'])); ?>" size="40" /><br />
						<span class="thumbnail">
							<a href="<?php esc_attr_e(get_option($arr_option['id'])); ?>" class="image thickbox">
							<?php if(get_option($arr_option['id'])<>""){ ?>
								<img src="<?php esc_attr_e(get_option($arr_option['id'])); ?>" />
							<?php } ?>
							</a>
						</span>
						<img class="cancel" src="" width="16" height="16" style="display:none;" />
					</p>
				</td>
			</tr>
<?php
		return;
	}

	/* print_item_check
	-------------------------------------------------------------------------------- */
	function print_item_check ($arr_option) {
		if(get_option($arr_option['id'])) {
			$is_check = true;
		}
?>
			<tr class="check <?php echo $arr_option['class']; ?>">
				<th scope="row">
					<label for="<?php echo $arr_option['id']; ?>"><?php echo $arr_option['title']; ?></label>
				</th>
				<td>
					<input type="checkbox" name="<?php echo $arr_option['id']; ?>" id="<?php echo $arr_option['id']; ?>" <?php if($is_check) { echo 'checked="checked"'; } ?> /><label for="<?php echo $arr_option['id']; ?>"><?php echo $arr_option['label']; ?></label>
				</td>
			</tr>
<?php
		return;
	}

	/* print_item_radio
	-------------------------------------------------------------------------------- */
	function print_item_radio ($arr_option) {
		$curval = get_option($arr_option['id']);
?>
			<tr class="radio <?php echo $arr_option['class']; ?>">
				<th scope="row">
					<label for="<?php echo $arr_option['id']; ?>"><?php echo $arr_option['title']; ?></label>
				</th>
				<td>
				<?php
					foreach ($arr_option['item'] as $key => $val) {
						if($val['val'] == $curval) {
							$is_check = true;
						} else {
							$is_check = false;
						}
				?>
					<input type="radio" name="<?php echo $arr_option['id']; ?>" id="<?php echo $arr_option['id'].'-'.$val['val']; ?>" value="<?php echo $val['val']; ?>" <?php if($is_check) { echo 'checked="checked" class="on"'; } ?> /><label for="<?php echo $arr_option['id'].'-'.$val['val']; ?>"><?php echo $val['label']; ?></label>
				<?php } ?>
				</td>
			</tr>
<?php
		return;
	}

	/* print_item_select
	-------------------------------------------------------------------------------- */
	function print_item_select ($arr_option) {
		$curval = get_option($arr_option['id']);
		$out_option = array();
?>
			<tr class="select <?php echo $arr_option['class']; ?>">
				<th scope="row">
					<label for="<?php echo $arr_option['id']; ?>"><?php echo $arr_option['title']; ?></label>
				</th>
				<td>
				<?php
					$is_removed = true;
					$is_private = true;
					if($curval) {
						foreach ($arr_option['item'] as $key => $val) {
							if($val['val'] == $curval) {
								$is_removed = false;
							}
						}
						if($is_removed) {
							$arr_option['item'][0]['label'] = '--- 投稿削除済み ---';
						}
					}
					foreach ($arr_option['item'] as $key => $val) {
						if($val['val'] == $curval) {
							$is_check = true;
						} else {
							$is_check = false;
						}
						if($is_check) {
							if($val['post_status'] == 'publish') {
								$is_private = false;
							}
							$out_option[] = '<option value="'.$val['val'].'" selected="selected" class="on">'.$val['label'].'</option>';
						} else {
							$out_option[] = '<option value="'.$val['val'].'">'.$val['label'].'</option>';
						}
					}
				?>
					<select name="<?php echo $arr_option['id']; ?>" id="<?php echo $arr_option['id']; ?>" <?php if($is_private || $is_removed) { echo 'class="off"'; } ?>>
						<?php foreach ($out_option as $key => $val) { echo $val; } ?>
					</select>
				</td>
			</tr>
<?php
		return;
	}
?>