<?php
require_once 'MySql.php';

class Category extends MySql {

    //get all

    public function getAll()
    {
        $qury='SELECT * FROM categories';
        
       $result=$this->connect()->query($qury);
        $categories=[];
       if($result->num_rows >0)
       {
           while ($row =$result->fetch_assoc()) {
              
            array_push($categories,$row);

           }
       }

       return $categories;
        

    }   



    //get one

    public function getOne($id)
    {
        $qury="SELECT *
        FROM categories
        WHERE category_id = '$id'";
        $categories=null;
        $result = $this->connect()->query($qury);

        if ($result->num_rows == 1)
        {
            # code...
            $categories=$result->fetch_assoc();
        }
        return $categories;

    }



    //creat new 

    public function store(array $data)
    {
        

        $qury="INSERT INTO categories (`type`) 
        VALUES ('{$data['type']}')";

        $result=$this->connect()->query($qury);

        if($result == true)
        {
            return true ;
            
        }

            return false ;
            

    }









}



?>