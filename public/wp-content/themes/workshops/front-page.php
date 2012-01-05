<?php get_header(); ?>
<div id="learning">
	<?php the_post(); the_content(); ?>
</div>
<?php workshops_get_dates(); ?>
<div id="cost">
	<div class="header-block">
		<h2>How much does it cost?</h2>
		<h3>It depends...</h3>
	</div>
	<div class="top-margin">
		<div class="col">
			<h3>Students <span class="amp">&amp;</span> the unemployed:</h3>
			<p>It's free! That's right, it costs nothing!</p>
		</div>
		<h3 class="or">Or</h3>
		<div class="col">
			<h3>Those with jobs:</h3>
			<p>We'd suggest you make a minimum &pound;1 donation to the speaker's charity of choice for each workshop you attend.</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>