<?php
include "interfaces.php";
class enrolled_t_m implements enrolled_t_m_interface{
    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
        //create a function to list the number of client registred in each course
    public function lister_enrolled_clients_m(){
        $connection=$this->database_connect();
        $result = $connection->query("SELECT c.nom AS nom_de_cours, u.name AS nom_de_trainer, COUNT(i.client_id) AS nombre_de_clients FROM cours c 
LEFT JOIN inscription i ON c.cour_id = i.cour_id 
LEFT JOIN trainers t ON c.trainer_id = t.trainer_id
LEFT JOIN users u ON t.user_id = u.user_id
GROUP BY c.cour_id;");
        return $result;}   
}

?>