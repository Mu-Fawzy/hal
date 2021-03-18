//nav
$('.nav_responsive i').click(function(){
   $('header .nav').fadeToggle();
});

if ($(window).width() > 974) {
	$('li.menu-item-has-children a').click(function(){
		$(this).attr('href');
	})
} else if ($(window).width() <= 974){
	$('li.menu-item-has-children').addClass('fa fa-angle-down');
	$('li.menu-item-has-children > a').click(function(){
		$(this).removeAttr('href');
		$(this).parent('li').find('>ul.sub-menu').slideToggle();
		$('ul.sub-menu li > ul.sub-menu').not($(this).parent('li').find('>ul.sub-menu')).slideUp(200);
	})
}

$('.nav_responsive_top').click(function(){
	$('.search-sign .right .top-nav ul').fadeToggle();
})



// search header
$('.search a').click(function() {
	$(this).removeAttr('href');
	$('.search').toggleClass('active');
	$('.search a ~ form').fadeToggle();
});

// article share
var setHeight = $('article .share').innerHeight() + 32;
$('article .content-slide').height(setHeight).css({
	'overflow':'hidden',	
});


// carousel
$(".owl-carousel").owlCarousel({
	//autoPlay: 3000, //Set AutoPlay to 3 seconds
	items : 6,
	//itemsDesktop : [1199,3],
	//itemsDesktopSmall : [979,3]'
	navigation : true,
	navigationText : ["<span class='bx-prev' href=''><i class='fa fa-angle-left'></i></span>","<span class='bx-next' href=''><i class='fa fa-angle-right'></i></span>"],
	direction:'rtl'
});	

// stickysidebar
$('.sidebar').theiaStickySidebar({
	  // Settings
	  additionalMarginTop: 80
});

// you want to enable the pointer events only on click;

$('.video-container iframe').addClass('scrolloff'); // set the pointer events to none on doc ready
$('.video-container').on('click', function () {
	$('.video-container iframe').removeClass('scrolloff'); // set the pointer events true on click
});

// you want to disable pointer events when the mouse leave the canvas area;

$(".video-container iframe").mouseleave(function () {
	$(this).addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
});


if ($('header div').hasClass('bottom')) {
    var stickyNavTop = $('header .bottom').offset().top;  

    var stickyNav = function(){  
        var scrollTop = $(window).scrollTop();  
        if (scrollTop > stickyNavTop) {   
            $('header .bottom').addClass('sticky navbar-fixed-top');  
        } else {  
            $('header .bottom').removeClass('sticky navbar-fixed-top');   
        }  
    };  
    stickyNav();  

    $(window).scroll(function() {  
        stickyNav();  
    });  
}


if ($('div').hasClass('content-single')) {
    var stickyNavTop2 = $('.content-single').offset().top;  

    var stickyNav2 = function(){  
        var scrollTop2 = $(window).scrollTop();  
        if (scrollTop2 > stickyNavTop2) {   
            $('article.single .header_article').addClass('sticky navbar-fixed-top');
        } else {  
            $('article.single .header_article').removeClass('sticky navbar-fixed-top'); 
        }  
    }; 
    stickyNav2();  

    $(window).scroll(function() {  
        stickyNav2();  
    });  
}