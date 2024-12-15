<?php
include "../../Model/client/search_system.php";
include "interfaces.php";
class Search_system_c implements Search_system_c_interface{
    protected $instance;
    public function __construct() {
        $this->instance = new Search_system_m();}
         //function to search in course table
         public function lister_search_cour_c(){
          if(isset($_POST["search"])){
                $search=$_POST["searchvalue"];}
                $result=$this->instance->search_cour_m($search);
                if($result==false){
                  return false;
                }else{
                  return $result;
                }}

}
?>