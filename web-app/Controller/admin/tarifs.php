<?php
include "../../Model/admin/tarifs.php";
include "interfaces_a.php";
class tarifs_c implements tarifs_interface{
    protected $instance;
    public function __construct() {
        $this->instance = new tarifs_m();}
     //create a function to list the tarifs table
public function lister_tarifs_c(){
$result=$this->instance->lister_tarifs_m();
return $result;}
//create a function to add a new tarifs
public function ajouter_tarifs_c(){
    if(isset($_POST["ajouter-tarif"])){
        $period=$_POST["period"];
        $tarif=$_POST["tarif"];
    }
    if ($period == ""|| $tarif== ""){
       header("location:../../View/admin/tarifs.php?message_alert=Tous les champs sont obligatoires.");
    }else{
        $this->instance->ajouter_tarifs_m($period,$tarif);
        header("location:../../View/admin/tarifs.php?message_success=Le tarif a été ajouté avec succès.");
    }}
      //create a function to delete a tarif
public function delete_tarifs_c(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $this->instance->delete_tarifs_m($id);
        header("location:../../View/admin/tarifs.php?message_success=Le tarif a été supprimé avec succès.");
    }}
     //create a function to complete the update tarifs page
public function complete_update_c(){
    if(isset($_GET["id"])) {
        $id= $_GET["id"];
    $row=$this->instance->complete_update_m($id);
    }
    return $row;}
      //create a function to update a tarif
public function update_tarifs_c(){
    if(isset($_GET["id_new"])) {
        $id_new= $_GET["id_new"]; }
    if(isset($_POST["update-tarif"])){
        $period= $_POST["period"];
        $tarif= $_POST["tarif"];
        if ($period == ""|| $tarif== ""){
            header("location:../../View/admin/tarifs.php?message_alert=Tous les champs sont obligatoires.");
         }else{
        $this->instance->update_tarifs_m($id_new,$period,$tarif);
             header('location:../../View/admin/tarifs.php?message_success=La mise à jour du tarif a été effectuée avec succès.');
         }
      
       
    }}
}
?>
