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
    <div class="bg-map"></div>
		<div class="site-info">
      <div class="ags-logo"></div>
      <div class="social-media-wrapper">
        <a class="footer-icon footer-icon-mail" id="mail-icon" href="mailto:mailto:info@ethicalgeo.org">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path class="icon-path" d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
          </svg>
          <span class="icon-text">Mail</span>
        </a>
        <a class="footer-icon footer-icon-twitter" id="twitter-icon" href="https://twitter.com/ethicalgeo">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path class="icon-path" d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
          </svg>
          <span class="icon-text">Twitter</span>
        </a>
      </div>
      <p class="copyright">&copy;&nbsp;EthicalGEO. All Rights Reserved.</p>
    </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
