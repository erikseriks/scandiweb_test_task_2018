<?php
//Set encoding to utf8.
include("/opt/lampp/htdocs/product/includes/encoding.php");
//Class used for geting and returning an array of all products in database.
require_once("getProducts.php");

//Class for generating a grid of all products in "Product List" page.
class listProducts extends getProducts
{
    public function list()
    {
        //Get an array of all products, from database.
        $allProducts = $this->getAll();
        //Check for number of products, if none are found, echo a notification.
        if (count($allProducts) > 0) {
        
            //Format and echo each item, according to type.
            foreach ($allProducts as $row) {
                switch ($row['type']) {
                    case 1:	$attributeName = "Size: ";			$units = " MB";
                    break;
                    case 2: $attributeName = "Weight: ";		$units = " KG";
                    break;
                    case 3: $attributeName = "Dimensions: ";	$units = " mm";
                    break;
                    default: echo "Invalid type";
                    die();
                }
                //Generate a complete div of product including the checkbox.
                echo"<div class='product'>
							<div class='checkbox'>
							<input type='checkbox' name='deleteSku[]' value=".htmlentities($row['sku'], ENT_QUOTES, "UTF-8").">
							</div>
						".htmlentities($row['sku'], ENT_QUOTES, "UTF-8")."<br>
						".htmlentities($row['name'], ENT_QUOTES, "UTF-8")."<br>
						".htmlentities($row['price'], ENT_QUOTES, "UTF-8")." $<br>
						".$attributeName, htmlentities($row['attribute'], ENT_QUOTES, "UTF-8"), $units."
					</div>";
            }
        } else {
            echo "There are no products!";
        }
    }
}
