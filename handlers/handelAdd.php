<?php

session_start();
require_once '../Classes/Products.php';
require_once '../Classes/helpers/Images.php';
require_once '../Classes/validation/validator.php';

if (!isset($_SESSION['id'])) {
  
    header('location:../login.php');
    die();
  }  


use helpers\Image;
use validation\Validator;


//if form is submeted 
if (isset($_POST['submit'])) {
    
    //read data from form 
    $name=$_POST['name'];
    $price=$_POST['price'];
    $desc=$_POST['desc'];
    $category_id=$_POST['category_id'];
    $img=$_FILES['img'];


    //validition
    $v=new Validator;
    $v->rules('name' ,$name ,['required' ,'string' , 'Max:100']);
    $v->rules('price' ,$price ,['required' ,'numaric' ]);
    $v->rules('desc' ,$desc ,['required' ,'string' ]);
    $v->rules('category_id' ,$category_id ,['required' ,'numaric' ]);
    $v->rules('img' ,$img ,['required-image' ,'image' ]);



  


    $erorrs=$v->errors;

    //if is data falid
    if ($erorrs == []) {

        $image =new Image($img);

        $data = [
            'name' => $name ,
            'price' => $price ,
            'desc' => $desc ,
            'img' => $image->new_name,
            'category_id'=>$category_id
        ];
        
        //store
        $prod=new Products();
        $result=$prod->store($data);

            // if stored sucssesfuly
            if($result == true)
            {
                //uplode image
                $image->uplodeImg();

                header('location:../index.php');

            }else
            {

                $_SESSION['errors'] =['Error storing in Database'] ;
                header('location:../add.php');
        
            }

    }else
    {
        $_SESSION['errors'] =$erorrs ;
        header('location:../add.php');

    }

    






}else{
    header('location:../add.php');
}

?>