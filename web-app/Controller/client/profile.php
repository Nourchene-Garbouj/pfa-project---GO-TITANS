<?php
require_once "../../Model/client/profile.php";
include "interfaces.php";
class profile_c implements profile_c_interface {
  protected $instance;
  public function __construct() {
      $this->instance = new profile_m();
  }
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
        header('location:../../View/client/profile.php?message_success=Félicitations ! Votre profil a été mis à jour avec succès');
      }else{
        header('location:../../View/client/profile.php?message_error=Email déjà utilisé ou invalide. Veuillez en essayer un autre.');
      }}}
  }

?>