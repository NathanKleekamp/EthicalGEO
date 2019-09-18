<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ethical_geo
 */

if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
  return;
}
?>

<aside id="secondary" class="eg-sidebar-primary widget-area">
  <?php dynamic_sidebar( 'sidebar-primary' ); ?>
</aside><!-- #secondary -->
