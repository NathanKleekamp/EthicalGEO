
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ethical_geo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php ethical_geo_author_gravitar_thumb(); ?>
    <div class="eg-title-author-wrapper">
      <?php
      if ( ! is_singular() ) :
        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
      else :
        the_title( '<h2 class="entry-title">', '</h2>' );
      endif;
      ?>
      <div class="entry-meta">
        <p><?php ethical_geo_posted_by(); ?><br><?php ethical_geo_posted_on();?></p>
      </div><!-- .entry-meta -->
    </div><!-- .eg-title-author-wrapper -->
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php
    if ( is_singular() ) :
    the_content( sprintf(
      wp_kses(
        /* translators: %s: Name of current post. Only visible to screen readers */
        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ethical_geo' ),
        array(
          'span' => array(
            'class' => array(),
          ),
        )
      ),
      get_the_title()
    ) );
    else :
    the_excerpt();
    endif;

    wp_link_pages( array(
      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ethical_geo' ),
      'after'  => '</div>',
    ) );
    ?>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
