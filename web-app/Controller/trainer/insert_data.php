<?php
//create an instance to call it in run it when i need it in the view
include "../../Controller/trainer/cours_table.php";
session_start();
$instance = new cours_t_c();
$instance->ajouter_cours_c();
?>