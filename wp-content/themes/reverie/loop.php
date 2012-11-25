<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'reverie'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>			
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php echo '<p class="byline author vcard">'. __('Por', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author().'</a></p>'; ?> 
			<div class="excerpt"><?php the_excerpt();?></div>
		</header>
		
		<div class="entry-content">
			<?php if (is_archive() || is_search()) : // Only display excerpts for archives and search ?>
				<?php the_excerpt(); ?>
					<?php else : ?>
						<?php /* the_content('Seguir leyendo...'); */?>
			<?php endif; ?>
		</div>		
		
		<footer>
			<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
		
		</footer>
		
		<div class="divider"></div>
		
	</article>	
<?php endwhile; // End the loop ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>

<nav id="post-nav">
	<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
	<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
</nav>

<?php } ?>