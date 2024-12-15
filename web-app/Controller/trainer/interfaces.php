<?php
interface cours_t_c_interface {
    public function __construct();
    public function listerr_cours_c();
    public function ajouter_cours_c();
    public function delete_cours_c();
    public function complete_update_table_c();
    public function update_cours_c();

    
}
interface enrolled_t_c_interface {
    public function __construct();
    public function lister_enrolled_clients_c();
}
interface Search_system_c_interface {
    public function __construct();
    public function lister_search_cour_c();
}

?>