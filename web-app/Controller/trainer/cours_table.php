<?php
include "../../Model/trainer/cours_table.php";
include "interfaces.php";
class cours_t_c{
    protected $instance;
    public function __construct() {
        $this->instance = new cours_t_m();
    }
    //create a function to list all courses
public function listerr_cours_c(){
$result=$this->instance->lister_cours_m();
return $result;
}
  //create a function to add a new course
public function ajouter_cours_c(){
    if(isset($_POST["ajouter-cours"])){
        $nomcour=$_POST["nomcour"];
        $jour=$_POST["jour"];
        $horaire=$_POST["horaire"];
        $maximale=$_POST["maximale"];
        $trainer=$_POST["trainer"];
    }
    if ($nomcour == ""|| $jour== "" || $horaire== ""|| $trainer== "" || $maximale== ""){
        header("location:../../View/trainer/cours_table.php?message_alert=Tous les champs sont obligatoires.");
    }else{
        if( $_SESSION['trainer_id']==$trainer){
  try {
         $this->instance->ajouter_cours_m($nomcour,$jour,$horaire,$trainer,$maximale);
        header("location:../../View/trainer/cours_table.php?message_success=Le cours a été ajouté avec succès.");
    
        } catch (Exception $e) {
            header("location:../../View/trainer/cours_table.php?message_alert=L'identifiant n'est pas valide ou ne vous appartient pas.");
        }
        }else{
            header("location:../../View/trainer/cours_table.php?message_alert=L'identifiant n'est pas valide ou ne vous appartient pas.");
        }}}
 //create a function to delete a course
public function delete_cours_c(){
    if(isset($_GET['cr_id']) && isset($_GET['tr_id']) ){
        $id = $_GET['cr_id'];
        $id_trainer = $_GET['tr_id'];
        session_start();
        if($_SESSION['trainer_id']==$id_trainer){  
         $this->instance->delete_cours_m($id);
         header("location:../../View/trainer/cours_table.php?message_success=Le cours a été supprimé avec succès.");
          }else{
            header("location:../../View/trainer/cours_table.php?message_alert=Vous ne pouvez pas supprimer ceci, car ce n'est pas le vôtre.");
        }}}
 //create a function to complete the update course page
public function complete_update_table_c(){
    if(isset($_GET["cr_id"])) {
        $id= $_GET["cr_id"];
    $row=$this->instance->complete_update_cour_m($id);
    }
    return $row;
}
 //create a function to update a course
public function update_cours_c(){
        if(isset($_GET["id_new"])) {
            $id_new= $_GET["id_new"]; }
         if(isset($_POST["update-cours"])){
                $nomcour=$_POST["nomcour"];
                $jour=$_POST["jour"];
                $horaire=$_POST["horaire"];
                $maximale=$_POST["nbmax"];  
 $resultat=$this->instance->update_cours_m($nomcour,$jour,$horaire,$maximale,$id_new);
        if($resultat==false){
            header("location:../../View/trainer/cours_table.php?message_alert=L'identifiant n'est pas valide ou ne vous appartient pas.");
        }else{
              header("location:../../View/trainer/cours_table.php?message_success=La mise à jour du cours a été effectuée avec succès.");
        }}}
}
?>