<?php
//Set encoding to utf8.
include("encoding.php");

//Check if POST values are set.

//If data from "new product" form is recieved, then create and save the product.
if (isset($_POST["sku"], $_POST["name"], $_POST["price"], $_POST["type"])) {
    if (!empty($_POST["type"])) {
        include_once("productFactory.php");
        //Appropriate object is instantiated according to type and then saved to database.
        $factory = new factory\productFactory('save', $_POST["type"]);
        die();
    }
}

//Array 'deleteSku[]' contains selected items to be deleted.
if (isset($_POST["deleteSku"])) {
    include_once("massDelete.php");
    //Delete all selected items.
    $massDelete = new massDelete($_POST["deleteSku"]);
    //Return to "Product List" page.
    header("Location: ../productList/index.php");
    die();
}

//If no statements are true, return to main page.
header("Location: ../productList/index.php");
