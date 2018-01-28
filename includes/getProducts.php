<?php
//Set encoding to utf8.
include("/opt/lampp/htdocs/product/includes/encoding.php");
//Class for connecting to MySQL database.
require_once("dbConnect.php");

//Class used for getting all product data from database.
class getProducts extends dbConnect
{
    //Method for fetching all products from database.
    protected function getAll()
    {
        $allProducts = array();

        $sql = "SELECT * FROM product";

        $mysqli = $this->connect();

        foreach ($mysqli->query($sql) as $row) {
            $allProducts[] = $row;
        }
        //Returns array of rows.
        return $allProducts;
        $mysqli->close();
    }
}
