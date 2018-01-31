$(document).ready(function(){
	$(".checkbox").on("click", function(){
		if($( ".checkbox:checked" ).length > 0){
		$('#deleteSku').prop('disabled', false);
		}else{
		$('#deleteSku').prop('disabled', true);
			}
	});
});