jQuery(document).ready(function($){

	// HIDE RADIO BUTTONS & USE CUSTOM ISH
	$('.radio').on("click",function(){
		var $inputs = $('input[type="radio"]');
		var $input = $(this).find('input');
		$inputs.attr("checked",false);
		$input.attr("checked",true);
		if(!$(this).hasClass("checked")){
			$('.checked').removeClass("checked");
			$(this).addClass("checked");
		}
	});

	// USE NAMES FOR PLACEHOLDERS (UGH)
	$('input[type="text"]').on("blur",function(){
		if($(this).val().trim() == "") $(this).val($(this).attr("name"));
	}).on("focus",function(){
		if($(this).val().trim() == $(this).attr("name")) $(this).val('');
	});

	$('form.cf').validatr({
		useAJAX:true,
		handlerPath:jwp_get_template_directory_uri + '/form-handlers/list-form.php',
		useFontAwesome:true,
		filterSpam:true,
		successMessage:"Thanks for reaching out!",
		replaceForm:true
	});

});