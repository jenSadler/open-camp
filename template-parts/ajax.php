<?php
	$catSlug = $_POST['category'];
	$search =  $_POST['s'];
	$tagSlug =  $_POST['tag'];

  

	$ajaxposts = new WP_Query([
	  'post_type' => 'post',
	  'posts_per_page' => -1,
	  'category_name' => $catSlug,
	  'tag' => $tagSlug,
	  's' => $search,
	  
	]);

	$response = '';
  
	if($ajaxposts->have_posts()) {
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
		$response .= get_template_part('template-parts/content');
	  endwhile;
	} else {
		$response .= get_template_part('template-parts/content-none');
	}
  
	echo $response;
	exit; ?>