<?php
interface cours_t_m_interface {
    public function database_connect();
    public function lister_cours_m();
    public function ajouter_cours_m($nomcour,$jour,$horaire,$trainer,$maximale);
    public function delete_cours_m($id);
    public function complete_update_cour_m($id);
    public function update_cours_m($nomcour,$jour,$horaire,$maximale,$id);}
interface enrolled_t_m_interface {
    public function database_connect();
    public function lister_enrolled_clients_m();}
interface profile_m_interface {
    public function database_connect();
    public function check_users_m($email);
    public function update_profile_m($id_new,$nom,$email,$password);}
    interface Search_system_m_interface {
        public function database_connect();
        public function search_cour_m($search);}
?>