<?php include "layout/header.php"?>



<?php

include 'config/db.php';
include 'model/categories.php';
include 'model/products.php';

?>


<?php
$db = new Database();
$connection = $db->getconnection();

$product = new Products($connection);

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $product->delete($id);
}

?>

    <div class="container">

        <table class='table table-hover mt-4'>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>

                <th>Actions</th>
            </tr>
            <?php
            $products = $product->read_product();
            foreach($products as $product) {
                ?>
                <tr>
                    <td><?php echo $product['id'];?> </td>
                    <td><?php echo $product['name'];?></td>
                    <td> <?php echo $product['description'];?></td>
                    <td> <?php echo $product['price'];?></td>
                    <td> <?php echo $product['category_id'];?></td>

                    <td>
                        <a class='btn btn-success' href='edit.php?id= <?php echo $product['id']; ?>' role='button'>Edit</a>
                        <a role='button' onclick="return confirm('Are You Sure')" class='btn btn-danger' href='index.php?id= <?php echo $product['id']; ?>'>Delete</a>

                    </td>
                </tr>
                <?php
            }

            ?>
        </table>

    </div>

<?php include "layout/footer.php"?>