<?php
//Set encoding to utf8.
include("./encoding.php");
//Parent class for all products.
require_once("./product.php");

class book extends product
{
    //Constant number, used in database to represent type of product.
    private const TYPE = 2;
    //Method for formatting, validating and saving individual product to database.
    public function save()
    {
        //Validate input and save to database.
        if (isset($_POST["weight"]) && !empty(trim($_POST["weight"]))) {
            $this->attribute = strip_tags(trim($_POST["weight"]));
            
            try {
                $this->validateNumber($this->price);
                $this->validateNumber($this->attribute);
                $this->newListing(self::TYPE);
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }

            echo "Book successfully saved!";
        } else {
            echo "Please provide attribute!";
        }
    }
}
