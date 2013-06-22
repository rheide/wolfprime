<div class="content_container <?php $post_content_class; ?> post_standard">	
	
	<div class="content" role="main">
	<?php 
		$main_post = $post;
		
		$args = array(
			'post_type' => 'tabbed',
			'post_parent' => $post->ID,
			'orderby' => 'menu_order',
			'order' => 'asc',
		);
		
		$loop = new WP_Query( $args );
		$post_count = $loop->post_count;
		$ix = 0;
		
		echo '<ul class="idTabs">';
		
		// build the tabs
		while ( $loop->have_posts() ) : $loop->the_post();
			if ($ix == 0) {
				echo '<li class="first">';
			} else if ($ix == $post_count-1) {
				echo '<li class="last">';
			} else {
				echo '<li>';
			}
			
			printf('<a href="#tab_%s_%s">%s</a>', $main_post->ID, $ix, $post->post_title); 
		
			echo '</li>';
			
			$ix++;
		endwhile;
		
		echo '</ul>';
		
		//build the content
		$loop->rewind_posts();
		$ix = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div id="tab_<?php echo $main_post->ID ?>_<?php echo $ix; ?>">
			
				<div class="entry-content">
					<?php if ( function_exists( 'get_post_format' ) && 'aside' == get_post_format( $post->ID ) ) {
						?><span class="comments-link"><?php comments_popup_link( __( '#', 'wolfprime' ), __( '(1)', 'wolfprime' ), __( '(%)', 'wolfprime' ) ); ?>&nbsp;</span>
					<?php } ?>
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wolfprime' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'wolfprime' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
				
				<div class="entry-meta">
					Last modified on <?php the_modified_date(); ?>
				</div><!-- .entry-meta -->
			
			</div><!-- tab# -->
			<?php 
			$ix++;
		endwhile;
		
		$post = $main_post;
	?>
	
	</div><!-- .content -->

</div><!-- .content_container -->


<?php if (comments_open()): ?>
	<div class="content_container post_standard">
		<div class="content" role="main">
			<?php comments_template( '', true ); ?>
		</div>
	</div>
<?php endif; ?>


