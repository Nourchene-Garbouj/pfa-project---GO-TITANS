<?php
include "interfaces.php";
class tarifs_m implements tarifs_m_interface {

    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;
    }
     //create a function to list the tarifs table
    public function lister_tarifs_m(){
        $connection=$this->database_connect();
        $result=$connection->query("SELECT * FROM tarifs");
        return $result;
    }
     //create a function to add a new tarifs
    public function ajouter_tarifs_m($period,$tarif){
        $connection=$this->database_connect();
        session_start();
        $admin_id=$_SESSION['admin_id'];
        $result=$connection->query("INSERT INTO `tarifs` (`period`,`Tarifs par personne`,`admin_id`) VALUES('$period','$tarif',$admin_id);");
        return $result;
    }
      //create a function to delete a tarif
    public function delete_tarifs_m($id){
        $connection=$this->database_connect();
        $result=$connection->query("DELETE FROM tarifs where Id='$id'");
        return $result;
    }
      //create a function to complete the update tarifs page
    public function complete_update_m($id){
        $connection=$this->database_connect();
        $result = $connection->query("SELECT * FROM tarifs where Id='$id'");
        $row=mysqli_fetch_assoc($result); 
        return $row;  
    }
     //create a function to update a tarif
    public function update_tarifs_m($id_new,$period,$tarif){
        $connection=$this->database_connect();
        $resultat=$connection->query("UPDATE `tarifs` SET `period`='$period',`Tarifs par personne`='$tarif' WHERE `Id`='$id_new'");
        return $resultat;
    }
}

?>
