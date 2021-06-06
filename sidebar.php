<!-- Sidebar -->
<div class="span3 bs-docs-sidebar text-right">
	<header id="overview">
		<a href="./">
			<h1>xc0py32<sup>v2</sup></h1>
			<p>A retro weblog.</p>
		</a>
	</header>

	<ul class="nav nav-list bs-docs-sidenav affix-top blogs text-center">
		<?php echo the_published_blogs( function( $blog ) {
			?><li><a href="<?php echo the_blog_link( $blog ); ?>"><?php echo $blog->date; ?></a></li><?php
		} ); ?>
	</ul>
</div><!--/sidebar-->