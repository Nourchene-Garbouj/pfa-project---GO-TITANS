<?php
include "interfaces.php";
class registred_cours_cl_m implements registred_cours_cl_m_interface{
    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
 //create a function to list the already registred courses
    public function lister_rcours_m($id_cl){
        $connection=$this->database_connect();
        $result = $connection->query("SELECT c.* FROM cours c JOIN inscription i ON c.cour_id = i.cour_id WHERE i.client_id = $id_cl;");
        return $result;}
//create a function to transform the id to the name of the trainer
    public function return_trainer_name($id){
        $connection=$this->database_connect();
        $resulte= $connection->query("SELECT user_id FROM trainers WHERE trainer_id =$id ;");
        $row = mysqli_fetch_assoc($resulte);
        $user_id=$row['user_id'];
    $resultee = $connection->query("SELECT name FROM users WHERE user_id =$user_id ;");
    $roww =mysqli_fetch_assoc($resultee);
    $trainer_name=$roww['name'];
        return $trainer_name;}
}
?>