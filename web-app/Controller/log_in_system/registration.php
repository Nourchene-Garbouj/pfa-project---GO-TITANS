<?php
include "../../Model/log_in_system/registration.php";
include "interfaces.php";
class registration_c implements registration_interface{
    protected $instance;
    public function __construct() {
        $this->instance = new registration_m();}
         //create a registration function
   public function register_c() {
if(isset($_POST["signup"])){
    $fullname=trim($_POST["fullname"]);
    $email=trim($_POST["email"]);
   $password=$_POST["password"];
   $passwordr=$_POST["passwordr"];
   $hashpassword=password_hash($password,PASSWORD_DEFAULT);
   $type=$_POST["type"];
   $result=$this->instance->check_existing_email($email);
   if(empty($fullname)||empty($email)||empty($passwordr) ||empty($password)){
    header("Location:../../View/log_in_system/registration.php?registration_error=all fields are required");}
    elseif(strlen($fullname) < 4){
        header("Location:../../View/log_in_system/registration.php?registration_error=name is too short");}
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location:../../View/log_in_system/registration.php?registration_error=email is not valid");}    
          elseif($result>0){
            header("Location:../../View/log_in_system/registration.php?registration_error=email already exist");}
          elseif(strlen($password) < 8){
            header("Location:../../View/log_in_system/registration.php?registration_error=password too short");}
            elseif($password != $passwordr){
                header("Location:../../View/log_in_system/registration.php?registration_error=password dosn't match");}
              else{
                if($this->instance->register($fullname,$email,$hashpassword,$type)==true){
             header("Location:../../View/log_in_system/registration.php?registration_ms=you are registred successfully");
                }else{
                    header("Location:../../View/log_in_system/registration.php?registration_error=something wrong try again");
                }
            }}}
}
?>