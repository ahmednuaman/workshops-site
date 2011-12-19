<?php
$workshops_cache_enabled	= ( $_SERVER[ 'HTTP_HOST' ] !== 'workshops.dev' );
$workshops_cache_folder		= dirname( dirname( dirname( __FILE__ ) ) ) . '/cache/';
$workshops_cache_prefix		= 'workshops_';

$workshops_default_post_props	= array(
	'show_ui'			=> true,
	'show_in_menu'		=> true,
	'public'			=> false,
	'menu_position'		=> 20,
	'supports'			=> array( 'title', 'revisions', 'thumbnail', 'editor' ),
	'show_in_nav_menus'	=> true,
	'has_archive'		=> false
);	

$workshops_name_skills		= 'workshops_skills';
$workshops_name_speakers	= 'workshops_speakers';

register_nav_menu( 'top_front_page', 'Top for front page' );

add_theme_support( 'post-thumbnails' );

function workshops_init()
{
	workshops_register_post_types();
}

function workshops_register_post_types()
{
	global $workshops_default_post_props;
	global $workshops_name_skills;
	global $workshops_name_speakers;
	
	$props_skills	= $workshops_default_post_props;
	
	$props_skills[ 'label' ]	= __( 'The Skills' );
	$props_skills[ 'labels' ]	= array(
		'all_items'		=> __( 'All Skills' ),
		'name'			=> __( 'Skills' ),
		'singular_name'	=> __( 'A Skill' )
	);
	
	array_push( $props_skills[ 'supports' ], 'excerpt' );
	
	register_post_type( $workshops_name_skills, $props_skills );
	
	$props_speakers	= $workshops_default_post_props;
	
	$props_speakers[ 'label' ]	= __( 'The Speakers' );
	$props_speakers[ 'labels' ]	= array(
		'all_items'		=> __( 'All Speakers' ),
		'name'			=> __( 'Speakers' ),
		'singular_name'	=> __( 'A Speaker' )
	);
	
	register_post_type( $workshops_name_speakers, $props_speakers );
}

function workshops_admin_init()
{
	workshops_register_meta_boxes();
}

function workshops_register_meta_boxes()
{
	global $workshops_name_skills;
	global $workshops_name_speakers;
	
	// add_meta_box( $workshops_name_skills . '_', __( '' ), 'workshops_meta_box_callback', $workshops_name_skills, 'normal', 'high' );
}

function workshops_meta_box_callback($p, $m)
{
	$d	= get_post_meta( $p->ID, $m[ 'id' ], true );
	
	if ( false )
	{
		workshops_get_editor( $m[ 'id' ], $d );
	}
	elseif ( false )
	{
		workshops_get_textarea( $m[ 'id' ], $m[ 'title' ], $d );
	}
	else
	{
		workshops_get_field( $m[ 'id' ], $m[ 'title' ], $d );
	}
}

function workshops_get_editor($id, $d)
{
	wp_tiny_mce( false, array(
		'editor_selector'	=> 'workshops_editor'
	));
	
	?>
		<textarea name="<?php echo $id; ?>" class="workshops_editor" rows="8" cols="40"><?php echo $d ?></textarea>
	<?php
}

function workshops_get_field($id, $t, $d)
{
	?>
		<input type="text" name="<?php echo $id; ?>" value="<?php echo $d ?>" placeholder="<?php echo $t; ?>" />
	<?php
}

function workshops_get_textarea($id, $t, $d)
{
	?>
		<p><strong>Remember, new lines count.</strong></p>
		<textarea name="<?php echo $id; ?>" rows="8" cols="40" placeholder="<?php echo $t; ?>"><?php echo $d ?></textarea>
	<?php
}

function workshops_convert_to_array($id, $d)
{
	if ( !is_array( $d ) )
	{
		$d	= array( $id => $d );
	}
	
	return $d;
}

function workshops_admin_js()
{
	wp_enqueue_script( 'tiny_mce' );
}

function workshops_save_post($id)
{
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	{
		return;
	}
	
	foreach ( $_POST as $k => $v ) 
	{
		if ( strstr( $k, 'workshops_' ) )
		{
			update_post_meta( $id, $k, $v );
		}
	}
}

function workshops_check_cache()
{
	global $workshops_cache_enabled;
	global $workshops_cache_folder;
	global $workshops_cache_prefix;
	
	$f	= $workshops_cache_folder . $workshops_cache_prefix . workshops_hash_url( $_SERVER[ 'REQUEST_URI' ] );
	
	if ( file_exists( $f ) && !is_admin() && $workshops_cache_enabled )
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

add_action( 'init', 'workshops_init' );
// add_action( 'admin_init', 'workshops_admin_init' );
// add_action( 'admin_print_scripts', 'workshops_admin_js' );
add_action( 'clean_post_cache', 'workshops_clear_cache' );
add_action( 'delete_post', 'workshops_clear_cache' );
add_action( 'posts_selection', 'workshops_check_cache' );
add_action( 'save_post', 'workshops_clear_cache' );
add_action( 'save_post', 'workshops_save_post' );
add_action( 'shutdown', 'workshops_save_cache', 0 );
add_action( 'update_option', 'workshops_clear_cache' );

add_image_size( 'skills-large', 540, 460 );
add_image_size( 'skills-small', 140, 140, true );