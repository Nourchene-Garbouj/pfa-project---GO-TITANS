<?php
//create an instance to call it in run it when i need it in the view
include "../../Controller/trainer/profile.php";
$instance = new profile_c();
$instance->update_profile_c();
?>