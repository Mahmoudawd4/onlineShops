<?php


class MySql{

    public $servername,$db_username ,$db_password,$db_name;

    public function connect(){

        $this->servername='localhost';
        $this->db_username='root';
        $this->db_password='';
        $this->db_name='online_shops';

        return new mysqli( $this->servername , $this->db_username ,$this->db_password,  $this->db_name);

    }

}

?>