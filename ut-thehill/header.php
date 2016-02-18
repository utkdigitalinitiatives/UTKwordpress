<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage UT-TheHill
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 old-ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 old-ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->



<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">



		<script>
			
			/*! grunt-grunticon Stylesheet Loader - v2.1.2 | https://github.com/filamentgroup/grunticon | (c) 2015 Scott Jehl, Filament Group, Inc. | MIT license. */

      (function(e){function t(t,n,r,o){"use strict";function a(){for(var e,n=0;u.length>n;n++)u[n].href&&u[n].href.indexOf(t)>-1&&(e=!0);e?i.media=r||"all":setTimeout(a)}var i=e.document.createElement("link"),l=n||e.document.getElementsByTagName("script")[0],u=e.document.styleSheets;return i.rel="stylesheet",i.href=t,i.media="only x",i.onload=o||null,l.parentNode.insertBefore(i,l),a(),i}var n=function(r,o){"use strict";if(r&&3===r.length){var a=e.navigator,i=e.Image,l=!(!document.createElementNS||!document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect||!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")||e.opera&&-1===a.userAgent.indexOf("Chrome")||-1!==a.userAgent.indexOf("Series40")),u=new i;u.onerror=function(){n.method="png",n.href=r[2],t(r[2])},u.onload=function(){var e=1===u.width&&1===u.height,a=r[e&&l?0:e?1:2];n.method=e&&l?"svg":e?"datapng":"png",n.href=a,t(a,null,null,o)},u.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",document.documentElement.className+=" grunticon"}};n.loadCSS=t,e.grunticon=n})(this);(function(e,t){"use strict";var n=t.document,r="grunticon:",o=function(e){if(n.attachEvent?"complete"===n.readyState:"loading"!==n.readyState)e();else{var t=!1;n.addEventListener("readystatechange",function(){t||(t=!0,e())},!1)}},a=function(e){return t.document.querySelector('link[href$="'+e+'"]')},c=function(e){var t,n,o,a,c,i,u={};if(t=e.sheet,!t)return u;n=t.cssRules?t.cssRules:t.rules;for(var l=0;n.length>l;l++)o=n[l].cssText,a=r+n[l].selectorText,c=o.split(");")[0].match(/US\-ASCII\,([^"']+)/),c&&c[1]&&(i=decodeURIComponent(c[1]),u[a]=i);return u},i=function(e){var t,o,a;o="data-grunticon-embed";for(var c in e)if(a=c.slice(r.length),t=n.querySelectorAll(a+"["+o+"]"),t.length)for(var i=0;t.length>i;i++)t[i].innerHTML=e[c],t[i].style.backgroundImage="none",t[i].removeAttribute(o);return t},u=function(t){"svg"===e.method&&o(function(){i(c(a(e.href))),"function"==typeof t&&t()})};e.embedIcons=i,e.getCSS=a,e.getIcons=c,e.ready=o,e.svgLoadedCallback=u,e.embedSVG=u})(grunticon,this);
			
			grunticon(["<?php echo get_template_directory_uri(); ?>/library/css/icons.data.svg.css", "<?php echo get_template_directory_uri(); ?>/library/css/icons.data.png.css", "<?php echo get_template_directory_uri(); ?>/library/css/icons.fallback.css"]);
		</script>
		<noscript><link href="<?php echo get_template_directory_uri(); ?>/library/css/icons.fallback.css" rel="stylesheet"></noscript>


<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/interface/icon-114x114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/interface/icon-72x72.png">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/interface/icon-114x114.png">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/interface/favicon.gif">	
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/interface/favicon.ico">	




		<?php 
      $useGotham = get_option( 'ut_use_gotham' );
      if ($useGotham): ?> 
        <link rel="stylesheet" type="text/css" href="//cloud.typography.com/6831932/618846/css/fonts.css" />
    <?php endif ?>


	<?php wp_head(); ?>
<!--[if lt IE 9]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body <?php body_class(); ?>>
  <div id="orange-bar">
   <!--  <div class="container"><a href="http://www.utk.edu">UT</a> &raquo; <a href="#">Parent Unit</a> &raquo; <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></div> -->
  </div>	<div id="page" class="hfeed site row-offcanvas">


  <div id="main" class="site-main">

  <div class="main-content">

		<a class="sr-only sr-only-focusable" href="#content" title="<?php esc_attr_e( 'Skip to content', 'utthehill' ); ?>"><?php _e( 'Skip to content', 'utthehill' ); ?></a>


    <div id="sidebar">
  		<header id="masthead" class="site-header" role="banner">
              <h3 class="killer-logo"><a href="http://www.utk.edu">The University of Tennessee, Knoxville</a></h3>
              <h2 class="sr-only"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
              <button type="button" class="toggle close findpage">
                <span class="sr-only">Toggle navigation</span> <i class="icon-fa-find"></i><br><?php _e( 'FIND <br> PAGE', 'utthehill' ); ?>
              </button>
  		</header><!-- #masthead -->
  		<!-- #Find Box -->


        <div class="sidebar-offcanvas inactive">
            <nav role="navigation">
        		      <button type="button" class="toggle close collapseMenu">
        		        <span class="sr-only">Toggle navigation</span> <i class="icon-fa-chevron-right"></i><br><?php _e( 'CLOSE', 'utthehill' ); ?>
        		      </button>
        			    <!-- Collect the nav links, forms, and other content for toggling -->
  					      <form role="search">
  					        <div class="form-group">
  					          <input  type="text" class="supersearch form-control" placeholder="Find a Page" role="search" aria-label="Site Search">
  					        </div>
                    <input type="submit" name="btnF" class="sr-only"  value="Go">
  					      </form>
                  <?php  get_template_part( 'library/partials/off-canvas', 'page' ); ?>
        		</nav><!-- #site-navigation -->
        </div>
      </div>
      
	<div id="primary" class="content-area">
		<div id="sitetitle" class="site-header">
      <h2 class="department"><a  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
       <?php 
        $includeParent = get_option( 'ut-site-info-parentunitincludeinheader_checkbox' );

        if(isset($includeParent) && $includeParent == 'on'): ?>
          <small><a href="<?php echo get_option( 'ut-site-info-parentunitlink' ) ?>"><?php echo get_option( 'ut-site-info-parentunit' ) ?></a></small>
      <?php endif ?>
      </h2>
		</div>



















