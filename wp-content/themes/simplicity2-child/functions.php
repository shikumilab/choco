<?php //子テーマ用関数

//親skins の取得有無の設定
function include_parent_skins(){
  return true; //親skinsを含める場合はtrue、含めない場合はfalse
}

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下にSimplicity子テーマ用の関数を書く

/* カテゴリーページの順番を変更する。 
新しい順：DESC
古い記事が上：ASC
一部カテゴリーページだけの順番を変更するときは
is_category('カテゴリースラッグ')
カテゴリースラッグを設定する
*/
function my_pre_get_posts($query) {
    if (is_category('')) {
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'my_pre_get_posts');