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
		<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rokkitt:400,700" />
		<link type="text/plain" rel="author" href="/humans.txt" />
		<title><?php bloginfo( 'name' ); wp_title( ' &mdash; ' ); ?></title>
	</head>
	<body <?php body_class(); ?>>