<?php
/**
 * Template part for displaying sidbar
 * 
 * @package frx
 */
?>


<h2>Search</h2>
<div class="page-list-hold-filter my-3 px-4 py-4">
<?php get_search_form();?>
</div>


<?php
if(has_category("module")):?>
    <h2 class="mt-4">Modules</h2>
<div class= "page-list-hold-filter mb-5 px-4 py-4">
 <?php   $related = get_posts( array( 'category_name' => 'module', 'numberposts' => 5 ) );
if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>


 <ul> 
        <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </li>
    </ul> 
 
<?php }?>
</div> 
<?php wp_reset_postdata();
else:?>
   <?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
if( $related ) : ?>
    <h2 class="mt-4">Related Resources</h2>
    <div class= "page-list-hold-filter mb-5 px-4 py-4">

<?php foreach( $related as $post ) {
setup_postdata($post); ?>

 <ul> 
        <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </li>
    </ul> 

<?php } ?> </div> <?php endif; ?>

  
<? wp_reset_postdata(); ?>
<?php endif;?>
