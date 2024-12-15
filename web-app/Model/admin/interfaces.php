<?php
interface tarifs_m_interface {
    public function database_connect();
    public function lister_tarifs_m();
    public function ajouter_tarifs_m($period,$tarif);
    public function delete_tarifs_m($id);
    public function complete_update_m($id);
    public function update_tarifs_m($id_new,$period,$tarif);}
    
interface users_m_interface {
    public function database_connect();
    public function lister_users_m();
    public function check_users_m($email);
    public function add_client($nom,$email,$password,$type);
    public function add_trainer($nom,$email,$password,$type);
    public function delete_users_m($id);
    public function complete_update_m($id);
    public function update_users_m($id_new,$nom,$email,$password,$exist);}

interface cours_a_m_interface {
    public function database_connect();
    public function lister_cours_m();
    public function ajouter_cours_m($nomcour,$jour,$horaire,$trainer,$maximale);
    public function delete_cours_m($id);
    public function complete_update_cour_m($id);
    public function update_cours_m($nomcour,$jour,$horaire,$trainer,$maximale,$id);}

interface blog_m_interface {
    public function database_connect();
    public function lister_blog_m();
    public function complete_update_m($id);
    public function update_blog_m($id_new,$article);}

interface profile_m_interface {
    public function database_connect();
    public function check_users_m($email);
    public function update_profile_m($id_new,$nom,$email,$password);}

    interface Search_system_m_interface {
        public function database_connect();
        public function search_cour_m($search);}

  
?>
