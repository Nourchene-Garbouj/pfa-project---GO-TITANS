<?php
include "../../Model/trainer/enrolled_clients_table.php";
include "interfaces.php";
class enrolled_t_c implements enrolled_t_c_interface{
    protected $instance;
    public function __construct() {
        $this->instance = new enrolled_t_m(); }
        //create a function to list the number of client registred in each course
public function lister_enrolled_clients_c(){
$result=$this->instance->lister_enrolled_clients_m();
return $result;
}


}

?>