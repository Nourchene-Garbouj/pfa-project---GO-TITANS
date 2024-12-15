<?php
include "interfaces.php";
class cours_t_m implements cours_t_m_interface{
    //create a function to connect with the database
    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
      //create a function to list all courses
    public function lister_cours_m(){
        $connection=$this->database_connect();
        $result=$connection->query("SELECT * FROM cours");
        return $result;}
          //create a function to add a new course
    public function ajouter_cours_m($nomcour,$jour,$horaire,$trainer,$maximale){
        $connection=$this->database_connect();
        $result=$connection->query("INSERT INTO `cours` (`nom`,`jour`,`horaire`,`trainer_id`,`nb max`) VALUES('$nomcour','$jour','$horaire','$trainer','$maximale');");
        return $result;}
       //create a function to delete a course
    public function delete_cours_m($id){
        $connection=$this->database_connect();
        $result=$connection->query("DELETE FROM cours where cour_id='$id'");
        return $result;}
     //create a function to complete the update course page
    public function complete_update_cour_m($id){
        $connection=$this->database_connect();
        $result = $connection->query("SELECT * FROM cours where cour_id='$id'");
        $row=mysqli_fetch_assoc($result); 
        return $row;}
           //create a function to update a course
    public function update_cours_m($nomcour,$jour,$horaire,$maximale,$id){
        $connection=$this->database_connect();
            try {
          $resultat=$connection->query("UPDATE `cours` SET `nom`='$nomcour',`jour`='$jour',`horaire`='$horaire',`nb max`='$maximale' WHERE `cour_id`='$id'");
                    return $resultat;
                    } catch (Exception $e) {
                       return false;
                    }}  
}
?>