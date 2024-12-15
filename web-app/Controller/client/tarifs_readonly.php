<?php
include "../Model/client/tarifs_readonly.php";
include "interfaces.php";
class tarifs_read_c implements tarif_read_c_interface{
    protected $instance;
    public function __construct() {
        $this->instance = new tarifs_read_m();}
         //create a function to list the tarifs table
public function lister_tarifsr_c(){
$result=$this->instance->lister_tarifsr_m();
return $result;}
}
?>