<?php
include "interfaces.php";
class Search_system_m implements Search_system_m_interface {
    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
          //function to search in course table
          public function search_cour_m($search) {
            $connection = $this->database_connect();
            if($search==""){
                return false;
            }else{
                 $stmt = $connection->prepare("SELECT * FROM cours WHERE nom LIKE ?");
            $searchParam = "%$search%";
            $stmt->bind_param("s", $searchParam);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result;
            }
           }
}
?>
