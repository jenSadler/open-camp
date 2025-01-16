<?php
/**
 * The main template file
 * 
 * @package frx

 */
?>

<?php get_header(); ?>
<div id="primary">
	<main id="main" class="front-main" role="main">
	<?php get_template_part( 'template-parts/header/hero'); ?>
	<?php if(have_posts()): ?>
		
			
			<div class="container hold-post">
			<?php while(have_posts()): the_post(); ?>
				<?php the_content();?>
						
			<?php endwhile; ?>
		
		</div>

		<?php endif; ?>
	</main>
</div>

<?php get_footer();?>

<script>
	const observer = new IntersectionObserver(entries => {
  // Loop over the entries
  entries.forEach(entry => {
    // If the element is visible
    if (entry.isIntersecting) {
      // Add the animation class
      entry.target.classList.add('big-logo-animation');
    }
  });
});

observer.observe(document.querySelector('.big-logo'));
</script>

<style>

@keyframes rotate-logo {
	0% {
		-webkit-transform: rotate3d(0, 0, 1, 20deg);
	}
	50% {
		-webkit-transform: rotate3d(0, 0, 1, 0deg);
	}
	100% {
		-webkit-transform: rotate3d(0, 0, 1, 10deg);
	}
}

@media (prefers-reduced-motion: no-preference) {
  .big-logo-animation {
    animation-name: rotate-logo;
    animation-duration: 2s;
    animation-iteration-count:1;
  }
}

.big-logo{

	-webkit-transform: rotate3d(0, 0, 1, 10deg);
    transform: rotate3d(0, 0, 1, 10deg);
}

.big-logo img{
	border-radius:50%;
}
</style>
