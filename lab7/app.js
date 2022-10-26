$(document).ready(function() {
  console.log( "ready!" );
$('.single-item').slick({
	infinite: false,
	dots: true,
	slidesToShow: 4,
	slidesToScroll: 2,
	responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        dots: false
	      }
	    }
    ]
});

}); 
