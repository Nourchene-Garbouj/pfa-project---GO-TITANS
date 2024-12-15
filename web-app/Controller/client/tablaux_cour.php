<?php
include "../../Model/client/tablaux_cour.php";
include "interfaces.php";
class cours_cl_c implements cours_cl_c_interface{
    protected $instance;
    public function __construct() {
        $this->instance = new cours_cl_m();}
         //create a function to list all courses
    public function lister_cours_c(){
       $result=$this->instance->lister_cours_m();
        return $result;}
         //create a function to show trainer name instead of the id
    public function view_trainer_name($id_t){
     $resulte =$this->instance->return_trainer_name($id_t);
      return $resulte;}
      //create a function to enrolle the client logedin in a course
public function enrollment_c() {
    if (isset($_GET['cr_id']) && isset($_GET['cl_id'])) {
        $cr_id = $_GET['cr_id'];
        $cl_id = $_GET['cl_id'];
        $resultat = $this->instance->enrollment_m($cl_id, $cr_id);

        if ($resultat === false) {
            header("location:../../View/client/tablaux_cour.php?register_msg=Vous êtes déjà inscrit.");
        } elseif ($resultat === true) {
            header("location:../../View/client/tablaux_cour.php?register_msg=Vous êtes inscrit avec succès !");
        } elseif ($resultat === "no place") {
            header("location:../../View/client/tablaux_cour.php?register_msg=La classe est complète.");
        }}}
 //create a function to unenrolle (cancel the enrollement) the client logedin in a course
public function unenrollment_c(){
    if(isset($_GET['cr_id']) && isset($_GET['cl_id'])){
        $cr_id = $_GET['cr_id'];
        $cl_id = $_GET['cl_id'];
        $resultat=$this->instance->unenrollment_m($cl_id,$cr_id);
        if($resultat==false){
       header("location:../../View/client/tablaux_cour.php?unregister_msg=Vous n'êtes pas encore inscrit.");
        }else{
    header("location:../../View/client/tablaux_cour.php?unregister_msg=La désinscription a réussi.");
        }}}
}
?>
