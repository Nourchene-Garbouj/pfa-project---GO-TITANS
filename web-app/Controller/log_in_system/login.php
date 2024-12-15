<?php
include "../../Model/log_in_system/login.php";
include "interfaces.php";
class login_c implements login_interface {
    protected $instance;
    public function __construct() {
        $this->instance = new login_m();}
        //create a login function
   public function login_c() {
if(isset($_POST["login"])){
    $email=trim($_POST["email"]);
    $password=$_POST["password"];
    $type=$_POST["type"];
   if(empty($email)||empty($password)){
      header("Location:../../View/log_in_system/login.php?loginms=all fields are required");}
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email)<12){
            header("Location:../../View/log_in_system/login.php?loginms=email not valid");}
        else{
            if($type=="client"){
                if($this->instance->login_m_client($email,$password)==true){
                         header("location: ../../View/acceuil.php");
                    }else{
                        header("Location:../../View/log_in_system/login.php?loginms=password or email is incorrect");
                    }
                }elseif($type=="trainer"){
                if($this->instance->login_m_trainer($email,$password)==true){
                        header("location: ../../View/acceuil.php");
                   }else{
                    header("Location:../../View/log_in_system/login.php?loginms=password or email is incorrect");
                   }
                 }else{
                if($this->instance->login_m_admin($email,$password)==true){
                    header("location: ../../View/acceuil.php");
                }else{
                    header("Location:../../View/log_in_system/login.php?loginms=password or email is incorrect");
               }}}}}

}
?>