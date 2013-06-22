<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Wolf Prime
 * @since Wolf Prime 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0px !important;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'wolfprime' ), max( $paged, $page ) );

	?></title>

<link rel="stylesheet" type="text/css" media="all" href="//cfwblog.s3-website-us-east-1.amazonaws.com/wolfprime/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="//cfwblog.s3-website-us-east-1.amazonaws.com/wolfprime/jcarousel.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- <link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAnklEQVRIx91UQQ7DMAiLJ8E/ERIv44nc2aGaqnbd0mSlh3FBKEpsHAPazaGqqpoZERFxA6C7u3vmUq2ZiIjoVRcEMzPzO/A2t4Ya+LOdAY8yCU7G/xAAAGDcVBd5YNbNEx44dvc48KQCV83tSqCrQPnCGOu8n0VERPaEf/2yAQL7m2ZmZp/PcQw0H8s4tpaZmYnu+/gOjKJVPaxAHZEnrfFg7Hy1SG4AAAAASUVORK5CYII=" rel="icon" type="image/x-icon" /> -->
<link REL="SHORTCUT ICON" HREF="//cfwblog.s3-website-us-east-1.amazonaws.com/wolfprime/favicon.ico">

<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-21653775-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
</script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="//cfwblog.s3-website-us-east-1.amazonaws.com/wolfprime/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="//cfwblog.s3-website-us-east-1.amazonaws.com/wolfprime/js/jquery.jcarousel.min.js"></script>

<script type="text/javascript">
	function toggleSidebar() {
		$("#sidebar").animate({width:'toggle'},200);

		value = getCookie("wp_wfp_sidebar");
		if (value == 'True') {
			value = 'False';
		} else {
			value = 'True';
		}
		setCookie("/", "wp_wfp_sidebar", value);
	}

	function getCookie(c_name)
	{
		var i,x,y,ARRcookies=document.cookie.split(";");
		for (i=0;i<ARRcookies.length;i++)
		{
		  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		  x=x.replace(/^\s+|\s+$/g,"");
		  if (x==c_name)
		    {
		    return unescape(y);
		    }
		  }
	}
	function setCookie(path, c_name,value)
	{	
		var c_value=escape(value);
		c_value += "; path=" + escape(path);
		document.cookie=c_name + "=" + c_value;
	}

	$(document).ready(function() {
		
	    car = $(".jsgallery");
	    car.jcarousel({
			visible: 1,
			scroll: 1
	    });

	    car = $(".jsgallery_thumbnail");
	    car.jcarousel({
			visible: 3,
			scroll: 1
	    });
	    
	});
</script>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	

</head>

<body <?php body_class(); ?>>

<div id="container">
	<div id="header">
		<img src="//cfwblog.s3-website-us-east-1.amazonaws.com/wolfprime/images/wolf.jpg" width="80" height="80" alt="" class="logo"/>
			
			<h1 id="site-title">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</h1>
			
			<ul id="navigation" role="navigation">
				<?php 
					$locs = get_nav_menu_locations();
					$items = wp_get_nav_menu_items($locs['primary']);
				
					$ix = 0;
					$liclass = "";
					
					foreach ( $items as $link ) {
						if ( $ix == 0 ) {
							$liclass = "first";
						}
						else if ( $ix == count($items)-1 ) {
							$liclass = "last";
						}
						else {
							$liclass = "";
						}
						
						printf('<li class="%s"><a href="%s">%s</a></li>', $liclass, $link->url, $link->title );
						$ix++;
					}
				?>
			</ul>
	</div><!-- #header -->
