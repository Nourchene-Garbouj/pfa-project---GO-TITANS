<?php
include "../../Model/client/already_registred_table.php";
include "interfaces.php";
class registred_cours_cl_c implements registred_cours_cl_c_interface {
    protected $instance;
    public function __construct() {
        $this->instance = new registred_cours_cl_m();}
        //create a function to list the already registred courses
    public function lister_rcours_c(){
       $result=$this->instance->lister_rcours_m($_SESSION['client_id']);
        return $result;}
    public function view_trainer_namee($id_t){
     $resulte =$this->instance->return_trainer_name($id_t);
      return $resulte;}
}
?>