jQuery(document).ready(function($){

	//** === === ===>>> OPEN EXTERNAL LINKS IN NEW TAB
	$('a').filter(function() {
		return this.hostname && this.hostname !== location.hostname;
	}).attr('target','_blank');

	//** === === ===>>> SUBPAGE HEADER IMAGE & TITLE
	if($('.title').length > 0){ // SUBPAGES
		if($('.no-image').length < 1){
			$(window).on("load resize",function(){
				$('.title span').centerr({
					fullWidth:true
				});
			});
		}
	}

	$('header nav>ul').slicknav({
		appendTo:'header',
		allowParentLinks:true
	});

});