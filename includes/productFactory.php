<?php
//Set encoding to utf8.
include("encoding.php");
//product child classes are stored in "includes/products" directory.

//Class used for instantiating the right product type.
final class productFactory
{
    public static function createProduct($type)
    {
        switch ((string)$type) {
            case "dvd":
                require_once __DIR__."/products/dvd.php";
                return $newProduct = new dvd;
            break;
            case "book":
                require_once __DIR__."/products/book.php";
                return $newProduct = new book;
            break;
            case "furniture":
                require_once __DIR__."/products/furniture.php";
                return $newProduct = new furniture;
            break;
            default: echo "Invalid type!";
                die();
        }
    }
}
