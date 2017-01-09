$(document).ready(function() {
  
  
  // build pageindex
  $('#article h2').each(function() {
    $('#pageindex').append('<li><a href="#' + $(this).attr('id') + '">' + $(this).html() + '</a></li>');
  });

  
  // scripts for smooth in-page anchor scrolling
  $('a[href^=#]').click(function(e) {
    e.preventDefault();
    var $target = $(this).attr('href');
    var off = 100;
    if ($target === '#top') {
      $target = '#wrapper';
      off = 0;
    }
    $($target).ScrollTo({
      duration: 500,
      animation: 'ease',
      offsetTop: off,
      callback: function(){ /*location.hash = $target;*/ }
    });
  });
  
  
  // menu hover script
  $('ul#menu a').hover(function() {
    hoveredItem = $(this).text();
    if ($('ul#'+hoveredItem).css('display') == 'none') {
      $('ul.submenu').css('height','0').hide();
      
      var curHeight = $('ul#'+hoveredItem).height();
      $('ul#'+hoveredItem).show().css('height','auto');
      var autoHeight = $('ul#'+hoveredItem).height();
      $('ul#'+hoveredItem).height(curHeight).animate({height: autoHeight}, 200);
    }
  });
  
  $('ul#menu a.nest').click(function(e) {
    e.preventDefault();
    hoveredItem = $(this).text();
    $('nav').hover(function() {
    }, function() {
      if ($('ul#'+hoveredItem).css('display') != 'none') {
        hovering = setTimeout(function() {$('ul.submenu').stop(true).fadeOut(100)}, 300);
      }
    });
  });
  
  var navHeight = $('nav').height();
  $('.menu-static').css('height',navHeight);
  
  var hovering;
  $('nav').hover(function() {
    clearTimeout(hovering);
  }, function() {
    hovering = setTimeout(function() {$('ul.submenu').stop(true).fadeOut(100)}, 300);
  });
  
  $(window).scroll(function() {
    scroll = $(window).scrollTop();
    navY = $('.menu-static').offset().top;
    asideY = $('aside').offset().top;
    
    if (scroll >= navY) {
      $('ul.submenu').each(function() {
        mainMenuItem = $(this).attr('id');
        mainMenuItemLeft = $('#menu li#'+mainMenuItem).offset().left - $('#menu').offset().left;
        $(this).css('left',mainMenuItemLeft);
      });
      
      $('nav').addClass('floating');
      
      asideX = $('aside').offset().left;
      $('aside').css('position','fixed');
      $('aside').css('top','135px');
      $('aside').css('left',asideX);
      
      $('.small_logo').show();
        
    } else {
      $('ul.submenu').each(function() {
        mainMenuItem = $(this).attr('id');
        mainMenuItemLeft = $('#menu li#'+mainMenuItem).offset().left - $('#menu').offset().left;
        $(this).css('left',mainMenuItemLeft);
      });
      
      $('nav').removeClass('floating');
      
      $('aside').css('position','absolute');
      $('aside').css('top','120px');
      $('aside').css('left','auto');
      
      $('.small_logo').hide();
    }
    
    if (scroll >= (navY+100) && scroll < (navY+300)) {
      logoPosY = scroll-navY-300;
      $('.small_logo').css('top',logoPosY);
    } else if (scroll > (navY+300)) {
      $('.small_logo').css('top','0px');
    }
  });
  
  alignMenuItems();
  
});

  
$(window).resize(function() {
  alignMenuItems();
});


function alignMenuItems() {

  $active = $('ul#menu > li > a.active');
  if($active.length > 0) {
    pointerPos = $active.offset().left-$('nav').offset().left + ($active.width())/2;
    $('.pointer').css('left',pointerPos);
  }
  
  $('ul.submenu').each(function() {
    mainMenuItem = $(this).attr('id');
    mainMenuItemLeft = $('#menu li#'+mainMenuItem).offset().left - $('#menu').offset().left;
    $(this).css('left',mainMenuItemLeft);
    $('li', this).each(function() {
      if ($(this).text() === "<?php echo $page['page_title'] ?>") {
        $('a',this).addClass('active');
      }
    });
  });
  
  $('.magnific-popup-image').magnificPopup({
    type:'image',
    mainClass: 'mfp-fade',
    gallery: {
      enabled: true, // set to true to enable gallery
    
      preload: [0,2], // read about this option in next Lazy-loading section
    
      navigateByImgClick: true,
    
      arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
    
      tPrev: 'Vorige', // title for left button
      tNext: 'Volgende', // title for right button
      tCounter: '<span class="mfp-counter">%curr% van %total%</span>' // markup of counter
    }, 
    zoom: {
      enabled: true, // By default it's false, so don't forget to enable it
  
      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function 
  
      // The "opener" function should return the element from which popup will be zoomed in
      // and to which popup will be scaled down
      // By defailt it looks for an image tag:
      opener: function(openerElement) {
        // openerElement is the element on which popup was initialized, in this case its <a> tag
        // you don't need to add "opener" option if this code matches your needs, it's defailt one.
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });
}