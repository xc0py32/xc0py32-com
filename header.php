<?php require_once( 'xc0phpy32.php' ); ?>
<html lang="en">

<head>
	<meta charset="utf-8">

	<title>xc0py32 v2 &mdash; A retro weblog.</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A retro weblog.">
	<meta name="author" content="xc0py32">

	<link href="./bootstra.386/css/bootstrap.min.css" rel="stylesheet">
	<link href="./bootstra.386/css/bootstrap-responsive.min.css" rel="stylesheet">

	<link href="./custom.css" rel="stylesheet">

	<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">

	<div class="container" id="main">
		<div class="row">

			<!-- Sidebar -->
			<div class="span3 bs-docs-sidebar text-right">
				<header id="overview">
					<h1>xc0py32<sup>v2</sup></h1>
					<p>A retro weblog.</p>
				</header>

				<ul class="nav nav-list bs-docs-sidenav affix-top blogs text-center">
					<?php the_published_blogs( function( $blog ) {
						?><li><a href="./#<?php echo $blog->slug; ?>"><?php echo $blog->date; ?></a></li><?php
					} ); ?>
				</ul>
			</div><!--/sidebar-->

			<!-- Published Blogs -->
			<div class="span9" class="articles">