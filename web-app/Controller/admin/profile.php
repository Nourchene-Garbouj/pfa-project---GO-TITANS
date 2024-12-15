<?php
require_once "../../Model/admin/profile.php";
include "interfaces_a.php";
class profile_c implements Profile_c_Interface {
  protected $instance;
  public function __construct() {
      $this->instance = new profile_m();}
      //create a function to update the profile
      public function update_profile_c(){
        if(isset($_GET["id_new"])) {
          $id_new= $_GET["id_new"];
      }
      if(isset($_POST["update-info"])){
        session_start();
          $nom= $_POST["nom"];
            $email= $_POST["email"];
          $password=$_POST["password"];
          if($this->instance->check_users_m($email)==false && strlen($email)>12){
            $this->instance->update_profile_m($id_new,$nom,$email,$password);
            header('location:../../View/admin/profile.php?message_success=Félicitations ! Votre profil a été mis à jour avec succès');
          }else{
            header('location:../../View/admin/profile.php?message_error=Email déjà utilisé ou invalide. Veuillez en essayer un autre.');
          }}}
    
  }
?>