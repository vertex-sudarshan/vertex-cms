$ ( document ). ready ( function (){
$ ( '.full-width-slider' ). lightSlider ({
                mode:"slide",
                item:1,
                slideMargin:0,
                auto:true,
                loop:true,
                speed:2000,
                pager:false,
                pause:7000
});

$ ( '.testimonial-slider' ). lightSlider ({
                mode:"slide",
                item:1,
                slideMargin:0,
                auto:true,
                loop:true,
                speed:2000,
                pager:false,
                pause:7000,
                adaptiveHeight:true,
});



$(document).on('scroll', function () {
    // if the scroll distance is greater than 100px
    if ($(window).scrollTop() > 40) {
      // do something
    	$('.site-header').addClass('scrolled-header');
    }
    else {
    	$('.site-header').removeClass('scrolled-header');
    }
});
}); 

$(document).ready(function(){
	$('#show_search').click(function(){
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$('#keyword_search').slideUp();
			$('#keyword_search').removeClass('active');
		}else{
			$(this).addClass('active');
			$('#keyword_search').slideDown();
			$('#keyword_search').addClass('active');
		}
	});
});