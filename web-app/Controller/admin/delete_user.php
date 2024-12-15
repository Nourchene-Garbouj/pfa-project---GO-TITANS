<?php
//create an instance to call it in run it when i need it in the view
include "../../Controller/admin/users.php";
$instance = new users_c();
$instance->delete_users_c();
?>