$(document).ready(function() {
    
    
    // scripts voor smooth in-page anchor scrolling
    $('a[href^=#]').click(function(e) {
        e.preventDefault();
        var $target = $(this).attr('href');
        var off = 100;
        if ($target === '#top') {
            $target = '#wrapper';
            off = 0;
        }
        console.log(off);
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
    
});