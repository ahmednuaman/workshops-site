				<div id="signup">
					<div class="header-block">
						<h2>Sign yourself up!</h2>
					</div>
					<div class="col">
						<h1>Just fill in this form</h1>
						<span class="arrow">&rarr;</span>
						<p>
							And that's it! Once you're signed up you'll be notified when the next workshops are and you simply just turn up!
						</p>
					</div>
					<div class="iframe">
						<iframe src="https://docs.google.com/spreadsheet/embeddedform?formkey=dGZocWkzbW51S2p3WnBLOFYyMGk3ZEE6MQ">Loading...</iframe>
					</div>
				</div>
				<div id="footnote">
					<div class="header-block">
						<h2>A footnote</h2>
					</div>
					<?php dynamic_sidebar(); ?>
				</div>
			</div>
		</div>
		<?php if ( $_SERVER[ 'HTTP_HOST' ] === 'workshops.dev' ): ?>
			<script>
			<!--
				var s	= [
					'<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery.js',
					'<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/modernizr.js',
					'<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/suitcase.js',
					'http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js'
				];
				var t	= ( new Date() ).getTime();
				
				while ( s.length )
				{
					document.write( '<script src="' + s.shift() + '?x=' + t + '"></' + 'script>' );
				}
			-->
			</script>
		<?php else: ?>
			<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/packaged.js"></script>
		<?php endif; ?>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</body>
</html>