<?php
include "interfaces.php";
class cours_cl_m implements cours_cl_m_interface{
//create a function to connect with the database
    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
    //create a function to list all courses
    public function lister_cours_m(){
        $connection=$this->database_connect();
        $result=$connection->query("SELECT * FROM cours");
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
          //create a function to enrolle the client logedin in a course
  public function enrollment_m($cl_id, $cr_id) {
    $connection = $this->database_connect();
    $resultee = $connection->query("SELECT `nb max`, `nb act` FROM cours WHERE cour_id = $cr_id;");
    $row = mysqli_fetch_assoc($resultee);
    if ($row['nb act'] == $row['nb max']) {
        return "no place"; // Indicates no available spots
    } elseif ($row['nb act'] < $row['nb max']) {
        $result = $connection->query("SELECT * FROM inscription WHERE client_id = $cl_id AND cour_id = $cr_id;");
        if (mysqli_num_rows($result) > 0) {
            return false; // Indicates client is already enrolled
        }else{
            $nb = $row['nb act'] + 1;
            $connection->query("UPDATE cours SET `nb act` = $nb WHERE cour_id = $cr_id");
            $resulte = $connection->query("INSERT INTO `inscription` (`client_id`, `cour_id`) VALUES ('$cl_id', '$cr_id');");
            return true; // Indicates successful enrollment
        }}}
 //create a function to unenrolle (cancel the enrollement) the client logedin in a course
    public function unenrollment_m($cl_id,$cr_id){
        $connection=$this->database_connect();
        $resultee = $connection->query("SELECT `nb act` FROM cours WHERE cour_id = $cr_id;");
        $row =mysqli_fetch_assoc($resultee);
        $result = $connection->query("SELECT * FROM inscription WHERE client_id =$cl_id AND cour_id =$cr_id;");
        if(mysqli_num_rows($result)>0){
            $resulte=$connection->query("DELETE FROM `inscription` WHERE client_id =$cl_id AND cour_id =$cr_id;");
            $nb=$row['nb act']-1;
            $connection->query("UPDATE cours SET `nb act` =$nb WHERE cour_id = $cr_id");
            return true;
        }else{
      return false;
    }}
}
?>