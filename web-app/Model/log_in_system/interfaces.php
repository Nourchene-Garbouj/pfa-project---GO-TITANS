<?php
interface login_m_interface {
    public function database_connect();
    public function login_m_client($email,$password);
    public function login_m_trainer($email,$password);
    public function login_m_admin($email,$password);
   
    
}
interface registration_m_interface {
    public function database_connect();
    public function check_existing_email($email);
    function register($fullname,$email,$hashpassword,$type);
}


?>