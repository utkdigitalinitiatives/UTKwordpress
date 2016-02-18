<div id="megamenu"<?php if ( has_nav_menu( 'single-menu' ) ) { echo '" class="singlemenu"'; }?>>
  <ul class="mainnav" role="menu">
      <?php /*
  
      Our navigation menu.  If one isn't filled out, wp_nav_menu falls
      back to wp_page_menu.  The menu assigned to the primary position is
      the one used.  If none is assigned, the menu with the lowest ID is
      used. 

      CE: There is a toggle for a single menu or multiple menus. 
      Single menus are single tier and do not allow sublinks. This is typically for sites with a shallow  nav structure. 
      */

      if ( has_nav_menu( 'single-menu' ) ): ?>



         <?php 
           // Is "home button" desired in the theme options
           $settings = get_option( 'ut_options');
              if ( 'true' != $settings['home_button'] ) { ?> 
              <li>
                <a id="drop2" class="home_button" href="<?php echo esc_url( home_url( '/' ) ); ?>"  role="button"  >Home <i class="icon-fa-home pull-right"></i></a>
              </li>
          <?php }    ?>

                <?php
                  wp_nav_menu( array(
                    'container' => '',
                    'items_wrap'=>'%3$s',
                    'depth'           => 1,
                    'theme_location' => 'single-menu',
                    ) ); 
                ?>
      <?php else:


  
         // If there is a home button.
           $settings = get_option( 'ut_options');
              if ( 'true' != $settings['home_button'] ) { ?> 
              <li>
                <a class="home_button" href="<?php echo esc_url( home_url( '/' ) ); ?>"   role="button"  >Home <i class="icon-fa-home pull-right"></i></a>
              </li>
          <?php }   


         // If there is a menu-one, then show it.

        if ( has_nav_menu( 'menu-one' ) ) { ?>
          <li class="top-menu-item">
            <button id="drop2" class="list-item-button" aria-haspopup="true" role="button" ><?php echo gm_get_theme_menu_name('menu-one'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub" id="menu-one"  aria-labelledby="drop2" aria-expanded="false">
              <button class="menu-back btn"  data-toggle="dropdown"  role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
              <h3><?php echo gm_get_theme_menu_name('menu-one'); ?> </h3>
                <div class="inner">
                  <?php
                    wp_nav_menu( array( 'container_class' => 'menu-header','theme_location' => 'menu-one',  "walker" => new ut_add_aria_to_menu(), ) ); 
                  ?>
                </div>
            </div>
          </li>
        <?php }; 
               
        // If there is a menu-two, then show it.
        if ( has_nav_menu( 'menu-two' ) ) { ?>
          <li class="top-menu-item">
            <button id="drop3" class="list-item-button" aria-haspopup="true" role="button" ><?php echo gm_get_theme_menu_name('menu-two'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub dropdown-menu" id="menu-two"  aria-labelledby="drop3" aria-expanded="false">
              <button  class="menu-back btn" data-toggle="dropdown" role="button" ><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
              <h3><?php echo gm_get_theme_menu_name('menu-two'); ?> </h3>
                <div class="inner">
                <?php
                  wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-two',  "walker" => new ut_add_aria_to_menu(), ) ); 
                ?>
                </div>
            </div>
          </li>
        <?php }; 
          
        // If there is a menu-three, then show it.
        if ( has_nav_menu( 'menu-three' ) ) { ?>
          <li class="top-menu-item">
            <button  id="drop4" class="list-item-button" aria-haspopup="true" role="button" ><?php echo gm_get_theme_menu_name('menu-three'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub dropdown-menu" id="menu-three"  aria-labelledby="drop4" aria-expanded="false">
              <button class="menu-back btn"  data-toggle="dropdown" aria-haspopup="true" role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
              <h3><?php echo gm_get_theme_menu_name('menu-three'); ?> </h3>
                <div class="inner">
                  <?php
                    wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-three',  "walker" => new ut_add_aria_to_menu(), ) ); 
                  ?>
                </div>
            </div>
          </li>
        <?php };
        
        // If there is a menu-four, then show it.
        if ( has_nav_menu( 'menu-four' ) ) { ?>
          <li class="top-menu-item">
            <button  id="drop5" class="list-item-button" aria-haspopup="true" role="button" ><?php echo gm_get_theme_menu_name('menu-four'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub dropdown-menu" id="menu-four" aria-labelledby="drop5" aria-expanded="false">
              <button  class="menu-back btn"  data-toggle="dropdown" role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
              <h3><?php echo gm_get_theme_menu_name('menu-four'); ?> </h3>
                <div class="inner">
                <?php
                  wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-four',  "walker" => new ut_add_aria_to_menu(), ) ); 
                ?>
                </div>
            </div>
          </li>
        <?php }; 
        
        // If there is a menu-five, then show it.
        if ( has_nav_menu( 'menu-five' ) ) { ?>
          <li class="top-menu-item">
            <button  id="drop6"  class="list-item-button" aria-haspopup="true" role="button" ><?php echo gm_get_theme_menu_name('menu-five'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
              <div class="megamenu-sub" id="menu-five"  aria-labelledby="drop6" aria-expanded="false" >
                <button  class="menu-back btn"  data-toggle="dropdown" role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
                <h3><?php echo gm_get_theme_menu_name('menu-five'); ?> </h3>
                <div class="inner">
                  <?php
                    wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-five',  "walker" => new ut_add_aria_to_menu(), ) ); 
                  ?>
                </div>
              </div>
          </li>
         <?php }; 
         
    
        // If there is a menu-six, then show it.
        if ( has_nav_menu( 'menu-six' ) ) { ?>
          <li class="top-menu-item">
            <button id="drop7"  class="list-item-button" aria-haspopup="true" role="button"><?php echo gm_get_theme_menu_name('menu-six'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub" id="menu-six"  aria-labelledby="drop7" aria-expanded="false" >
              <button class="menu-back btn"   data-toggle="dropdown" role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
              <h3><?php echo gm_get_theme_menu_name('menu-six'); ?> </h3>
                <div class="inner">
                  <?php
                    wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-six',  "walker" => new ut_add_aria_to_menu(), ) ); 
                  ?>
                </div>
            </div>
          </li>
        <?php }; 
      
    
        // If there is a menu-seven, then show it.
        if ( has_nav_menu( 'menu-seven' ) ) { ?>
          <li class="top-menu-item">
            <button id="drop8" class="list-item-button" aria-haspopup="true" role="button"><?php echo gm_get_theme_menu_name('menu-seven'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub" id="menu-seven"  aria-labelledby="drop8" aria-expanded="false">
              <button  class="menu-back btn"  data-toggle="dropdown"  role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
              <h3><?php echo gm_get_theme_menu_name('menu-seven'); ?> </h3>
                <div class="inner">
                <?php
                  wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-seven',  "walker" => new ut_add_aria_to_menu(), ) ); 
                ?>
                </div>
            </div>
          </li>
        <?php }; 
        
    
        // If there is a menu-eight, then show it.
        if ( has_nav_menu( 'menu-eight' ) ) { ?>
          <li class="top-menu-item">
            <button  id="drop9" class="list-item-button" aria-haspopup="true" role="button"><?php echo gm_get_theme_menu_name('menu-eight'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub" id="menu-eight"  aria-labelledby="drop9" aria-expanded="false">
              <button  class="menu-back btn"  data-toggle="dropdown" role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
               <h3><?php echo gm_get_theme_menu_name('menu-eight'); ?> </h3>
                <div class="inner">
               <?php
                  wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-eight',  "walker" => new ut_add_aria_to_menu(), ) ); 
                ?>
                </div>
            </div>
          </li>
        <?php }; 
        // If there is a menu-nine, then show it.
        if ( has_nav_menu( 'menu-nine' ) ) { ?>
          <li class="top-menu-item">
            <button  id="drop10" class="list-item-button" aria-haspopup="true" role="button"><?php echo gm_get_theme_menu_name('menu-nine'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub" id="menu-nine"  aria-labelledby="drop10" aria-expanded="false">
              <button  class="menu-back btn"  data-toggle="dropdown" role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
               <h3><?php echo gm_get_theme_menu_name('menu-nine'); ?> </h3>
                <div class="inner">
               <?php
                  wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-nine',  "walker" => new ut_add_aria_to_menu(), ) ); 
                ?>
                </div>
            </div>
          </li>
        <?php };
        // If there is a menu-ten, then show it.
        if ( has_nav_menu( 'menu-ten' ) ) {?>
          <li class="top-menu-item">
            <button  id="drop11" class="list-item-button" aria-haspopup="true" role="button"><?php echo gm_get_theme_menu_name('menu-ten'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub" id="menu-ten"  aria-labelledby="drop11" aria-expanded="false">
              <button  class="menu-back btn"  data-toggle="dropdown" role="button"><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
               <h3><?php echo gm_get_theme_menu_name('menu-ten'); ?> </h3>
                <div class="inner">
               <?php
                  wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-ten',  "walker" => new ut_add_aria_to_menu(), ) ); 
                ?>
                </div>
            </div>
          </li>
        <?php }; 
        
    
        // If there is a menu-eleven, then show it.
        if ( has_nav_menu( 'menu-eleven' ) ) { ?>
          <li class="top-menu-item">
            <button  id="drop12" class="list-item-button" aria-haspopup="true" role="button"><?php echo gm_get_theme_menu_name('menu-eleven'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub" id="menu-eleven"  aria-labelledby="drop12" aria-expanded="false">
              <button  class="menu-back btn"  data-toggle="dropdown" aria-haspopup="true" role="button" ><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
              <h3><?php echo gm_get_theme_menu_name('menu-eleven'); ?> </h3>
                <div class="inner">
                  <?php
                    wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-eleven',  "walker" => new ut_add_aria_to_menu(), ) ); 
                  ?>
                </div>
            </div>
          </li>
        <?php }; 
        
        // If there is a menu-twelve, then show it.
        if ( has_nav_menu( 'menu-twelve' ) ) { ?>
          <li class="top-menu-item">
            <button id="drop13"  class="list-item-button" aria-haspopup="true" role="button"><?php echo gm_get_theme_menu_name('menu-twelve'); ?> <i class="icon-fa-chevron-right pull-right"></i></button>
            <div class="megamenu-sub" id="menu-twelve"  aria-labelledby="drop13" aria-expanded="false">
              <button  class="menu-back btn"  data-toggle="dropdown" aria-haspopup="true" role="button" ><i class="icon-fa-chevron-left"></i> <span class="back">Back</span></button>
              <h3><?php echo gm_get_theme_menu_name('menu-twelve'); ?> </h3>
                <div class="inner">
                <?php 
                  wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-twelve',  "walker" => new ut_add_aria_to_menu(), ) ); 
                ?>
                </div>
            </div>
          </li>
        <?php };
      endif; 


      // Giving Bar Options

      $settings = get_option( 'ut_options');
             if ( 'default' == $settings['givingbar_status'] ) { 
              ?>
                <li id="giving">
                  <a href="http://giveto.utk.edu">Give to UT <i class="icon-fa-gift fa-lg pull-right"></i></a>
                </li>
              <?php } 
            else if ( 'custom' == $settings['givingbar_status'] ){
              ?>
                <li id="giving">
                  <a href="<?php if( $settings['give_uri_text'] != '' ) : echo $settings['give_uri_text'];  endif; ?>">Give to <?php if( $settings['give_place_text'] != '' ) : echo $settings['give_place_text'];  endif; ?><i class="icon-fa-gift pull-right"></i></a>
                </li>
              <?php
              }
        ?>


 
 
  </ul>
</div>