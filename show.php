<?php 
    include 'inc/header.php';
    require_once 'Classes/Products.php';
    require_once 'Classes/Category.php';

    //session_start();

?>
<?php
    $id=$_GET['id'];
    $pro=new Products();
    $product=$pro->getOne($id);

    $_SESSION['prodId']=$id;
    $_SESSION['cart']=[];
    if (isset($_POST['cart'])) {
        array_push($_SESSION['cart'],$_SESSION['prodId']);
    }


    $CAt=new Category();
    $category=$CAt->getOne($product['category_id']);

?>

<div class="container my-5">
    <div class="row">

<?php if ($product !== null) { ?>
    <div class="col-lg-6">
        <img class="img-fluid" src="images/<?php echo $product['img']?>" >
    </div>
    <div class="col-lg-6">
       <h5>Product Name :<?php echo $product['name']?></h5>
        <p class="text-muted">Product price :<?php echo $product['price']?>$</p>
        <p class="card-text">description : <?php echo $product['desc'] ?></p>
        <p class="text-muted">Category : <?php echo $category['type'] ?></p>




        <form action="show.php?id=<?php echo $product['id']?>" method="post">

            <input type="submit" name="cart" value="Add to Cart" class=" btn btn-info">
            <a href="index.php" class="btn btn-danger">Back</a>

            <?php if (isset($_POST['cart'])) { ?>
            <a href="buyProducts.php" class="btn btn-success">By Products</a>

            <?php } ?>
        </form>

        <?php if (isset($_SESSION['id'])){ ?>
        <a href="edit.php?id=<?php echo $product['id']?>" class="btn btn-danger">Edit</a>
        <a href="handlers/handelDelet.php?id=<?php echo $product['id']?>" class="btn btn-info">Delete</a>
        <?php } ?>
    </div>
<?php } else { ?>
    <p>No Products Found</p>
<?php }?>

    </div>
</div>
</div>



<?php include 'inc/footer.php' ?>

