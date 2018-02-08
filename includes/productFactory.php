<?php
namespace factory;

//Set encoding to utf8.
include("encoding.php");
//product child classes are stored in "includes/products" directory.

//Class used for instantiating the right product type.
final class productFactory
{
    public static function newProduct($type)
    {
        $file = __DIR__."/products/".$type.".php";
        $productClassName = "\\".$type;

        //Look for product class.
        if (file_exists($file)) {
            include_once($file);
            if (class_exists($productClassName)) {
                $product = new $productClassName;
                //Save the new product.
                $product->save();
            }
        } else {
            echo "Invalid type!";
        }
    }
}
