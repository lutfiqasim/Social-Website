<?php
class Database
{
    private $host = "localhost:3307";
    private $username = "root";
    private $password = "";
    private $dbname = "mysocials_db";

    function connect()
    {
        $con = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        return $con;
    }

    function read($query)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        if (!$result) {
            return false;
        } else {
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row; #appends to end of array
            }
            return $data;
        }

    }



    function save($query)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);
        if (!$result) {
            return false;
        }
        return true;
    }
}