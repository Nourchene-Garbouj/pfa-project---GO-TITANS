<?php
include "interfaces.php";
class blog_m implements blog_m_interface{
     //create a function to connect with the database
    public function database_connect(){
        $connection=mysqli_connect("localhost","admin","admin","pfa");
        return $connection;}
        //create a function to list all blog
    public function lister_blog_m(){ 
        $connection=$this->database_connect();
        $result=$connection->query("SELECT * FROM blog");
        return $result;}
         //create a function to complete the update page
    public function complete_update_m($id){
        $connection=$this->database_connect();
        $result = $connection->query("SELECT * FROM blog where article_id='$id'");
        $row=mysqli_fetch_assoc($result); 
        return $row;  }
         //create a function to update the blog
    public function update_blog_m($id_new, $article) {
        $connection = $this->database_connect();
        $stmt = $connection->prepare("UPDATE `blog` SET `article`=? WHERE `article_id`=?");
        $stmt->bind_param("si", $article, $id_new);
        $result = $stmt->execute();
        $stmt->close();
        return $result;}
}
?>
