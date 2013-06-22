<div class="content_container <?php $post_content_class; ?> <?php
		if ( function_exists( 'get_post_format' ) && strlen(get_post_format( $post->ID )) > 0) {
			echo "post_" . get_post_format( $post->ID );
		} else { 
			echo "post_standard";
		 } ?>">	

	<div class="content" role="main">
		
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wolfprime' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	
		<div class="entry-meta">
			<?php wolfprime_posted_on(); ?>
		</div><!-- .entry-meta -->
	
		<div class="entry-content">
		
			<?php if ( function_exists( 'get_post_format' ) && 'aside' == get_post_format( $post->ID ) ) {
				?><span class="comments-link"><?php comments_popup_link( __( '#', 'wolfprime' ), __( '(1)', 'wolfprime' ), __( '(%)', 'wolfprime' ) ); ?>&nbsp;</span>
			<?php } ?>
			
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wolfprime' ) ); ?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'wolfprime' ), 'after' => '</div>' ) ); ?>
			
		</div><!-- .entry-content -->
	
		<div class="entry-utility">
			<?php if ( count( get_the_category() ) ) : ?>
				<span class="cat-links">
					<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'wolfprime' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
				</span>
				<span class="meta-sep">|</span>
			<?php endif; ?>
			<?php
				$tags_list = get_the_tag_list( '', ', ' );
				if ( $tags_list ):
			?>
				<span class="tag-links">
					<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'wolfprime' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
				</span>
				<span class="meta-sep">|</span>
			<?php endif; ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wolfprime' ), __( '1 Comment', 'wolfprime' ), __( '% Comments', 'wolfprime' ) ); ?></span>
			<?php edit_post_link( __( 'Edit', 'wolfprime' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-utility -->
	
	</div><!-- #post-## -->
	
	
	
	<?php comments_template( '', true ); ?>
	
	</div><!-- .content -->

</div><!-- .content_container -->
