<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2020-03-17 10:17:21
 * @package air-light
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

namespace Air_Light;

get_header();

get_template_part( 'template-parts/hero', get_post_type() ); ?>

<div class="content-area">
  <main role="main" id="main" class="site-main">

    <section class="block block-blog has-light-bg">
      <div class="container">

        <?php if ( have_posts() ) : ?>

          <?php if ( is_home() && ! is_front_page() ) : ?>
            <h1 id="content" class="screen-reader-text"><?php single_post_title(); ?></h1>
          <?php endif; ?>

          <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h2>
              <p><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date( get_option( 'date_format' ) ); ?></time></p>

              <div div class="content">
                <?php
                  the_content();
                  entry_footer();
                ?>
              </div>
            </article><!-- #post-## -->
          <?php endwhile; ?>

          <?php the_posts_pagination(); ?>

        <?php endif; ?>

      </div><!-- .container -->
    </section>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
