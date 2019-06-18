<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ethical_geo
 */

?>

	</div><!-- #content -->

  <?php if ( is_active_sidebar( 'call-to-action' ) ) : ?>
    <?php dynamic_sidebar( 'call-to-action' ); ?>
  <?php endif; ?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
      <img class="logo-ags" src="https://via.placeholder.com/150" alt="American Geographical Society logo">
      <div class="social-media-wrapper"></div>
      <p>&copy;&nbsp;EthicalGEO. All Rights Reserved.</p>
    </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
