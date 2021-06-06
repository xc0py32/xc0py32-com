<article id="<?php echo the_blog_slug( $blog ); ?>">
	<header class="page-header text-center">
		<a href="<?php echo the_blog_link( $blog ); ?>">
			<h1><?php echo the_blog_title( $blog ); ?></h1>
			<h2><?php echo the_blog_date( $blog ); ?></h2>
		</a>
	</header>

	<?php if ( $blog->data->lead ) : ?>
		<p class="lead"><?php echo the_blog_lead( $blog ); ?></p>
	<?php endif; ?>

	<?php echo markup( $blog->content ); ?>

	<div class="article-nav">
		<?php echo sep( [
			function( $blog ) {
				?>
					<?php if ( ! a_blog_was_requested() ): ?>
						<a href="#top">&uarr; Top</a>
					<?php endif; ?>
				<?php
			},
			function ( $blog ) {
				?>
					<a href="<?php echo the_blog_link( $blog ); ?>">Link</a>
				<?php
			}
		], '&mdash;', $blog ); ?>
	</div>
</article>
