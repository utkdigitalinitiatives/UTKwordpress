<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage UT-TheHill
 * @since Twenty Thirteen 1.0
 */
?>

    <?php if ( is_active_sidebar( 'sidebar-3' ) ||  is_active_sidebar( 'sidebar-4' ) ||  is_active_sidebar( 'sidebar-5' )  ) : ?>
      <div id="linkdrawer" <?php utthehill_footer_sidebar_class(); ?>>
        <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
          <div id="first" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-3' ); ?>
          </div><!-- #first .widget-area -->
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
          <div id="second" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-4' ); ?>
          </div><!-- #second .widget-area -->
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
          <div id="third" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-5' ); ?>
          </div><!-- #third .widget-area -->
        <?php endif; ?>
      </div><!-- #linkdrawer -->
    <?php endif; ?>





	</div><!-- #primary -->
</div><!-- .main-content -->

  <footer id="colophon" class="site-footer" role="contentinfo">
    <?php if ( is_active_sidebar( 'sidebar-6' ) ||  is_active_sidebar( 'sidebar-7' ) ||  is_active_sidebar( 'sidebar-8' ) ||  is_active_sidebar( 'sidebar-9' ) ) : ?>
      <section id="expandedfooter" <?php utthehill_expandedfooter_sidebar_class(); ?>>
        <div class="container">
          <?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
            <div id="one" class="widget-area" role="complementary">
              <?php dynamic_sidebar( 'sidebar-6' ); ?>
            </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
            <div id="two" class="widget-area" role="complementary">
              <?php dynamic_sidebar( 'sidebar-7' ); ?>
            </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
            <div id="third" class="widget-area" role="complementary">
              <?php dynamic_sidebar( 'sidebar-8' ); ?>
            </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
            <div id="four" class="widget-area" role="complementary">
              <?php dynamic_sidebar( 'sidebar-9' ); ?>
            </div>
          <?php endif; ?>
        </div>
      </section><!-- #Expandedfooter -->
    <?php endif; ?>

   <div id="siteinfo">

		<?php 
      $title          = get_bloginfo('name');
      $address        = get_option( 'ut-site-info-address');
      $generalInfo    = get_option( 'ut-site-info-general-info');
      $lat            = get_option( 'ut-site-info-gmap-lat');
      $long           = get_option( 'ut-site-info-gmap-lng');
      $parentunit     = get_option( 'ut-site-info-parentunit');
      $parentunitlink = get_option( 'ut-site-info-parentunitlink');

      ?>
			<div id="meta-info">
  			<p>
					<?php if($title && $title != "") {
						echo "<strong class=\"sitetile\">" . $title . "</strong><br>";
					}
					?>
					<?php 
            if($parentunit && $parentunit != "" && $parentunitlink && $parentunitlink != "") {
              echo "<a href='".$parentunitlink."'><i>".$parentunit."</i></a><br>";
            } elseif($parentunit && $parentunit != "") {
  						echo "<i>" . $parentunit . "</i><br>";
  					}
					?>
        </p>
			</div>
				  <div id="meta-contact"><p><?php
  					if($lat && $lat != "" && $long && $long != "") {
  						echo "<a class='view_map' target='_blank' href='http://maps.google.com/?q=".$lat.",".$long."' >";
  					}
  					if($address && $address != "") {
  						echo $address." ";
  					}
  					if($lat && $lat != "" && $long && $long != "") {
  						echo "</a>";
  					}
      			echo "<br>";
            if($generalInfo && $generalInfo != "") {
              echo $generalInfo."<br>";
            }

					$pCount  = get_option('phone-count');
          $eCount  = get_option('email-count');
					$iter = 1; 
					while($iter <= $pCount): ?>
					    <?php $label = get_option('ut-site-info-phonelabel-'.$iter);
						  if($label): ?>
						 	<?php echo get_option( 'ut-site-info-phonelabel-'.$iter ); ?>:&nbsp;<?php echo get_option('ut-site-info-phone-'.$iter); 
                if($iter != $pCount): ?> <span class="bg-scr">&bull;</span><span class="sm-scr"></span><?php endif ?>
            <?php endif ?>
            <?php $iter++; ?>
          <?php endwhile ?>
          <span class="emailList">
            <?php 
              
              $iter = 1;
              while($iter <= $eCount): ?>
              <?php  $label = get_option( 'ut-site-info-emaillabel-'.$iter);
              
              if($iter == 1 && $label != "") {
                echo "<span class='bg-scr dividingBullet'>&bull;</span>";
              }
              
              if($label): ?>
                  <?php echo get_option( 'ut-site-info-emaillabel-'.$iter ); ?>:&nbsp;<a href="mailto:<?php echo get_option('ut-site-info-email-'.$iter); ?>" ><?php echo get_option('ut-site-info-email-'.$iter); 
                  if($iter != $eCount): ?></a> <span class="bg-scr">&bull;</span><span class="sm-scr"></span><?php endif ?>
              <?php endif ?>
              <?php $iter++; ?>
            <?php endwhile 
          ?></span></p></div>

   </div><!-- #siteinfo -->

 <div id="campus-footer">
   <div id="utk">
     <div id="bobi">
        <h2><a href="http://www.utk.edu" class="logo icon-bobi-main"><?php printf( 'The University of Tennessee', 'utthehill' ); ?></a></h2>
      </div>
      <div id="address">
          <p><strong>The University of Tennessee, Knoxville</strong><br>Knoxville, Tennessee 37996<br> 865-974-1000</p>
      </div>
    </div>

    <div id="toolkit">


 
<form method="post" action="http://google.tennessee.edu/search">
    <div class="form-group">
       <input type="text" class="form-control" name="q"  maxlength="256" onfocus="if(this.value == 'Search utk.edu') { this.value = ''; }" value="Search utk.edu" title="Search UT Knoxville">
    </div>
    <input type="submit" name="btnG" class="btn btn-orange"  value="Go">

    <input type="hidden" name="output" value="xml_no_dtd">
    <input type="hidden" name="oe" value="UTF-8">
    <input type="hidden" name="ie" value="UTF-8">
    <input type="hidden" name="ud" value="1">
    <input type="hidden" name="site" value="Knoxville">
    <input type="hidden" name="client" value="utk_translate_docpreview_sc_frontend">
    <input type="hidden" name="entqr" value="3">
    <!--    <input type="hidden" name="sitesearch" value="utk.edu" /> -->
    <input type="hidden" name="qtype" class="searchtext" value="utk" title="search type">
    <input type="hidden" name="proxystylesheet" value="utk_translate_docpreview_sc_frontend">
</form>
  					                <br>
      <nav  role="navigation">
          <ul>
            <li><a href="http://www.utk.edu/events/">Events</a></li>
            <li><a href="http://www.utk.edu/maps/">Map</a></li>
          </ul>  
          <ul>
            <li><a href="http://www.utk.edu/alpha/">A-Z </a></li>
            <li><a href="http://directory.utk.edu">Directory</a></li>
          </ul>  
          <ul>
            <li><a href="http://www.utk.edu/admissions/">Apply</a></li>
              <li><a href="http://giveto.utk.edu">Give to UT</a></li>
          </ul>  
      </nav>
    </div>
</div>  
</footer><!-- #colophon -->

</div><!-- #main -->

  <div id="system-indicia">
    <p>The flagship campus of <a href="http://tennessee.edu">the University of Tennessee System</a> and partner in <a href="http://www.tntransferpathway.org/">the Tennessee Transfer Pathway</a>.</p>
  </div>

</div><!-- #page -->



	<?php wp_footer(); ?>

		</body>
</html>