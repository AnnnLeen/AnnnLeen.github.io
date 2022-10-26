$(document).ready(function() {
  console.log( "ready!" );
$(".single-item").slick({
	dots: true,
	infinite: false,
	slidesToScroll: 2,
	slidesToShow: 4,
	responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        dots: false }
	    } ] 
});
}); 
