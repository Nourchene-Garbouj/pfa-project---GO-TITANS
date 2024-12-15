<?php
include "interfaces.php";
class users_m implements users_m_interface {
public function database_connect(){
    $connection=mysqli_connect("localhost","admin","admin","pfa");
    return $connection;}
public function lister_users_m(){
    $connection=$this->database_connect();
    $result=$connection->query("SELECT * FROM users");
    return $result;}
//checking if the user exist
public function check_users_m($email){
    $connection=$this->database_connect();
    $result=$connection->query("SELECT * FROM `users` WHERE email='$email';");
      return mysqli_num_rows($result);}
      
      //second function to check deplicate email for update_users_c function
      public function check_users2_m($email){
        $connection=$this->database_connect();
        $result=$connection->query("SELECT * FROM `users` WHERE email='$email';");
          if(!mysqli_fetch_assoc($result)){
         return 1;
          }else{
            $row=mysqli_fetch_assoc($result);
            return $row['email'];
          }}
      //create a 3 function to add a new users (trainer or client or admin)
public function add_client($nom,$email,$password,$type){
    $connection=$this->database_connect();
    $passwordh=password_hash($password,PASSWORD_DEFAULT);
    $result=$connection->query("INSERT INTO `users` (`name`,`email`,`password`,`typee`) VALUES('$nom','$email','$passwordh','$type');");
    $user_id=$connection->insert_id;
    $result=$connection->query("INSERT INTO `clients` (`user_id`) VALUES ('$user_id')");}
public function add_trainer($nom,$email,$password,$type){
    $connection=$this->database_connect();
    $passwordh=password_hash($password,PASSWORD_DEFAULT);
    $result=$connection->query("INSERT INTO `users` (`name`,`email`,`password`,`typee`) VALUES('$nom','$email','$passwordh','$type');");
    $user_id=$connection->insert_id;
    $result=$connection->query("INSERT INTO `trainers` (`user_id`) VALUES ('$user_id')");}
public function add_admin($nom,$email,$password,$type){
  $connection=$this->database_connect();
  $result=$connection->query("INSERT INTO `users` (`name`,`email`,`password`,`typee`) VALUES('$nom','$email','$password','$type');");
  $user_id=$connection->insert_id;
  $result=$connection->query("INSERT INTO `admin` (`user_id`) VALUES ('$user_id')");}
//create a function to delete a user
public function delete_users_m($id){
  $connection=$this->database_connect();
  $result = $connection->query("DELETE FROM users where user_id='$id'");
  return $result;}
  //create a function to complete the update users page
public function complete_update_m($id){
  $connection=$this->database_connect();
  $result = $connection->query("SELECT * FROM users where user_id='$id'");
  $row=mysqli_fetch_assoc($result); 
  return $row;}
  //create a function to update a user
public function update_users_m($id_new,$nom,$email,$password,$exist){
  $connection=$this->database_connect();
  if($exist==1){
  $resultat=$connection->query("UPDATE `users` SET `name`='$nom',`email`='$email',`password`='$password' WHERE `user_id`='$id_new'");
  }else{
    $resultat=$connection->query("UPDATE `users` SET `name`='$nom',`password`='$password' WHERE `user_id`='$id_new'");
  }
  return $resultat;}
}
?>