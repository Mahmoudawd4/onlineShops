<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oline shops</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Online shopes</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <div class="navbar-nav mr-auto mt-2 mt-lg-0">
                <a class="nav-item nav-link" href="index.php">All Products</a>

            <?php if(isset($_SESSION['id'])){ ?>
 
                <a class=" nav-item nav-link" href="add.php">Add New </a>

                <a class=" nav-item nav-link" href="addCategory.php">Add category </a>

            <?php } ?>

        </div>
        <?php if (isset($_SESSION['id'])){ ?>

            <div class="navbar-nav ml-auto ">
            <a class="nav-item nav-link disabled" href="#"><?php echo $_SESSION['username']; ?></a>
            <a class="nav-item nav-link" href="handlers/handelLogout.php">logout </a>
        </div>

        <?php } ?>

    </div>
</nav>