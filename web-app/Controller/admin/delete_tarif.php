<?php
//create an instance to call it and run it when i need it in the view
include "../../Controller/admin/tarifs.php";
$instance = new tarifs_c();
$instance->delete_tarifs_c();
?>