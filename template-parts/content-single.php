<?php
/**
 * Template part for displaying sidbar
 * 
 * @package frx
 */
?>
<div class="hold-header">
<h1 id="main-header" class="mt-3"><?php the_title() ?> </h1>
</div>

<?php the_content();?>

<div class="cat-tags">

<?php get_template_part( 'template-parts/pills-tag' ); ?>
 
<?php get_template_part( 'template-parts/pills-cat' ); ?>

</div>

