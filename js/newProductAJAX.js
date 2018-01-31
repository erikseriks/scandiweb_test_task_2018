$(document).ready(function(){
	//Prevent form submit and use ajax, alert returned text.
	$("form").submit(function(event){
		event.preventDefault();
		$.post("../includes/actionPage.php", $("#productAddForm").serialize())
		.done(function(data) {
    		alert(data);
  		});
	})
});