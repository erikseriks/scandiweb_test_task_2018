<?php
//Set encoding to utf8.
include("encoding.php");
//Class for connecting to MySQL database.
require_once("dbConnect.php");

//Class for deleting selected products from database.
class massDelete extends dbConnect
{
    public function delete($input)
    {
        //Check if any products where selected.
        if (!empty($input)) {
            $mysqli = $this->connect();
            //Iterate through each selected "sku" to be deleted.
            $skus = array();
            foreach ((array) $input as $value) {

                //Sanitize POST values and populate array.
                $mysqli->real_escape_string($value);
                $skus[] = $value;
            }

            //Number of rows to be deleted.
            $limit = count($skus);

            //Prepare a string for SQL.
            $skus = implode("','", $skus);

            $sql = "DELETE FROM product WHERE sku IN ('".$skus."') LIMIT $limit";
            //Execute query.
            if (!$mysqli->query($sql)) {
                return false;
            } else {
                return true;
            }
            $mysqli->close();
        } else {
            echo "Please select atleast one product!";
            die();
        }
    }
}
