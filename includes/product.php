<?php
//Set encoding to utf8.
include("encoding.php");
//Class for connecting to MySQL database.
include_once("dbConnect.php");

//Parent class for types of products.
abstract class product extends dbConnect
{
    protected $sku;
    protected $name;
    protected $price;
    protected $attribute;

    public function __construct()
    {
        $this->sku =        $this->prepareSku($_POST["sku"]);
        $this->name =       trim(strip_tags($_POST["name"]));
        $this->price =      trim(strip_tags($_POST["price"]));
        //Individual types of products, processes "special attribute" separately.

        //Check for empty values.
        if (empty($this->sku)||empty($this->name)||empty($this->price)) {
            echo "All fields are required!";
            die();
        }

        /*Each type of product should have constant numeric value,
          representing it`s type, also used in database table.*/
    }
    
    protected function prepareSku(&$sku)
    {
        //Strips tags, removes spaces from beginning and end, converts to uppercase.
        $sku = mb_strtoupper(strip_tags($sku));
        //Filter invalid chars.
        $sku = preg_replace('/[^A-Z0-9\-]/', '', $sku);
        //Remove extra hyphens.
        $sku = preg_replace('/--+/', '-', $sku);
        //Remove all leading, trailing and standalone hyphens.
        $sku = preg_replace('/(?<!\w)-|-(?!\w)/', '', $sku);
        return $sku;
    }

    //Method to be called when saving individual products.
    abstract public function save();

    //Method for validating input numbers.
    protected function validateNumber(&$input)
    {
        //Only positive numbers with no more than two numbers after decimal point ar valid.
        $input = str_replace(",", ".", (string)$input);
        if (!(is_numeric($input) && $input > 0 && mb_strlen(mb_substr(mb_strrchr($input, "."), 1)) < 3)) {
            throw new exception("Invalid number!");
        }
    }

    //Method for adding the product to MySQL database.
    protected function newListing($type)
    {
        //Check if SKU already exists and insert values or output error - if exists.
        $sql = "SELECT sku FROM product WHERE sku = ?";
        $mysqli = $this->connect();
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("s", $this->sku);
        $statement->execute();
        $statement->bind_result($result);
        $statement->fetch();
        
        if ($result != $this->sku) {
            $statement->close();
            $sql = "INSERT INTO product (sku,name,price,type,attribute) VALUES (?,?,?,?,?)";
            $statement = $mysqli->prepare($sql);
            $statement->bind_param("ssdis", $this->sku, $this->name, $this->price, $type, $this->attribute);
            if (!$statement->execute()) {
                $statement->close();
                $mysqli->close();
                throw new exception("Failed to save the product!");
            }
        } else {
            $statement->close();
            $mysqli->close();
            throw new exception("SKU allready exists!");
        }
        $statement->close();
        $mysqli->close();
    }
}
