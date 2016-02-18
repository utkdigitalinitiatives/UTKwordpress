(function($) {
  var nivo_anim_speed = url_object.nivo_anim_speed;
  var nivo_pause_time = url_object.nivo_pause_time;
  $(document).ready(function() {
    // Global funct

    // Lightbox for ACF images
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox( );
        
    }); 

    // ALERTS RSS Feed grabber
    function getAlertRSS() {
      var seconds = new Date().getTime();
      $.ajax({
        url      : document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent('http://www.utk.edu/rssfeeds/utalert.xml?cachebust='+seconds),
        dataType : 'json',
        success  : function (data) {
          if (data.responseData.feed && data.responseData.feed.entries) {
            $.each(data.responseData.feed.entries, function (i, e) {
              var title = e.title;
              if(title !== "No Current Alerts") {
                // build alert html
                var copy = e.content;
                var link = e.link;
                var date = e.publishedDate;
                var orangeBar = $('#orange-bar');
                orangeBar.before("<div id='utsafe'>
                                    <div class='alert-icon'></div>
                                    <div class='message'>
                                      <div class='alert-date'><date>"+date+"</date></div>
                                      <h1 class='alert-header'>"+title+"</h1>
                                      <p class='alert-copy'>"+copy+"</p><a class='alertButton' href='http://www.utk.edu/status'>Read More</a>
                                    </div>
                                </div>");
              }
            });
          }
        }
      });
    }

  function isDesktop() {
    var desktop = 992;
    var screenWidth = $(window).width();
    
    if(screenWidth >= desktop) {
      return true;
    } else {
      return false;
    }
  }


  function viewportCheck() {
    if(isDesktop()) {
      $('body').attr('id', 'desktop');
      return "desktop";
    } else {
      $('body').attr('id', 'mobile');
      return "mobile";
    }
  }

  function addTopNavClassOnCurrentPage() {
    $('.top-menu-item ul li').each(function() {
      if($(this).hasClass('current_page_item')) {
        $(this).closest('.top-menu-item').addClass('current-top-menu-item');
      }
    });
  }

  function removeAllAriaExpanded() {
    $('.megamenu-sub').each(function() {
      $(this).attr('aria-expanded', false);
    });
  }

  function setDropdownMenu() {

    $('.list-item-button').click(function() {
      removeAllAriaExpanded();
      var subMenu = $(this).parent().find('.megamenu-sub');
      subMenu.attr('aria-expanded', true);
    });

    $('.menu-back').click(function() {
      removeAllAriaExpanded();
    });
  }

  function addOutlinesToAllElements() { // this is probably temp
    $(".top-menu-item").focus(function(){
      $(".top-menu-item").css("outline-color","#FF8200");
    });
  }

  function setKeystrokesOnMenu() {

    // $('.supersearch').bind('keydown', function(event) {
    //   switch(event.which){
    //     case 40: // down
    //         setTimeout(function() { 
    //           $('.mainnav li [role="button"]').first().focus();
    //         }, 20);      
    //     break;
    //   }
    // });

    $('.home_button').bind('keydown', function(event) {
      switch(event.which){
        case 40: // down
            setTimeout(function() { 
              var focused = $( document.activeElement );
              focused.parent().next().find('.list-item-button').focus();
            }, 20);      
        break;
        case 38: // up
          setTimeout(function() { 
            $('.supersearch').focus();
          }, 20);
        break;
      }
    });

    $('.list-item-button').bind('keydown', function(event) {
      switch(event.which){
        case 40: // down
            setTimeout(function() { 
              var focused = $( document.activeElement );
              focused.parent().next().find('.list-item-button').focus();
            }, 20);      
        break;

        case 39: // right
          setTimeout(function() { 
            $('.top-menu-item').each(function() {
              $(this).removeClass('open');
            });
            var focused  = $( document.activeElement );
            var listItem = focused.parent();
            
            if(!listItem.hasClass('open')) {
              listItem.addClass('open');
              listItem.find('.menu li a').first().focus();
            }
          }, 20);
        break;

        case 38: // up
          setTimeout(function() { 
            var focused = $( document.activeElement );
            var prevItem = focused.parent().prev();
            if(prevItem.find('.home_button').length > 0) {
              $('.home_button').focus();
            } else {
              focused.parent().prev().find('.list-item-button').focus();
            }
          }, 20);
        break;


        case 27: // esc
          setTimeout(function() { 
            var focused  = $( document.activeElement );
            focused.blur();
            $('.sub-menu').each(function() {
              $(this).removeAttr('style');
            });
            $('.top-menu-item').each(function() {
              $(this).removeClass('open');
            });
            removeAllAriaExpanded();

          }, 20);
        break;

      }
    });
   

    $('.menu-item a').bind('keydown', function(event) {
        switch(event.which){
          case 40: // down
            setTimeout(function() { 
              var focused = $( document.activeElement );
              focused.parent().next().find('a').focus();
            }, 20);
            
          break;

          case 39: // right
            setTimeout(function() { 
              var focused  = $( document.activeElement );
              var listItem = focused.parent();
              
              if(listItem.hasClass('menu-item-has-children')) {

                submenu = listItem.find('.sub-menu').first();
                height  = submenu.parent().outerHeight();
                width   = submenu.parent().outerWidth() + 6;
                top     = height + 1;

                submenu.css({ left: width, height: height }).fadeIn(50);
                submenu.find('a').first().focus();
              }
            }, 20);
          break;

          case 38: // up
            setTimeout(function() { 
              var focused = $( document.activeElement );
              focused.parent().prev().find('a').focus();
            }, 20);
          break;

          case 37: // left
            setTimeout(function() { 
              var focused  = $( document.activeElement );
              var parentMenu = focused.closest('ul');

              if(parentMenu.hasClass('sub-menu')) {
                parentMenu.removeAttr('style');
                parentMenu.prev().focus();
              } else if(parentMenu.hasClass('menu')) {
                parentMenu.parent().parent().parent().parent().find('.list-item-button').focus();
              }

            }, 20);
          break;

          case 27: // esc
            setTimeout(function() { 
              var focused  = $( document.activeElement );
              focused.blur();
              $('.sub-menu').each(function() {
                $(this).removeAttr('style');
              });
              $('.top-menu-item').each(function() {
                $(this).removeClass('open');
              });
              removeAllAriaExpanded();

            }, 20);
          break;
        }
    });
  }

 

  function activateAriaRoles() {
    setDropdownMenu();
    setKeystrokesOnMenu();
  }


  // Resets for when the viewport sswaps from mobile to desktop
  function resetMobileStyles() {
    var sidebar  = $('.sidebar-offcanvas');
    var primary  = $('#primary');
    var colophon = $('#colophon');
    var subMenu  = $('.megamenu-sub.active');

    primary.removeClass('disabledMenu');
    primary.off();

    colophon.removeClass('disabledMenu');
    colophon.off();

    sidebar.removeAttr("style");
    sidebar.removeClass('active').addClass('inactive');
    sidebar.off();

    subMenu.removeAttr('style');
    subMenu.removeClass('active');
    subMenu.off();
    
  }

    // Reset Styles
  function resetDesktopStyles() {
    $('.megamenu-sub').removeAttr('style');
    $('.content-area').removeAttr('style');
    $('.sidebar-offcanvas').removeClass('stuck').removeClass('affix-bottom').unwrap();
    $('#masthead').removeClass('stuck').unwrap();
    $('#sitetitle').removeClass('stuck').unwrap();
    killMenuAim();
    removeMenuAimStyles();
    killTheMenu();
    Waypoint.destroyAll();
    var topMenu = $('.top-menu-item');
    topMenu.removeClass('open');

    // Remove click listeners
    var listItem = $('.list-item-button');
    listItem.off();


    var htmlListener = $('html');
    htmlListener.off();

    var mainNav = $('.mainnav');
    mainNav.off();

    var backButton = $('.menu-back');
    backButton.off();


  }



  /* 

  MOBILE FUNCTIONS ************************************************

  */


  function killScroll(element) {
    var unscrollable = element;
    unscrollable.addClass('disabledMenu');
    element.bind('touchmove', function(e){e.preventDefault()});
  }

  function reviveScroll(element) {
    var scrollable = element;
    scrollable.removeClass('disabledMenu');
    element.unbind('touchmove');
  }

  function animateOffCanvasMenu() {
    var menu = $('.sidebar-offcanvas');
    if (menu.hasClass('inactive')) {
      menu.removeClass('inactive')
      menu.addClass('active');
      menu.animate({'right': '0'},'fast', function() {
          killScroll($('#primary'));
          killScroll($('#colophon'));
      });
    } else {
      reviveScroll($('#primary'));
      reviveScroll($('#colophon'));
      menu.removeClass('active')
      menu.addClass('inactive')
      menu.animate({'right': '-100%'}, 'fast', function() {
        menu.removeAttr("style");
      });
    }
  }

  function bootstrapTheMobileMenu() {
    
    

    // open subnavs
    $('.list-item-button').click(function() {
      var subMenu = $(this).parent().find('.megamenu-sub');
      subMenu.addClass('active');
      subMenu.animate({'right': '0'}, 'fast');
    });

    // Close subnavs
    $('.menu-back').click(function() {
      var subMenu = $(this).parent();
      if(subMenu.hasClass('active')) {
        subMenu.removeClass('active');
        subMenu.animate({'right': '-100%'}, 'fast', function() { subMenu.removeAttr("style"); });
      } else {
        subMenu.addClass('active');
        subMenu.animate({'right': '0'}, 'fast');
      }
    });

  }


  /* 

  DESKTOP FUNCTIONS ************************************************

  */

  function addNavWrapper() {
      // Need a background conainer for the menu, since the width of the li's is calculated by the sidebar rather than the content area.
      var navWrapperWidth = $('.content-area').width() - 50;
      $('.flyout .megamenu-sub').css("width", navWrapperWidth);
  }

  function killTheMenu() {
    $('.top-menu-item').removeClass('open');
  }

  // MenuAim
  function menuAim() {
    $('.top-menu-item').each(function() {
      var menu = $(this).find('.menu-header ul'); // Super cool delay menu
      menu.menuAim({
            activate: activateSubmenu,
            deactivate: deactivateSubmenu,

        }); 
    });
  }

  function activateSubmenu(row) {
      var row = $(row),
          submenu = row.find('.sub-menu').first(),
          height = submenu.parent().outerHeight(),
          width = submenu.parent().outerWidth() + 6;
        submenu.css({ left: width, height: height }).fadeIn(50);
  }

  function deactivateSubmenu(row) {
      var row = $(row),
          submenu = row.find('.sub-menu');
      submenu.fadeOut(50, function() { submenu.removeAttr("style"); });
      
  }

  function killMenuAim() {
    $('.top-menu-item').each(function() {
      var menu = $(this).find('.menu-header ul'); // Super cool delay menu
      menu.menuAim("destroy");
    });
  }

  function removeMenuAimStyles() {
    $('.sub-menu').removeAttr("style");
  }


  // click functions
  function animateFlyout() {
    $('.list-item-button').click(function() {
      killTheMenu();
      var listItem = $(this).parent();
      listItem.addClass('open'); 
    });

    // allow clicking anywhere off the menu to kill the menu
    $('html').click(function() {
       killTheMenu();
       removeMenuAimStyles();
    });

    // Reenact clicking in this element. 
    $('.mainnav').click(function(event){
         event.stopPropagation();
    });
  }

  function closeDesktopMenu() {
    $('.menu-back').click(function() {
      removeMenuAimStyles();
      var listItem = $('.top-menu-item');
      listItem = listItem.removeClass('open');
    });
  }

  function activateAriaOnHover() {
    $('.menu-item-has-children').hover(function() {
      $(this).attr('aria-expanded', true);
    }, function() {
      $(this).attr('aria-expanded', false);
    });
  }


  function affixHeader() {

    var stickyTitle = new Waypoint.Sticky({
      element: $('#sitetitle')[0]
    });

    var stickyLogo = new Waypoint.Sticky({
      element: $('#masthead')[0]
    });

    var stickyMenu = new Waypoint.Sticky({
      element: $('.sidebar-offcanvas')[0]
    });
  }


  function getMinContentHeight() {
    var headerHt = $('.site-header').height();
    var menuHt = $('.sidebar-offcanvas').height();
    var minMenuHeight = headerHt + menuHt;
    $('.content-area').css('min-height', minMenuHeight);
  }


  function bootstrapTheDesktopMenu() {
    addNavWrapper();
    animateFlyout();
    closeDesktopMenu();
    menuAim();
    affixHeader();
    // attachMenuToBottom();
    getMinContentHeight();
    activateAriaOnHover();
  }





  /* 

  ************************************************

  */


  // Site load tasks
  // First check the viewport
  var viewportId = viewportCheck();
  // load listener for current page class addition
  addTopNavClassOnCurrentPage();
  activateAriaRoles();
  getAlertRSS();

  // open mobile main navs
  $('.findpage').click(function() {
    animateOffCanvasMenu();
    
  });
  // close mobile main navs
  $('.collapseMenu').click(function() {
    animateOffCanvasMenu();
  });

  if(viewportId === 'mobile') {
    bootstrapTheMobileMenu();
  }

  if(viewportId === 'desktop') {
    bootstrapTheDesktopMenu();
  }

  // logic on resize
  $(window).resize(function() {
    // Check the viewport on resize. We will use this to leverage the calls to the menu based on the vp size.
    var currentViewport = $('body').attr('id');
    if(isDesktop() && currentViewport === 'mobile') {
      $('body').attr('id', 'desktop');
      resetMobileStyles();
      bootstrapTheDesktopMenu();
    } else if(!isDesktop() && currentViewport === 'desktop') {
      $('body').attr('id', 'mobile');
      resetDesktopStyles();
      bootstrapTheMobileMenu();
    }

    // Desktop tasks on resize
    if(isDesktop()) {
      killTheMenu();
      addNavWrapper();
      removeMenuAimStyles();
    }

  });


  });


  // Slider for the featured slider
  $(window).load(function() {

    function attachMenuToBottom() {
      var logoHeight  = 74;
      var menuHeight  = $('.sidebar-offcanvas').height();
      var footerCrash = logoHeight + menuHeight + 50;

      if($('#expandedfooter').length > 0) {
        var bottomWaypoint = $('#expandedfooter');
      } else {
        bottomWaypoint = $('#colophon');
      }

      bottomWaypoint.waypoint({
        handler: function(direction) {
          if(direction === "down") {
            $('.sidebar-offcanvas').addClass('affix-bottom');          
          } else {
            $('.sidebar-offcanvas').removeClass('affix-bottom');

          }
        },
        offset: footerCrash,
      })
    }
    if($('#mainslider').length == 0) {
      attachMenuToBottom();
    }
    if($('#slider').length == 0) {
      attachMenuToBottom();
    }

    $('.nivoSlider').css('display', 'block');
    $('#mainslider').nivoSlider({
          effect: 'fade',                 // Specify sets like: 'fold,fade,sliceDown'
          animSpeed: nivo_anim_speed,     // Slide transition speed
          pauseTime: nivo_pause_time,                // How long each slide will show
          startSlide: 0,                  // Set starting Slide (0 index)
          directionNav: true,             // Next & Prev navigation
          controlNav: true,               // 1,2,3... navigation
          controlNavThumbs: false,        // Use thumbnails for Control Nav
          pauseOnHover: true,             // Stop animation while hovering
          manualAdvance: false,           // Force manual transitions
          prevText: 'Prev',               // Prev directionNav text
          nextText: 'Next',               // Next directionNav text
          randomStart: true,              // Start on a random slide
          afterLoad: function(){
            attachMenuToBottom();
          },  
    });

    $('#slider').nivoSlider({
          effect: 'fade',                 // Specify sets like: 'fold,fade,sliceDown'
          slices: 15,                     // For slice animations
          boxCols: 8,                     // For box animations
          boxRows: 4,                     // For box animations
          animSpeed: 500,                 // Slide transition speed
          pauseTime: 3000,                // How long each slide will show
          startSlide: 0,                  // Set starting Slide (0 index)
          directionNav: true,             // Next & Prev navigation
          controlNav: true,               // 1,2,3... navigation
          controlNavThumbs: false,        // Use thumbnails for Control Nav
          pauseOnHover: true,             // Stop animation while hovering
          manualAdvance: false,           // Force manual transitions
          prevText: 'Prev',               // Prev directionNav text
          nextText: 'Next',               // Next directionNav text
          randomStart: true,              // Start on a random slide
          onInit: function(){
            attachMenuToBottom();
          },  
    });
  });


}(jQuery));