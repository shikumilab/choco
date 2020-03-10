<?php
//メインカラムの手前に何かを挿入したいときは、このテンプレートを編集
//例えば、3カラムの左サイドバーなどをカスタマイズで作りたいときなどに利用します。
?>

<?php if ( wp_is_mobile() ) : ?>
<?php get_option_ex('sp_overlay');?> 

<?php else: ?>
<?php endif; ?>
