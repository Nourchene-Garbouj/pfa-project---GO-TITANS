<?php
include "interfaces.php";
class login_m implements login_m_interface{
    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
         //create 3 login function for each type of user
    public function login_m_client($email,$password){
        $connection=$this->database_connect();
            $result=$connection->query("SELECT * FROM `users` WHERE email='$email' AND typee='client';");
            $verifie=mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($verifie){
              if(password_verify($password,$verifie["password"]) || $password==$verifie["password"]){
                  $id=$verifie["user_id"];
                    $resulte = $connection->query("SELECT client_id FROM clients WHERE user_id=$id");
                    $row = mysqli_fetch_assoc($resulte);
                    $id_cl=$row['client_id'];
                    $resulttwo = $connection->query("SELECT name FROM users WHERE email='$email';");
                    $roww = mysqli_fetch_assoc($resulttwo);
                    $nom= $roww['name'];
                   session_start();
                   $_SESSION['userlogedin']="client";
                   $_SESSION['user_id'] = $id;
                   $_SESSION['client_id'] = $id_cl;
                   $_SESSION['email'] = $email;
                   $_SESSION['nom'] = $nom;
                  return true;
                }else{
                    return false;
                }}}
    public function login_m_trainer($email,$password){
        $connection=$this->database_connect();
            $result=$connection->query("SELECT * FROM `users` WHERE email='$email' AND typee='trainer';");
            $verifie=mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($verifie){
              if(password_verify($password,$verifie["password"]) || $password==$verifie["password"]){
                  $id=$verifie["user_id"];
                  $result = $connection->query("SELECT trainer_id FROM trainers WHERE user_id=$id");
                  $row = mysqli_fetch_assoc($result);
                  $id_tr=$row['trainer_id'];
                  $resulttwo = $connection->query("SELECT name FROM users WHERE email='$email';");
                  $roww = mysqli_fetch_assoc($resulttwo);
                  $nom= $roww['name'];
                   session_start();
                   $_SESSION['userlogedin']="trainer";
                   $_SESSION['user_id'] = $id;
                   $_SESSION['trainer_id'] = $id_tr;
                   $_SESSION['email'] = $email;
                   $_SESSION['nom'] = $nom;
                  return true;
                }else{
                    return false;
                }}}
    public function login_m_admin($email,$password){
        $connection=$this->database_connect();
            $result=$connection->query("SELECT * FROM `users` WHERE `email`='$email' AND `typee`='admin';");
            $verifie=mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($verifie){
                if(password_verify($password,$verifie["password"]) || $password==$verifie["password"]){
                  $id=$verifie["user_id"];
                  $result = $connection->query("SELECT admin_id FROM `admin` WHERE user_id=$id");
                  $row = mysqli_fetch_assoc($result);
                  $id_admin=$row['admin_id'];
                  $resulttwo = $connection->query("SELECT name FROM users WHERE email='$email';");
                  $roww = mysqli_fetch_assoc($resulttwo);
                  $nom= $roww['name'];
                   session_start();
                   $_SESSION['userlogedin']="admin";
                   $_SESSION['user_id'] = $id;
                   $_SESSION['admin_id'] = $id_admin;
                   $_SESSION['email'] = $email;
                   $_SESSION['nom'] = $nom;
                  return true;
    }else{
        return false;
    }}}
}
?>