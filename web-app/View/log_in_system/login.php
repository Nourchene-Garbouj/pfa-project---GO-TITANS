<?php
session_start();
if(isset($_SESSION['userlogedin'])){
  header("location:../acceuil.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Bienvenue sur notre site GO TITANS - Votre destination en ligne de notre contenu et service. Découvrez les Avantages clés et les caractéristiques, et explorez les Rubriques ou fonctionnalités principales. Commencez votre voyage vers vos Objectif dès aujourd'hui !">
    <title>GO TITANS</title>
    <meta name="keywords" content="GYM,WORKOUT,SPORTS,FITNESS"/>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="firstpage">
<div class="row no-gutters">
 
<div class="col-md-6 no-gutters">
    <div class="leftside d-flex justify-content-center align-items-center">
        <img class="img-fluid img-full-size" src="..\img\20.jpg">
    </div>
</div>

<div class="col-md-6 no-gutters">
    <div class="rightside d-flex justify-content-center align-items-center"id="rrightside">
<form action="../../Controller/log_in_system/loged_in.php" method="post" id="signin">
<div class="mb-3">
   <?php
if(isset($_GET['loginms'])){
  echo "<div class='alert alert-danger'>".$_GET['loginms']."</div>";
}
?>
   <h1><strong>Sign In</strong></h1><br><br>
    <label for="email"><strong>Email address</strong></label>
    <input type="text" class="form-control" name="email" placeholder="enter your email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  <div class="mb-3">
    <label for="pwd"><strong>Password</strong></label>
    <input type="password" class="form-control" name="password" placeholder="enter your password">
  </div>
  
  <div class="form-group">
    <label for="type"><strong>log in as</strong></label>
    <select class="form-select" aria-label="Default select example" id="type" name="type">
    <option value="trainer">As Trainer</option>
    <option value="client" selected>As client</option>
    <option value="administrator">As Administrator</option>
    </select>
  </div>
  
  <input type="submit" class="btn btn-success" name="login" value="Log In">
  <div class="container signin">
       <p>you don't have an account? <a href="registration.php">Sign up</a>.</p>
            </div>
</form>
</div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>