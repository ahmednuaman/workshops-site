<?php
/*
Template Name: Schedule
*/

get_header();

$p	= get_query_var( 'paged' ) || 1;

query_posts( 'posts_per_page=3&paged=' . $p );

while ( have_posts() ): ?>
	<?php workshops_get_dates( false ); ?>
<?php endwhile;

$m	= $wp_query->max_num_pages;

if ( $m > 1 || true ) 
{
	?>
		<div class="pagination">
			<ul>
				<?php for ( $i = 1; $i <= $m; $i++ ): ?>
					<li>
						<a href="<?php the_permalink(); ?>/page/<?php echo $i; ?>" title="Go to page <?php echo $i; ?>">
							<span>
								Page <?php echo $i; ?>
							</span>
						</a>
					</li>
				<?php endfor; ?>
			</ul>
		</div>
	<?php
}

wp_reset_query();

get_footer(); ?>