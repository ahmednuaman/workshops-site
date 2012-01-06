<?php
/*
Template Name: Speakers
*/
?>
<?php get_header(); ?>
<?php query_posts( 'post_type=' . $workshops_name_speakers . '&orderby=title&order=ASC' ); ?>
<?php while ( have_posts() ): the_post(); ?>
	<div class="section speaker">
		<div class="thumbnail"></div>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>
<?php get_footer(); ?>