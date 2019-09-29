<?php
    class Category{

        private $connection;
        private $table_name = "categories";
        public $id;
        public $name;
        
        public function __construct($connection){

            $this->connection = $connection;
            
        }

        public function read(){
            $sql = "SELECT id, name FROM ".$this->table_name." ORDER BY name";

            $statement = $this->connection->prepare($sql);
            $statement->execute();

            return $statement->fetchall(PDO::FETCH_ASSOC);
            // var_dump($categories);

            
        }
        
 
    }

?>