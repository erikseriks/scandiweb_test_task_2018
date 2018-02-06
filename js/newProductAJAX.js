$(document).ready(function(){
	//Prevent form submit and use ajax, alert returned text.
	$("form").submit(function(event){
		event.preventDefault();
		$.post("../includes/actionPage.php", $("#productAddForm").serialize())
		.done(function(data) {
    		$("#message").text(data);
  		});
	})

	//Remove message when editing input.
	$("form").on('input',function(e){
    	$("#message").empty();
	});
});