<?php
namespace factory;

//Set encoding to utf8.
include("encoding.php");
//product child classes are stored in "includes/products" directory.

//Class used for instantiating the right product type.
final class productFactory
{   
    public function __construct($action, $type)
    {
        $newProduct = $this->createProduct($type);

        if ($action == "save") {
            $newProduct->save();
        }
        
        return $newProduct;
    }

    private function createProduct($type)
    {
        switch ($type) {
            case "dvd":
                require_once __DIR__."/products/dvd.php";
                $newProduct = new \dvd;
            break;
            case "book":
                require_once __DIR__."/products/book.php";
                $newProduct = new \book;
            break;
            case "furniture":
                require_once __DIR__."/products/furniture.php";
                $newProduct = new \furniture;
            break;
            default: echo "Invalid type!";
                die();
        }
        return $newProduct;
    }
}
