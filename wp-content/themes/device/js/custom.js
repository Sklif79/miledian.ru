var $j = jQuery.noConflict();

 jQuery(document).ready(function(){	
	$j('#slider').nivoSlider({
        effect:'boxRandom,boxRain,boxRainReverse,boxRainGrow,boxRainGrowReverse', // Specify sets like: 'fold,fade,sliceDown'
        animSpeed:300, // Slide transition speed
        pauseTime:4000, // How long each slide will show
        directionNav:false, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
        controlNav:true, // 1,2,3... navigation
        controlNavThumbs:false // Use thumbnails for Control Nav

       
    });
});
 
       
