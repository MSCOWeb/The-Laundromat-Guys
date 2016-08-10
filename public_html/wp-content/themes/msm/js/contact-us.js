jQuery(document).ready(function($){

	// USE NAMES FOR PLACEHOLDERS (UGH)
	$('input[type="text"],textarea').on("blur",function(){
		if($(this).val().trim() == "") $(this).val($(this).attr("name"));
	}).on("focus",function(){
		if($(this).val().trim() == $(this).attr("name")) $(this).val('');
	});

	$('form.cf').validatr({
		useAJAX:true,
		handlerPath:jwp_get_template_directory_uri + '/form-handlers/contact-form.php',
		useFontAwesome:true,
		filterSpam:true,
		validateEmail:true,
		emailClass:'emailVal',
		successMessage:"Thanks for reaching out!"
	});

});