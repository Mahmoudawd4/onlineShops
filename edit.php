<?php 
    include 'inc/header.php';
    require_once 'Classes/Products.php';
    //session_start();
    if (!isset($_SESSION['id'])) {
  
      header('location:login.php');
    }  
    
    $id=$_GET['id'];
    $pro=new Products();
    $product=$pro->getOne($id);

?>

<div class="container my-5">


<?php if(isset($_SESSION['errors'])) {?>
                                      <div class=' alert alert-danger'>
                                          <?php foreach ($_SESSION['errors'] as $erorr) {?>
                                            <p class='mb-1 text-center'><?php echo $erorr; ?></p>
                                          <?php }?>
                                      </div>

                                    <?php  } ?>


              <?php unset($_SESSION['errors']) ;?>



    <div class="row">
<form class="w-50 m-auto" action="handlers/handelEdit.php?id=<?php echo $product['id'] ?>" method="POST" >
  <div class="form-group ">
   
    <input type="text" class="form-control" name='name' placeholder="Enter Name" value="<?php echo $product['name'];?>">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='price'  placeholder="price" value="<?php echo $product['price'];?>" >
  </div>
  <div class="form-group">
    <textarea class="form-control"  name='desc' placeholder="description" rows="6"><?php echo $product['desc'];?></textarea>
  </div>



  <input type="submit" class="btn btn-primary" name="submit" value="Edit">
</form>
        

    </div>
</div>



<?php include 'inc/footer.php' ?>

