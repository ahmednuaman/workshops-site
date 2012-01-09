<?php
/*
Template Name: Speakers
*/

get_header();

query_posts( 'post_type=' . $workshops_name_speakers . '&orderby=title&order=ASC' );

while ( have_posts() ): the_post(); ?>
	<div class="section speaker">
		<div class="thumbnail"></div>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<?php $t = get_post_meta( get_the_ID(), $workshops_prefix . 'twitter', true ); ?>
		<a href="https://twitter.com/<?php echo $t; ?>" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-count="false" data-width="185px">Follow @<?php echo $t; ?></a>
	</div>
<?php endwhile;

wp_reset_query();

get_footer(); ?>