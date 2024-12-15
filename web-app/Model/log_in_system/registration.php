<?php
include "interfaces.php";
class registration_m implements registration_m_interface{

    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
 //create a registration function
    public function check_existing_email($email){
        $connection=$this->database_connect();
        $result=$connection->query("SELECT * FROM `users` WHERE email='$email';");
        $answer=mysqli_num_rows($result);
        return $answer;}
    public function register($fullname,$email,$hashpassword,$type){
        $connection=$this->database_connect();
        if($type=="client"){
        $result=$connection->query("INSERT INTO `users` (`name`,`email`,`password`,`typee`) VALUES('$fullname','$email','$hashpassword','$type');");
        $user_id=$connection->insert_id;
        $result=$connection->query("INSERT INTO `clients` (`user_id`) VALUES ('$user_id')");
        return true;
    }elseif($type=="trainer"){
        $result=$connection->query("INSERT INTO `users` (`name`,`email`,`password`,`typee`) VALUES('$fullname','$email','$hashpassword','$type');");
        $user_id=$connection->insert_id;
        $result=$connection->query("INSERT INTO `trainers` (`user_id`) VALUES ('$user_id')");
        return true;
    }else{
        return false;
    }}
}
?>