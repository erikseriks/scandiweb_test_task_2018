<?php
//Set encoding to utf8.
include("./encoding.php");
//Parent class for all products.
require_once("./product.php");

class furniture extends product
{
    //Constant number, used in database to represent type of product.
    private const TYPE = 3;
    //Regular expression for special attribute validation
    //(3 positive non-decimals separated by x and first number can`t be 0).
    private const ATTRIBUTE_REGEX = "/(^[1-9][0-9]*(x|X)[1-9][0-9]*(x|X)[1-9][0-9]*$)/";
    //Method for formatting, validating and saving individual product to database.
    public function save()
    {
        //Convert and validate special attribute, then save to database.
        if (isset($_POST["height"], $_POST["width"], $_POST["length"])) {
            //Format special attribute.
            $this->attribute = trim(strip_tags($_POST["height"]))."x"
                              .trim(strip_tags($_POST["width"]))."x"
                              .trim(strip_tags($_POST["length"]));
            //Validate data before saving.
            if (preg_match(self::ATTRIBUTE_REGEX, $this->attribute) && $this->validateNumber($this->price)) {
                //Save this item in database.
                if ($this->newListing(self::TYPE)) {
                    echo "Furniture successfully saved!<br>
                     <a href='../productAdd/index.html'>new</a><br>
                    <a href='../productList/index.php'>list</a>";
                }
            } else {
                echo "Invalid input!";
                die();
            }
        }
    }
}
