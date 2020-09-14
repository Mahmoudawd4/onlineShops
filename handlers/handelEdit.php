<?php

session_start();
require_once '../Classes/Products.php';
require_once '../Classes/validation/validator.php';
if (!isset($_SESSION['id'])) {
  
    header('location:../login.php');
    die();
  } 


use validation\Validator;

//if form is submeted 
if (isset($_POST['submit'])) {
    
    $id=$_GET['id'];
    //read data from form 
    $name=$_POST['name'];
    $price=$_POST['price'];
    $desc=$_POST['desc'];



    //validition
    $v=new Validator;
    $v->rules('name' ,$name ,['required' ,'string' , 'Max:100']);
    $v->rules('price' ,$price ,['required' ,'numaric' ]);
    $v->rules('desc' ,$desc ,['required' ,'string' ]);
    $erorrs=$v->errors;






    //if is data falid
    if ($erorrs == []) {
        $data = [
            'name' => $name ,
            'price' => $price ,
            'desc' => $desc ,
        ];
        
        //store
        $prod=new Products();
        $result=$prod->updata($id,$data);

            // if stored sucssesfuly
            if($result == true)
            { 

                header('location:../show.php?id='.$id);

            }else
            {

                $_SESSION['errors'] =['Error updating in Database'] ;
                header('location:../edit.php?id='.$id);
        
            }

    }else
    {
        $_SESSION['errors'] =$erorrs ;
        header('location:../edit.php?id='.$id);
    }

    






}else{
    header('location:../index.php');
}

?>