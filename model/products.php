<?php 

class Products{

    private $connection;
    public $table_name = "products";

    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;
    public $timestamp;

    public function __construct($connection){
        $this->connection = $connection;

    }

    public function create(){

       $this->timestamp = date('Y-m-d H:i:s');

        $query="INSERT INTO"." ".$this->table_name." "."(name,description,price,category_id,created) "."VALUES('$this->name','$this->description','$this->price','$this->category_id','$this->timestamp')";

        $statment =$this->connection->prepare($query);
        return $statment->execute();
    }


    public function read_product()
    {
        $query="SELECT id,name,description,price,category_id FROM ".$this->table_name;
        $statement =$this->connection->prepare($query);
        $statement->execute();
        $products = $statement->fetchall(PDO::FETCH_ASSOC);
        return $products;


    }

    public function delete($id)
    {
        $query="DELETE FROM ".$this->table_name." WHERE id ='$id'";
        $statement=$this->connection->prepare($query);
        return $statement->execute();
    }



    function update($id, $name, $price, $description, $category_id)
    {

        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = '$name',
                price = '$price',
                description = '$description',
                category_id  = '$category_id'
            WHERE
                id = '$id'";
    }

}

?>