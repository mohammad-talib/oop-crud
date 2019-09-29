
<?php
include 'config/db.php';
include 'model/categories.php';
include 'model/products.php';


$db = new Database();
$connection = $db->getconnection();

$read_category= new Category($connection);


?>





<div class="container">
<form method="post">
  <div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Prudact">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" class="form-control" id="price" placeholder="price">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>



  <?php
  echo "<select class='form-control' name='category_id' >";
    $categories = $read_category->read();

    foreach($categories as $category){
    echo "<option value='$category[id]'>$category[name]</option>";
    }
    echo "</select>";
  ?>


<br/><br/><br/>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>

</div>

<?php
if(isset($_POST["submit"]))
{
    $product=new Products($connection);
    $product->name=$_POST["name"];
    $product->price=$_POST["price"];
    $product->description=$_POST["description"];
    $product->category_id=$_POST["category_id"];


    if($product->create())
    {
        echo"<div class='alert alert-success container'>product successfully created</div>";
    }
    else
    {
        echo"<div class='alert alert-danger container'>unable to create product</div>";
    }
//    var_dump($product);
}
?>

</form>
</div>

