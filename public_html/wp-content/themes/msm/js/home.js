jQuery(document).ready(function($){

	$('.arrow').on("click",function(){
		$next = $(this).parent().next('section');
		$('html,body').animate({
			scrollTop: $next.offset().top
		},1200);
	});

});