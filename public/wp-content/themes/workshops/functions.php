<?php

$workshops_cache_folder	= dirname( dirname( dirname( __FILE__ ) ) ) . '/cache/';
$workshops_cache_prefix	= 'workshops_';

function workshops_check_cache()
{
	global $workshops_cache_folder;
	global $workshops_cache_prefix;
	
	$f	= $workshops_cache_folder . $workshops_cache_prefix . workshops_hash_url( $_SERVER[ 'REQUEST_URI' ] );
	
	if ( file_exists( $f ) && !is_admin() )
	{
		if ( filesize( $f ) < 1024 )
		{
			return;
		}
		
		ob_end_flush();
		
		echo file_get_contents( $f );
		
		die();
	}
}

function workshops_clear_cache()
{
	global $workshops_cache_folder;
	global $workshops_cache_prefix;
	
	$h	= opendir( $workshops_cache_folder );
	
	if ( $h )
	{
		while ( ( $f = readdir( $h ) ) !== false )
		{
			if ( strstr( $f, $workshops_cache_prefix ) )
			{
				unlink( $workshops_cache_folder . $f );
			}
		}
		
		closedir( $h );
	}
}

function workshops_hash_url($s)
{
	return str_replace( '/', '_', $s );
}

function workshops_save_cache()
{
	global $workshops_cache_folder;
	global $workshops_cache_prefix;
	global $post;
	
	if ( $post->post_type != 'post' && $post->post_type != 'page' )
	{
		return;
	}
	
	$f	= $workshops_cache_folder . $workshops_cache_prefix . workshops_hash_url( $_SERVER[ 'REQUEST_URI' ] );
	$h 	= ob_get_contents();
	
	if ( /*!file_exists( $f ) &&*/ !is_admin() && ob_get_length() > 0 )
	{
		file_put_contents( $f, $h );
	}
	
	ob_end_flush();
}

function workshops_loop($t='')
{
	if ( have_posts() ): ?>
		<?php if ( $t ): ?>
			<h3><?php echo $t; ?></h3>
		<?php endif; ?>
		<ul>
			<?php while ( have_posts() ): the_post(); ?>
				<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h<?php echo $t ? '4' : '3' ?>><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h<?php echo $t ? '4' : '3' ?>>
					<div class="entry">
						<p>
							<small>
								<?php the_time( 'l, F jS, Y' ); ?>
							</small>
						</p>
						<?php the_content(); ?>
					</div>
					<p class="postmetadata">
						<?php the_tags( 'Tags: ', ' ~ ', '<br />' ); ?> Posted in <?php the_category(' ~ ') ?>
					</p>
					<hr />
				</li>
			<?php endwhile; ?>
		</ul>
		<div class="navigation">
			<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
			<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
		</div>
	<?php else: workshops_404(); endif;
}

function workshops_404()
{
	
}

add_action( 'clean_post_cache', 'workshops_clear_cache' );
add_action( 'delete_post', 'workshops_clear_cache' );
add_action( 'posts_selection', 'workshops_check_cache' );
add_action( 'save_post', 'workshops_clear_cache' );
add_action( 'shutdown', 'workshops_save_cache', 0 );
add_action( 'update_option', 'workshops_clear_cache' );
