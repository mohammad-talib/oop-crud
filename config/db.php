<?php 


    class Database{

    private $servername = "localhost";
    private $username = "root";
    private $password = "Mohammed.123.";
    private $database = "my_app";
      public $conn;

    public function getconnection(){
     $this->conn = null;
    try{
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
       // echo "connected";
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
     return $conn;
    }


    }

?>