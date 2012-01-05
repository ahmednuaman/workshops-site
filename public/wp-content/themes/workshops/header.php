<?php
ob_start();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<meta name="author" content="<?php bloginfo( 'admin_email' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_SERVER[ 'HTTP_HOST' ] === 'workshops.dev' ? get_bloginfo( 'stylesheet_directory' ) . '/assets/css/styles.css' : get_bloginfo( 'stylesheet_url' ); ?>" />
		<link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Alice&amp;text=%26" />
		<link type="text/plain" rel="author" href="/humans.txt" />
		<link href="https://plus.google.com/107636089590992165491" rel="publisher" />
		<title><?php bloginfo( 'name' ); wp_title( ' &mdash; ' ); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="rainbow"></div>
		<div id="gradient"></div>
		<div id="container">
			<div id="header">
				<h1>
					<em>The</em> Digital Workshops <em>Project</em>
				</h1>
				<hr />
				<div id="menu">
					<?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'top_front_page' ) ); ?>
				</div>
				<hr />
			</div>
			<div id="content">