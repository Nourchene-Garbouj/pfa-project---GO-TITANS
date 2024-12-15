<?php
include_once "../../Model/admin/blog.php";
include "interfaces_a.php";
class blog_c implements blog_c_interface{
    protected $instance;
    //create an instance of model class
    public function __construct() {
        $this->instance = new blog_m();}
    //create a function to list all blog
public function lister_blog_c(){
$result=$this->instance->lister_blog_m();
    return $result;}
    //create a function to complete the update page
public function complete_update_c(){
    if(isset($_GET["id"])) {
        $id= $_GET["id"];
    $row=$this->instance->complete_update_m($id);
    }
    return $row;}
    //create a function to update the blog
public function update_blog_c(){
    if(isset($_GET["id_new"])) {
        $id_new= $_GET["id_new"]; }
    if(isset($_POST["update-blog"])){
        $article= $_POST["article"];
        $resultat=$this->instance->update_blog_m($id_new,$article);
        header("location:../../View/admin/blog_actualité.php?message_success=La mise à jour de l'article a été effectuée avec succès.");
    }}
}
?>