<?php

class dbConnection
{
    private $serverName= "localhost";
    private $dbUsername= "root";
    private $dbPassword= "";
    private $dbName = "testdb";
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->serverName,$this->dbUsername,$this->dbPassword, $this->dbName);
        
        if ($this->mysqli -> connect_errno) 
        {
            echo "Failed to connect to MySQL: " . $this->mysqli -> connect_error;
            exit();
        }
    }

    public function querySelect($login,$pass)
    { 
        $query = "SELECT userPassword FROM users WHERE userLogin=?";

        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("s",$login);
        $stmt->execute();

        $result = $stmt->get_result();
      
        if($result->num_rows == 0)
        {
            ?><script>alert("The \"Login\" is incorect becouse \n                 U SUCK ");</script><?php 
        }
        else
        {
            $correctPassword = $result->fetch_assoc()["userPassword"];
        
            if($pass === $correctPassword)
            {
            ?> <script>console.log("logged in witch correct password")</script><?php
            }
            else if ($correctPassword != null)
            {
                ?> <script>alert("u suck you dont even know your own Password");</script><?php
            }
        }
        
         
        $result -> free_result();
        $this->mysqli -> close();
    }


}
