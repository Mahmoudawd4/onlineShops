<?php
require_once 'MySql.php';

class Products extends MySql {

    //get all

    public function getAll()
    {
        $qury='SELECT * FROM products';
        
       $result=$this->connect()->query($qury);
        $Products=[];
       if($result->num_rows >0)
       {
           while ($row =$result->fetch_assoc()) {
              
            array_push($Products,$row);

           }
       }

       return $Products;
        

    }   



    //get one

    public function getOne($id)
    {
        $qury="SELECT *
        FROM products
        WHERE id = '$id'";
        $Product=null;
        $result = $this->connect()->query($qury);

        if ($result->num_rows == 1)
        {
            # code...
            $Product=$result->fetch_assoc();
        }
        return $Product;

    }



    //creat new 

    public function store(array $data)
    {
        $data['name']=mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc']=mysqli_real_escape_string($this->connect(), $data['desc']);

        $qury="INSERT INTO products (`name`, `desc`,img,price,category_id, created_at) 
        VALUES ('{$data['name']}','{$data['desc']}','{$data['img']}','{$data['price']}','{$data['category_id']}',CURRENT_TIME())";

        $result=$this->connect()->query($qury);

        if($result == true)
        {
            return true ;
            
        }

            return false ;
            

    }



    //edit
    public function updata($id ,array $data)
    { 
        
        $data['name']=mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc']=mysqli_real_escape_string($this->connect(), $data['desc']);
        
        $qury="UPDATE products
         SET 
         `name`= '{$data['name']}',
         `desc`='{$data['desc']}',
         `price`='{$data['price']}'
        WHERE id ='$id'
        ";

     $result=$this->connect()->query($qury);
     if($result == true)
     {
         return true ;
     }

     return false ;



    }

    public function delete($id )
    {
        $qury="DELETE FROM products
        WHERE  id='$id'";

    $result=$this->connect()->query($qury);
     if($result == true)
     {
         return true ;
     }

     return false ;

    }





}



?>