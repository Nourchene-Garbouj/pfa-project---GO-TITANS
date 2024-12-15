<?php
//create an instance to call it and run it when i need it in the view
include "../../Controller/admin/blog.php";
$instance = new blog_c();
$instance->update_blog_c();
?>