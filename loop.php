<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Wolf Prime
 * @since Wolf Prime 1.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if ( $wp_query->max_num_pages > 1 && $paged > 1) : ?>
	<div id="nav-above" class="content_container postnav">
		<div class="content">
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts <span class="meta-nav">&rarr;</span>', 'wolfprime' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer posts', 'wolfprime' ) ); ?></div>
		</div><!-- #nav-above -->
	</div>
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'wolfprime' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'wolfprime' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); 

		if ( get_post_type( $post->ID ) == 'tabbed') 
		{
			include('loop-tab.php');
		}
		else
		{
			include('loop-post.php');
		}
		
	endwhile; 
?>


<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php
	if ( $wp_query->max_num_pages > 1) : ?>
	<div id="nav-below" class="content_container postnav">
		<div class="content">
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts <span class="meta-nav">&rarr;</span>', 'wolfprime' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer posts', 'wolfprime' ) ); ?></div>
		</div><!-- #nav-above -->
	</div>
<?php endif; ?>