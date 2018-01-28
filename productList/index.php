<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Product List</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
<a href="../productAdd/index.html">new</a>
<!--Form for "Mass Delete"-->
<form action="../includes/actionPage.php" method="POST">
<!--Header-->
<div id="header">
  <div class="left">
    <h1>Product List</h1>
  </div>
  <div class="right">
    <button type="submit" name="deleteSku">Delete</button>
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