<?php 
    include 'inc/header.php';
//    session_start();

if (!isset($_SESSION['id'])) {
  
  header('location:login.php');
}  


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





<form class="w-50 m-auto" action="handlers/handelAdd.php" method="POST" enctype="multipart/form-data">
  <div class="form-group ">
   
    <input type="text" class="form-control" name='name' placeholder="Enter Name">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='price'  placeholder="price">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name='category_id'  placeholder="category_id">
  </div>
  <div class="form-group">
    <textarea class="form-control"  name='desc' placeholder="description" rows="6"></textarea>
  </div>

  <div class="form-group">

    <input type="file" class="form-control-file" name="img">
  </div>


  <input type="submit" class="btn btn-primary" name="submit" value="submit">
</form>
        

    </div>
</div>



<?php include 'inc/footer.php' ?>

