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
	</body>
</html>