<?php
//create an instance to call it and run it when i need it in the view
include "../../Controller/client/tablaux_cour.php";
$instance = new cours_cl_c();
$instance->unenrollment_c();
?>