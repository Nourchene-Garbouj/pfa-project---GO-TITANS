<?php
interface tarifs_read_m_interface {
    public function database_connect();
    public function lister_tarifsr_m();
    
}
interface cours_cl_m_interface {
    public function database_connect();
    public function lister_cours_m();
    public function return_trainer_name($id);
    public function enrollment_m($cl_id,$cr_id);
    public function unenrollment_m($cl_id,$cr_id);
}
interface registred_cours_cl_m_interface {
    public function database_connect();
    public function lister_rcours_m($id_cl);
    public function return_trainer_name($id);


}
interface profile_m_interface {
    public function database_connect();
    public function check_users_m($email);
    public function update_profile_m($id_new,$nom,$email,$password);
}
interface Search_system_m_interface {
    public function database_connect();
    public function search_cour_m($search);}
?>