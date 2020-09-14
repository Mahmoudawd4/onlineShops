<?php 
    include 'inc/header.php';
    //session_start();

    if (isset($_SESSION['id'])) {
  
        header('location:index.php');
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





<form class="w-50 m-auto" action="handlers/handelLogin.php" method="POST" >
  <div class="form-group ">
   
    <input type="email" class="form-control" name='email' placeholder="Enter email">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name='password'  placeholder="Enter password">
  </div>


  <input type="submit" class="btn btn-primary" name="submit" value="submit">
</form>
        

    </div>
</div>



<?php include 'inc/footer.php' ?>

