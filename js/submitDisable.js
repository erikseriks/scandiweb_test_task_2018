$(document).ready(function(){
	//Count checked checkboxes every time checkbox is checked and disable submit button if none are checked.
	$('#deleteSku').prop('disabled', true);
	$(".checkbox").on("click", function(){
		if($( ".checkbox:checked" ).length > 0){
			$('#deleteSku').prop('disabled', false);
		}else{
			$('#deleteSku').prop('disabled', true);
		}
	});
});