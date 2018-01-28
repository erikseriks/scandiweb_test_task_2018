<?php
//Set encoding to utf8.
include("/opt/lampp/htdocs/product/includes/encoding.php");

//Check if POST values are set.

//If data from "new product" form is recieved, then create and save the product.
if (isset($_POST["sku"], $_POST["name"], $_POST["price"], $_POST["type"])) {
    $type = trim($_POST["type"]);
    if (!empty($type)) {
        include_once("productFactory.php");
        //Appropriate object is instantiated according to type and then saved to database.
        $product = productFactory::createProduct($type);
        $product->save();
    }
}

//Array 'deleteSku[]' contains selected items to be deleted.
if (isset($_POST["deleteSku"])) {
    include_once("massDelete.php");
    //Delete all selected items.
    $massDelete = new massDelete;
    $massDelete->delete($_POST["deleteSku"]);
}

//If no statements are true, return to main page.
header("Location: ../productList/index.php");
