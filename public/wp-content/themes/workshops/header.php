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
		<link type="text/css" rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Alice&amp;text=%26" />
		<link type="text/plain" rel="author" href="/humans.txt" />
		<title><?php bloginfo( 'name' ); wp_title( ' &mdash; ' ); ?></title>
	</head>
	<body <?php body_class(); ?>>
		<div id="rainbow"></div>
		<div id="gradient"></div>
		<div id="menu">
			<div id="menu_inner">
				<?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'top_front_page' ) ); ?>
				<?php //get_search_form(); ?>
			</div>
		</div>
		<div id="container">
			<div id="header">
				<h1>
					<em>The</em> Digital Workshops <em>Project</em>
				</h1>
				<h3>
					<?php bloginfo( 'description' ); ?>
				</h3>
			</div>
			<div id="content">