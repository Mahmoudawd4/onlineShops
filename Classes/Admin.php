<?php

require_once 'MySql.php';



class Admin extends MySql {
    public function attempt($email, $hashpassword)
    {
        $qury="SELECT * from admin 
        WHERE email ='$email' and `password` = '$hashpassword'" ;

        $result=$this->connect()->query($qury);
        $user=null;

        if($result->num_rows == 1 )
        {
            $user =$result->fetch_assoc();
        }

        return $user;
    }
}






?>