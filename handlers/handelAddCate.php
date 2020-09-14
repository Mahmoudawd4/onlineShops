<?php

session_start();
require_once '../Classes/Category.php';
require_once '../Classes/validation/validator.php';

if (!isset($_SESSION['id'])) {
  
    header('location:../login.php');
    die();
  }  


use validation\Validator;


//if form is submeted 
if (isset($_POST['submit'])) {
    
    //read data from form 
    $type=$_POST['type'];


    //validition
    $v=new Validator;
    $v->rules('type' ,$type ,['required' ,'string' , 'Max:100']);
    $erorrs=$v->errors;

    //if is data falid
    if ($erorrs == []) {

        $data = [
            'type' => $type
        ];
        
        //store
        $CAt=new Category();
        $result=$CAt->store($data);

            // if stored sucssesfuly
            if($result == true)
            {

                header('location:../index.php');

            }else
            {

                $_SESSION['errors'] =['Error storing in Database'] ;
                header('location:../addCategory.php');
        
            }

    }else
    {
        $_SESSION['errors'] =$erorrs ;
        header('location:../addCategory.php');

    }

    






}else{
    header('location:../add.php');
}

?>