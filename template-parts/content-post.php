
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
    <?php $author_id = get_the_author_meta( 'user_email' );
    if ( $author_id && ! is_singular() ) :?>
    <img class="eg-author-gravitar" src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" />
    <?php
    endif;

    ?>
    <div class="eg-title-author-wrapper">
      <?php
      the_title( '<h2 class="entry-title">', '</h2>' );
      ?>
      <div class="entry-meta">
        <?php ethical_geo_posted_by(); ?>
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
