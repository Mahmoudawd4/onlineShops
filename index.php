<?php 
    include 'inc/header.php';
    require_once 'Classes/Products.php';
    require_once 'Classes/helpers/Str.php' ;
    //session_start();



    use helpers\Str;
?>
<?php
    $pro=new Products();
    $products=$pro->getAll();


?>

<div class="container my-5">
    <div class="row">
<?php if ($products !== []) { ?>
<?php foreach ($products as $product) {?>
        <div class="col-lg-4 mb-4">

                <div class="card ">
                    <img class="card-img-top caption-img vh-50"  height='300px'  src="images/<?php echo $product['img']?>" alt="Card image cap">
                    <div class="card-body">
                         <h5 class="card-title"><?php echo $product['name']?></h5>
                         <p class="text-muted">$<?php echo $product['price']?></p>

                            <p class="card-text"><?php echo Str::limit( $product['desc'] )?></p>
                            <a href="show.php?id=<?php echo $product['id']?>" class="btn btn-primary">Show</a>


                            <?php if (isset($_SESSION['id'])){ ?>
                            <a href="edit.php?id=<?php echo $product['id']?>" class="btn btn-danger">Edit</a>
                            <a href="handlers/handelDelet.php?id=<?php echo $product['id']?>" class="btn btn-info">Delete</a>
                            <?php } ?>
                    </div>
                </div>
        </div>

<?php } ?>

<?php }else{ ?>
    <p>No Products Found</p>
<?php } ?>
    </div>
</div>
<?php include 'inc/footer.php' ?>

