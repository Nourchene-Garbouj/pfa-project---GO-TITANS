<?php
//create an instance to call it and run it when i need it in the view
include "../../Controller/admin/profile.php";
$instance = new profile_c();
$instance->update_profile_c();
?>