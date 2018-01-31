<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Product List</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--Hosted js library: jquery 3.2.1-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--js script for "massDeleteForm" submit action-->
<script type="application/javascript" src="../js/submitDisable.js"></script>
</head>

<body>
<a href="../productAdd/index.html">new</a>
<!--Form for "Mass Delete"-->
<form id="massDeleteForm" action="../includes/actionPage.php" method="POST">
<!--Header-->
<div id="header">
  <div class="left">
    <h1>Product List</h1>
  </div>
  <div class="right">
    <button id="deleteSku" type="submit" name="deleteSku">Delete</button>
  </div>
</div>
<br>
<!--Main/middle content area-->
<div id="content">
	<!-- All the product div`s goes here. -->
		<?php
        include("../includes/listProducts.php");
        $list = new listProducts();
        $list->list();
    ?>
	</div>
</form>

</body>
</html>