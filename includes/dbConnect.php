<?php
//Set encoding to utf8.
include("/opt/lampp/htdocs/product/includes/encoding.php");
//Class for MySQL database connection.
class dbConnect
{
    private $server;
    private $databaseName;
    private $userName;
    private $password;

    //Method for database connection.
    protected function connect()
    {
        $this->server = "localhost";
        $this->userName = "root";
        $this->password = "1234";
        $this->databaseName = "Products";

        $connection = new mysqli($this->server, $this->userName, $this->password, $this->databaseName);
        //Set character set to utf8mb4.
        $connection->set_charset("utf8mb4");
        //Check connection.
        if (mysqli_connect_errno()) {
            //printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            return $connection;
        }
    }
}
