<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="m-scene" id="content" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

  <div class="m-aside scene scene--fadein">
    TEST DETAIL
  </div>
  <div class="m-right-panel m-page scene scene--fadeinup">
    <div class="content">
    <div class="item"></div>
    <div class="item"></div>
    </div>
  </div>


			<?php endwhile; // End of the loop.
			?>

</div><!-- #content -->

<?php get_footer();
