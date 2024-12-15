<?php
//create an instance to call it and run it when i need it in the view
include "../../Controller/admin/users.php";
$instance = new users_c();
$instance->ajouter_users_c();
?>