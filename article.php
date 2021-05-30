<article id="<?php echo $blog->slug; ?>">
	<header class="page-header text-center">
		<h1><?php echo $blog->title; ?></h1>
		<h2><?php echo $blog->date; ?></h2>
	</header>
	
	<div class="article-nav">
		<ul>
			<li><a href="#top">&uarr; Top</a></li>
		</ul>
	</div>

	<?php if ( $blog->data->lead ) : ?>
		<p class="lead"><?php echo $blog->data->lead; ?></p>
	<?php endif; ?>

	<?php markup( $blog->content ); ?>

	<div class="article-nav">
		<ul>
			<li><a href="#top">&uarr; Top</a></li>
		</ul>
	</div>
</article>
