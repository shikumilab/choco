<?php
//メインカラムの手前に何かを挿入したいときは、このテンプレートを編集
//例えば、3カラムの左サイドバーなどをカスタマイズで作りたいときなどに利用します。
?>
<?php get_option_ex('sp_overlay');?>

<?php if ( wp_is_mobile() ) : ?>
 

<?php else: ?>
<?php endif; ?>
