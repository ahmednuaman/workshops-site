<?php get_header(); ?>
<div id="learning">
	<ul id="learning-carousel">
		<?php
		$q	= new WP_Query(
			array(
				'post_type'			=> $workshops_name_skills,
				'posts_per_page'	=> -1
			)
		);
		
		foreach ( $q->posts as $v ) 
		{
			?>
				<li>
					<div class="thumbnail" style="background-image: url(<?php echo workshops_get_image_src( $v->ID, $workshops_size_large ); ?>)">
						<canvas></canvas>
					</div>
					<div class="info">
						<h3>
							<?php echo apply_filters( 'the_title', $v->post_title ); ?>
						</h3>
						<p class="excerpt">
							<?php echo $v->post_excerpt; ?>
						</p>
						<div class="content">
							<?php echo $v->post_content; ?>
						</div>
					</div>
				</li>
			<?php
		}
		?>
	</ul>
	<ul id="learning-thumbs">
		<?php foreach ( $q->posts as $v ): ?>
			<li>
				<div class="thumbnail" style="background-image: url(<?php echo workshops_get_image_src( $v->ID, $workshops_size_small ); ?>)">
					<canvas></canvas>
				</div>
				<div class="info">
					<h4>
						<?php echo apply_filters( 'the_title', $v->post_title ); ?>
					</h4>
				</div>
				<hr />
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<div id="who">
	
</div>
<div id="dates">
	
</div>
<div id="cost">
	
</div>
<div id="signup">
	
</div>
<div id="footnote">
	
</div>
<?php get_footer(); ?>