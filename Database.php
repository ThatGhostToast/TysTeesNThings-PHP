<?php
/*
 * Zac Almas
 * Ty's Tees N Things
 * 2/21/21
 */

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $database_name = "tystees";
 
    //This function connects the website to the database
    function dbConnect()
    {   
        $connect = new \mysqli($this->host, $this->username, $this->password, $this->database_name);
        
        if ($connect->connect_error)
        {
            echo "Connection failed " . $connect->connect_error . "<br>";
        }
        else
        {
            return $connect;
        }
    }
    
}

