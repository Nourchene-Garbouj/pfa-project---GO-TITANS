<?php
//create an instance to call it in run it when i need it in the view
include "../../Controller/trainer/cours_table.php";
$instance = new cours_t_c();
$instance->delete_cours_c();
?>