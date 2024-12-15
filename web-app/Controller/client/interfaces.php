<?php
interface cours_cl_c_interface {
    public function __construct();
    public function lister_cours_c();
    public function view_trainer_name($id_t);
    public function enrollment_c();
    public function unenrollment_c();
}
interface registred_cours_cl_c_interface {
    public function __construct();
    public function lister_rcours_c();
    public function view_trainer_namee($id_t);
}
interface profile_c_interface {
    public function __construct();
    public function update_profile_c();
}
interface Search_system_c_interface {
    public function __construct();
    public function lister_search_cour_c();
}
interface tarif_read_c_interface {
    public function __construct();
    public function lister_tarifsr_c();
}
?>