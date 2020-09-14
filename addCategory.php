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





<form class="w-50 m-auto" action="handlers/handelAddCate.php" method="POST">
  <div class="form-group">
  <label for="">Add Category</label>
    <input type="text" class="form-control" name='type'  placeholder="Add Category">
  </div>



  <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
</form>
        

    </div>
</div>



<?php include 'inc/footer.php' ?>

