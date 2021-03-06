<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ethical_geo
 */

if ( ! function_exists( 'ethical_geo_posted_on' ) ) :
  /**
   * Prints HTML with meta information for the current post-date/time.
   */
  function ethical_geo_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( DATE_W3C ) ),
      esc_html( get_the_date() ),
      esc_attr( get_the_modified_date( DATE_W3C ) ),
      esc_html( get_the_modified_date() )
    );

    $posted_on = sprintf(
      /* translators: %s: post date. */
      esc_html_x( '%s', 'post date', 'ethical_geo' ),
      $time_string
    );

    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

  }
endif;

if ( ! function_exists( 'ethical_geo_author_gravitar_thumb' ) ) :
  function ethical_geo_author_gravitar_thumb() {
    $author_id = get_the_author_meta( 'user_email' );
    $src = esc_url( get_avatar_url( $author_id ) );

    if ( $author_id && ! is_singular() ) :
      echo '<img class="eg-author-gravitar" src="' . $src . '" alt="The author\'s gravitar image" />';
    endif;
  }
endif;

if ( ! function_exists( 'ethical_geo_posted_by' ) ) :
  /**
   * Prints HTML with meta information for the current author.
   */
  function ethical_geo_posted_by() {
    $fname = esc_html( get_the_author_meta( 'first_name' ) );
    $lname = esc_html( get_the_author_meta( 'last_name' ) );
    $full_name = trim( "$fname $lname" );
    $byline = sprintf(
      /* translators: %s: post author. */
      esc_html_x( 'by %s', 'post author', 'ethical_geo' ),
      '<span class="author vcard">' . esc_html( $full_name ) . '</span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

  }
endif;

if ( ! function_exists( 'ethical_geo_entry_footer' ) ) :
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function ethical_geo_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( esc_html__( ', ', 'ethical_geo' ) );
      if ( $categories_list ) {
        /* translators: 1: list of categories. */
        printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ethical_geo' ) . '</span>', $categories_list ); // WPCS: XSS OK.
      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ethical_geo' ) );
      if ( $tags_list ) {
        /* translators: 1: list of tags. */
        printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ethical_geo' ) . '</span>', $tags_list ); // WPCS: XSS OK.
      }
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link">';
      comments_popup_link(
        sprintf(
          wp_kses(
            /* translators: %s: post title */
            __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ethical_geo' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        )
      );
      echo '</span>';
    }
  }
endif;

if ( ! function_exists( 'ethical_geo_post_thumbnail' ) ) :
  /**
   * Displays an optional post thumbnail.
   *
   * Wraps the post thumbnail in an anchor element on index views, or a div
   * element when on single views.
   */
  function ethical_geo_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
      return;
    }

    if ( is_singular() ) :
      ?>

      <div class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
      </div><!-- .post-thumbnail -->

    <?php else : ?>

    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
      <?php
      the_post_thumbnail( 'post-thumbnail', array(
        'alt' => the_title_attribute( array(
          'echo' => false,
        ) ),
      ) );
      ?>
    </a>

    <?php
    endif; // End is_singular().
  }
endif;
