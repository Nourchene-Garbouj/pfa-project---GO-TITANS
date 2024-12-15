<?php
include "../../Model/admin/cours_table.php";
include "interfaces_a.php";
class cours_a_c implements cours_a_c_interface{
    protected $instance;
    //create a new instance
    public function __construct() {
        $this->instance = new cours_a_m();}
    //create a function to list all courses
public function listerr_cours_c(){
$result=$this->instance->lister_cours_m();
return $result;}
    //create a function to add a new course
public function ajouter_cours_c(){
    if(isset($_POST["ajouter-cours"])){
        $nomcour=$_POST["nomcour"];
        $jour=$_POST["jour"];
        $horaire=$_POST["horaire"];
        $maximale=$_POST["maximale"];
        $trainer=$_POST["trainer"];
    }
    if ($nomcour == ""|| $jour== "" || $horaire== ""|| $trainer== ""){
        header("location:../../View/admin/cours_table.php?message_alert=Tous les champs sont obligatoires.");
    }else{
        try {
         $this->instance->ajouter_cours_m($nomcour,$jour,$horaire,$trainer,$maximale);
        header("location:../../View/admin/cours_table.php?message_success=Le cours a été ajouté avec succès.");
    
        } catch (Exception $e) {
            header("location:../../View/admin/cours_table.php?message_alert=L'identifiant n'est pas valide ou ne vous appartient pas.");
        }}}
        //create a function to delete a course
public function delete_cours_c(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $this->instance->delete_cours_m($id);
        header("location:../../View/admin/cours_table.php?message_success=Le cours a été supprimé avec succès.");
    }}
    //create a function to complete the update course page
public function complete_update_table_c(){
    if(isset($_GET["id"])) {
        $id= $_GET["id"];
    $row=$this->instance->complete_update_cour_m($id);
    }
    return $row;}
    //create a function to update a course
public function update_cours_c(){
        if(isset($_GET["id_new"])) {
            $id_new= $_GET["id_new"]; }
         if(isset($_POST["update-cours"])){
                $nomcour=$_POST["nomcour"];
                $jour=$_POST["jour"];
                $horaire=$_POST["horaire"];
                $maximale=$_POST["nbmax"];
                $trainer=$_POST["trainer"];
        $resultat=$this->instance->update_cours_m($nomcour,$jour,$horaire,$trainer,$maximale,$id_new);
        if($resultat==false){
            header("location:../../View/admin/cours_table.php?message_alert=L'identifiant n'est pas valide");
        }else{
              header('location:../../View/admin/cours_table.php?message_success=La mise à jour du cours a été effectuée avec succès.');
        }}}
}
?>