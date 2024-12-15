<?php
include "interfaces.php";
class profile_m implements profile_m_interface{
public function database_connect(){
    $connection=mysqli_connect("localhost","admin","admin","pfa");
    return $connection;}
//checking if the user exist
public function check_users_m($email){
  session_start();
  if($_SESSION['email']==$email){
    return false;
  }else{
     $connection=$this->database_connect();
    $result=$connection->query("SELECT * FROM `users` WHERE email='$email';");
      return mysqli_num_rows($result);
  }}
 //create a function to update the profile
 public function update_profile_m($id_new,$nom,$email,$password){
  session_start();
  $_SESSION['email']=$email;
  $_SESSION['nom']=$nom;
  $connection=$this->database_connect();
  if($password=='' || empty($password)){
    $resultat=$connection->query("UPDATE `users` SET `name`='$nom',`email`='$email' WHERE `user_id`='$id_new'");
  }else{
    $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
    $resultat=$connection->query("UPDATE `users` SET `name`='$nom',`email`='$email',`password`='$password' WHERE `user_id`='$id_new'");
  }
  return $resultat;}
}
?> 