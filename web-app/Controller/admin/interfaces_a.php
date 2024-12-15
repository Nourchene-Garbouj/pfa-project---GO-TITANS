<?php
interface tarifs_interface {
    public function __construct();
    public function lister_tarifs_c();
    public function ajouter_tarifs_c();
    public function delete_tarifs_c();
    public function complete_update_c();
    public function update_tarifs_c();
}
interface users_interface {
    public function __construct();
    public function lister_users_c();
    public function ajouter_users_c();
   public function delete_users_c();
    public function complete_update_c();
    public function update_users_c();
}
interface cours_a_c_interface {
    public function __construct();
    public function listerr_cours_c();
    public function ajouter_cours_c();
    public function delete_cours_c();
    public function complete_update_table_c();
    public function update_cours_c();
}
interface blog_c_interface {
    public function __construct();
    public function lister_blog_c();
    public function complete_update_c();
    public function update_blog_c();
}
interface Profile_c_Interface {
    public function __construct();
    public function update_profile_c();
}

interface Search_system_c_interface {
    public function __construct();
    public function lister_search_cour_c();
}

?>