$(document).ready(function(){
	$("form").submit(function(event){
		event.preventDefault();
		$.post("../includes/actionPage.php", $("#productAddForm").serialize())
		.done(function(data) {
    		alert(data);
  		});
	})
});