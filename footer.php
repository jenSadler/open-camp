<?php
/**
 * Footer Template
 *
 * Containers footer
 *
 *
 * @package frx
 */

?>

<footer class="text-center text-white py-5">
  <!-- Grid container -->
  <div class="container">
    <div class="row">

  <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>

      <div class="widget col-xs-12 col-md-4">

          <?php dynamic_sidebar( 'footer-1' ); ?>

      </div>

      <?php

      endif;



      if ( is_active_sidebar( 'footer-2' ) ) :

      ?>

      <div class="widget col-xs-12  col-md-4">

          <?php dynamic_sidebar( 'footer-2' ); ?>

      </div>

      <?php

      endif;



      if ( is_active_sidebar( 'footer-3' ) ) :

      ?>

      <div class="widget col-xs-12 col-md-4">

          <?php dynamic_sidebar( 'footer-3' ); ?>

      </div>

      <?php

      endif;?>

      </div>
    </div>
  <!-- Copyright -->
</footer><!-- #colophon -->

</div>
<?php wp_footer(); ?>

</body>
</html>
