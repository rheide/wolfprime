<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Wolf Prime
 * @since Wolf Prime 1.0
 */
?>
	
	<div id="footer" role="contentinfo">
		 <div class="copyright">WolfPrime 1.1 &#xa9; Randy van der Heide - 2013</div>
		 <br/>
	</div><!-- #footer -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
</body>
</html>
