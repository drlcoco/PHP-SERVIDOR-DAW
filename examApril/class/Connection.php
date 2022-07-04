<?php
class Connection
{
    public function getConnection()
    {
        $host = "localhost";  /* You can change the value of $host if you need it */
        $db = "dbexam";
        $user = "root";   /* You can change the value of $user if you need it */
        $pass = "";   /* You can change the value of $pass if you need it */

        $connection = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

        return $connection;
    }
}
