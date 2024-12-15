<?php
require_once "../../Model/admin/users.php";
include "interfaces_a.php";
class users_c implements users_interface{
  protected $instance;
  public function __construct() {
      $this->instance = new users_m();}
      //create a function to list the users table
function lister_users_c(){
$result=$this->instance->lister_users_m();
return $result;}
//create a function to add a new users
function ajouter_users_c(){
    if(isset($_POST["ajouter-utilisateur"])){
        $nom= $_POST["nom"];
        $email= $_POST["email"];
        $password=$_POST["password"];
        $type=$_POST["type"];
    }
    if ($nom == "" || $email== "" || $password== "" || $type== ""){
       header("location:../../View/admin/profile.php?message_alert_table=Tous les champs sont obligatoires.");
    }else{
  $exist=$this->instance->check_users_m($email);
        if($exist>0){
            header("location:../../View/admin/profile.php?message_alert_table=L'adresse e-mail existe déjà.");
        }else{
        if($type=="client"){
          $this->instance->add_client($nom,$email,$password,$type);
            header("location:../../View/admin/profile.php?message_success_table=Il est enregistré en tant que client.");
      }elseif($type=="trainer"){
        $this->instance->add_trainer($nom,$email,$password,$type);
        header("location:../../View/admin/profile.php?message_success_table=Il est enregistré en tant que trainer.");  
      }else{
        $this->instance->add_admin($nom,$email,$password,$type);
        header("location:../../View/admin/profile.php?message_success_table=Il est enregistré en tant qu'administrateur.");
      }}}}
       //create a function to delete a user
      public function delete_users_c(){
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $this->instance->delete_users_m($id);
       header("location:../../View/admin/profile.php?message_success_table=L'utilisateur a été supprimé avec succès.");
      }}
        //create a function to complete the update users page
    public function complete_update_c(){

        if(isset($_GET["id"])) {
            $id= $_GET["id"];
        $row=$this->instance->complete_update_m($id);
        }
        return $row;}
        //create a function to update a user
    public function update_users_c(){
      if(isset($_GET["id_new"])) {
        $id_new= $_GET["id_new"];
      }
    if(isset($_POST["update-tarif"])){
        $nom= $_POST["nom"];
        $email= $_POST["email"];
        $password=password_hash($_POST["password"],PASSWORD_DEFAULT);}
        $exist=$this->instance->check_users2_m($email);
        if($exist===1 || $exist==$email){
          $this->instance->update_users_m($id_new,$nom,$email,$password,$exist);
           header("location:../../View/admin/profile.php?message_success_table=La mise à jour du L'utilisateur a été effectuée avec succès.");
      }else{
         header("location:../../View/admin/profile.php?message_alert_table=L'adresse e-mail existe déjà."); 
      }
  }
  }
?>