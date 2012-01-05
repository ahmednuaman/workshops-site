<?php get_header(); ?>
<div id="learning">
	<?php the_post(); the_content(); ?>
</div>
<div id="dates">
	<div class="header-block">
		<h2>The next workshop is</h2>
	</div>
	<?php
	query_posts( 'posts_per_page=1' ); the_post();
	?>
	<h1><?php the_title(); ?></h1>
	<h3>By <?php workshops_the_speaker(); ?></h3>
	<div>
		<div class="col">
			<blockquote>
				<?php the_content(); ?>
			</blockquote>
			<h3><?php workshops_the_date(); ?> at <?php workshops_the_time(); ?></h3>
			<h3 class="left">Venue:</h3>
			<address>
				<p>
					<?php workshops_the_location(); ?>
				</p>
			</address>
		</div>
		<div class="col">
			<iframe src="http://maps.google.co.uk/?q=<?php echo urlencode( workshops_get_the_location() ); ?>&amp;output=embed"></iframe>
		</div>
	</div>
</div>
<div id="cost">
	
</div>
<div id="signup">
	
</div>
<div id="footnote">
	
</div>
<?php get_footer(); ?>