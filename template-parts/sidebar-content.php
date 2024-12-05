<?php
/**
 * Template part for displaying sidbar
 * 
 * @package frx
 */
?>

<?php

$slug1 = 'featured';
$cat1 = get_category_by_slug($slug1); 
$excluded_category1 = $cat1->term_id;

$slug2 = 'uncategorized';
$cat2 = get_category_by_slug($slug2); 
$excluded_category2 = $cat2->term_id;

$allExcluded = $excluded_category1 . ",". $excluded_category2;
$catargs = array(
		'taxonomy' => 'category',
		'orderby' => 'term_order',
		'order'=>'ASC',
        'hide_empty'    => '1',
		'hierarchical' =>'1',
		'walker'=> new Walker_Simple_Example,
		'title_li'           => __( '' ),
		'exclude'=> $allExcluded
  );

  
  $tags = get_tags('post_tag'); //taxonomy=post_tag
	  
	  


?>

<!-- Default checked -->


<div class="hold-filter-title">
	<h2>Search</h2>
</div>
<div class="page-list-hold-filter px-4 py-4">
<?php get_search_form();?>
</div>

<div class="hold-filter-title">
	<h2>Filter</h2>

	<div class="custom-control custom-switch">
	<div class="form-check form-switch">
		<input type="checkbox" class="form-check-input" id="cat-additive" checked>
		<label class="form-check-label" for="cat-additive">Additive</label>
	</div>
</div>

</div>


<div class="page-list-hold-filter px-4 py-4">
<!--<h3 class="cat-title"> Category Filter Settings</h3>
<ul class="cat-list d-flex justify-content-between my-4 mx-0 px-1 py-0">
<li class="my-2">

		</li>
</ul>-->
<?php wp_list_categories($catargs); ?>
		</div>

<div class="hold-filter-title">
	<h2>Tags</h2>

	<div class="custom-control custom-switch">
	<div class="form-check form-switch">
		<input type="checkbox" class="form-check-input" id="tag-additive" checked>
		<label class="form-check-label" for="tag-additive">Additive</label>
	</div>
</div>
</div>
<div class="page-list-hold-filter px-4 py-4">
<!--
<h3 class="cat-title"> Tag Filter Settings</h3>

<ul class="cat-list my-4 mx-0 px-1 py-0">
</ul>-->
	
<h3 class="cat-title"> By Tag</h3>
<ul class="cat-list tag-list my-4 mx-0 px-1 py-0">
	<?php
	if ( $tags ) :
		foreach ( $tags as $tag ) : ?>
			<?php $cur_tag = ""; ?>
			<?php if(is_tag()):?>
				<?php $cur_tag = get_queried_object();?>
			<?php endif;?>
			<li class="item my-0 mx-0 px-0 py-0">

			<?php if($cur_tag != "" && $cur_tag->slug == $tag->slug):?>
				<input type="checkbox" class="btn-check tag-list-item" name="tag-value" id="<?php echo $tag->slug ?>" value="<?php echo $tag->slug ?>" autocomplete="off" checked>
			<?php else: ?>
				<input type="checkbox" class="btn-check tag-list-item" name="tag-value" id="<?php echo $tag->slug ?>" value="<?php echo $tag->slug ?>" autocomplete="off">
			
			<?php endif; ?>
			<label class="btn btn-outline-primary" for="<?php echo $tag->slug ?>"><?php echo $tag->name ?></label>
			</li>
			
		<?php endforeach; ?>
	<?php endif; ?>
	
	</ul>


</div>
<?php
class Walker_Simple_Example extends Walker_Category {  

function start_lvl(&$output, $depth=1, $args=array()) {  
	$output .= "\n<ul class=\"cat-list my-4 mx-0 px-1 py-0\">\n";  
}  

function end_lvl(&$output, $depth=0, $args=array()) {  
	$output .= "</ul>\n";  
}  

function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {  
	if($depth == 0){
		$output .= "<h3 class=\"cat-title\">".$item->name."</h3>";
	}
	else{
		$cur_cat = "";
		if(is_category()){
			$cur_cat = get_category(get_query_var('cat'),false);
		}
		$output .= "<li class=\"item my-2\">";

		if($cur_cat != "" && $cur_cat->slug == $item->slug){
			$output .= "<label for=\"".$item->slug ."\"><input type=\"checkbox\" id=\"".$item->slug ."\" name=\"cat-value\" value=\"".$item->slug ."\" class=\"cat-list-item\" checked>";
		}
		else{
			$output .= "<label for=\"".$item->slug ."\"><input type=\"checkbox\" id=\"".$item->slug ."\" name=\"cat-value\" value=\"".$item->slug ."\" class=\"cat-list-item\">";
		
		}
		
		$output .= "<span class=\"cat-checkbox-item\"> ".$item->name."</span></label>";
	}	$output .= "</li>";
}  

function end_el(&$output, $item, $depth=0, $args=array()) {  
	$output .= "</li>\n";  
}  
}  ?>