<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ethical_geo
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
      the_post();

      get_template_part( 'template-parts/content', get_post_type() );

      the_post_navigation(array (
        'prev_text' => __( 'Previous Post' ),
        'next_text' => __( 'Next Post' ),
      ) );

      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
    <?php
    get_sidebar();
    ?>
  </div><!-- #primary -->

<?php
get_footer();