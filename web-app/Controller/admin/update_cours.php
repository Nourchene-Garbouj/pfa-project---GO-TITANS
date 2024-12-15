<?php
//create an instance to call it and run it when i need it in the view
include "../../Controller/admin/cours_table.php";
$instance = new cours_a_c();
$instance->update_cours_c();
?>