<?php
/*
Template Name: Schedule
*/

get_header();

$p	= get_query_var( 'paged' ) || 1;

query_posts( 'posts_per_page=5&paged=' . $p );

while ( have_posts() ): ?>
	<?php workshops_get_dates( false ); ?>
<?php endwhile;

wp_reset_query();

get_footer(); ?>