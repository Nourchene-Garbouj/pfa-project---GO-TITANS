<?php
include "interfaces.php";
class tarifs_read_m implements tarifs_read_m_interface{
    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
  //create a function to list the tarifs table
    public function lister_tarifsr_m(){
        $connection=$this->database_connect();
        $result=$connection->query("SELECT * FROM tarifs");
        return $result;}
}
?>