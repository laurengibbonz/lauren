<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Lauren 2017
 */
get_header(); ?>
<?php 
$image = get_field('header_img');

if(!empty($image) ):
	echo '<header class="single__img scene scene--fadeinup">';
	$id = $image['ID'];
	echo wp_get_attachment_image($id, 'header' );
	echo '</header>';
endif; ?>
	<header class="single__title scene scene--fadein">
		<h2><?php the_title(); ?></h2>
			<?php if(get_field('location')) {
				echo '<h3 class="location">';
				echo get_field('location');
// 				echo '</h3><h3 class="location">Developed at ESI Design</h3>';
				echo '</h3>';
			} ?>
	</header>

<div class="clearfix"></div>

<div id="content" class="single__content scene scene--fadein" role="main">

<?php while ( have_posts() ) : the_post();
	$video = get_field('video');
	if($video != '') : ?>
	<div class="video-container">
		<div class="iframe">
	<iframe id="vimeo" src="https://player.vimeo.com/video/<?php echo $video; ?>?title=0&byline=0&portrait=0&autoplay=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
	<?php else :
		$image = get_the_post_thumbnail($post->ID, 'full');
		echo $image;
	endif; ?>
	<div class="body-text">
<!-- 		<h2><?php the_title(); ?></h2> -->
<!--
	<?php if(get_field('location')) {
		echo '<h3 class="location">';
		echo get_field('location');
// 				echo '</h3><h3 class="location">Developed at ESI Design</h3>';
		echo '</h3>';
	} ?>
-->
	<?php if(get_field('headline')) {
		echo '<div class="left"><h4 class="headline">';
		echo get_field('headline');
		echo '</div>';
	} ?>
	<?php if(get_field('description')) {
		echo '<div class="right">';
		echo get_field('description');
		if(get_field('role')) {
			echo '<p class="strong">Role</p>';
			echo '<p>'.get_field('role').'</p>';
		}
		if(get_field('role_description')) {
			echo '<p>'.get_field('role_description').'</p>';
		}
		if(get_field('credits')) {
			echo '<p class="strong">Credits</p>';
			echo get_field('credits');
		} 
		if(get_field('press')) {
			echo '<p class="strong">Press</p>';
			echo '<div class="press">'.get_field('press').'</div>';
		}
		echo '</div>';
	} ?>
	</div>
	<div class="single__images">
	<?php $count = 1;
	$documentation = get_field('documentation');
	if( have_rows('documentation') ):
		echo '<h3>Documentantion</h3>';
		echo '<div class="img__section">';
		while ( have_rows('documentation') ) : the_row();
		   	$image = get_sub_field('image');
		   	$image_id = $image['id'];
		   	$image_full = $image['sizes']['large'];
		   	$image_title = $image['title'];
		   	$image = $image['sizes']['third'];
		   	echo '<div class="img img--third" data-large="'.$image_full.'" data-desc="'.get_post_field('post_content', $image_id).'" data-title="'.$image_title.'" data-slide-id="'.$count.'">';
		   	echo '<img src="'.$image.'" />';   
		   	echo '</div>';
		   	$count++;
	   	endwhile;
    	echo '</div>';
    endif; ?>
	<?php 
	if(count($documentation) > 1) {
		echo '<h3>Final Experience</h3>';
	}
	if( have_rows('images') ):
	echo '<div class="img__section">';
	$beauty_count = 1;
    while ( have_rows('images') ) : the_row();
       $image = get_sub_field('image');
       $image_full = $image['sizes']['large'];
       $image_title = $image['title'];
//        var_dump($image);
	   // echo 'test';
       if($beauty_count <= 2 || $beauty_count == 4 || $beauty_count == 5) {
	   	$image = $image['sizes']['half'];
	   	echo '<div class="img img--half" data-large="'.$image_full.'" data-title="'.$image_title.'" data-slide-id="'.$count.'">';
	   	echo '<img src="'.$image.'" />';   
	   	echo '</div>';
       }
       if($beauty_count == 3) {
   	   	$image = $image['sizes']['full'];
		echo '<div class="img img--full" data-large="'.$image.'" data-title="'.$image_title.'" data-slide-id="'.$count.'">';
		echo '<img src="'.$image.'" />';  
		echo '</div>'; 
       }
       $count++;
       $beauty_count++;
    endwhile;
    echo '</div>';
    endif; ?>
<?php endwhile; ?>

</div><!-- #content -->

<div class="overlay">
	<button class="close"></button>
	<button class="prev"></button>
	<button class="next"></button>
	<div class="content">
	</div>
</div>
<?php get_footer(); ?>