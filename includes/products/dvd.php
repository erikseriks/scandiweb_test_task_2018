<?php
//Set encoding to utf8.
include("./encoding.php");
//Parent class for all products.
require_once("./product.php");

class dvd extends product
{
    //Constant number, used in database to represent type of product.
    private const TYPE = 1;
    //Method for formatting, validating and saving individual product to database.
    public function save()
    {
        //Validate input and save to database.
        if (isset($_POST["size"])) {
            $this->attribute = trim(strip_tags($_POST["size"]));

            if ($this->validateNumber($this->price) && $this->validateNumber($this->attribute)) {
                if ($this->newListing(self::TYPE)) {
                    echo "DVD successfully saved!";
                }
            } else {
                echo "Invalid input!";
                die();
            }
        }
    }
}
