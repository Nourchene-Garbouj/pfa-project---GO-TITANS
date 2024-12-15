<?php 
session_start();
if(isset($_SESSION['userlogedin'])){
if($_SESSION['userlogedin']=="client"){
    header("location: accuiel.php");
}else{
  header("location:accuieltrainer.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Bienvenue sur notre site GO TITANS - Votre destination en ligne de notre contenu et service. Découvrez les Avantages clés et les caractéristiques, et explorez les Rubriques ou fonctionnalités principales. Commencez votre voyage vers vos Objectif dès aujourd'hui !">
    <title>GO TITANS</title>
    <meta name="keywords" content="GYM,WORKOUT,SPORTS,FITNESS"/>
    <link rel="stylesheet" href="..\css\css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="createacc">
  <div class="row no-gutters" id="sign">
    <div class="col-md-6 no-gutters">
        <div class="leftside d-flex justify-content-center align-items-center">
            <img class="img-fluid img-full-size" src="..\img\21.jpg" id="signinimg">
        </div>
    </div>

    <div class="col-md-6 no-gutters">
        <div class="rightside d-flex justify-content-center align-items-center" id="rightside">
<form action="../../Controller/log_in_system/register.php" method="post" id="register">
<div class="container">
<?php
if(isset($_GET['registration_error'])){
  echo "<div class='alert alert-info' role='alert'>".$_GET['registration_error']."</div>";
}
if(isset($_GET['registration_ms'])){
  echo "<div class='alert alert-info' role='alert'>".$_GET['registration_ms']."</div>";
}
?>
             <h1>Register</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
<div class="form-group">
    <label for="pwd">Full name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" placeholder="Enter full name" class="reges" name="fullname">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>&nbsp;&nbsp;&nbsp;
    <input type="text" placeholder="Enter email" class="reges" name="email">
  </div>
  
  <div class="form-group">
    <label for="pwd">Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" placeholder="Enter password" class="reges" name="password">
  </div>
  <div class="form-group">
    <label for="pwdr">repeat Password</label>
    <input type="password" placeholder="Repeat password" class="reges" name="passwordr">
  </div>
  <div class="form-group">
    <label for="pwdr">register as</label>
    <select class="form-select" id="type" name="type">
    <option value="trainer">As Trainer</option>
    <option value="client" selected>As client</option>
    </select>
  </div>
  <input type="submit" class="btn btn-success" name="signup" value="Register">
  </div>
  <div class="signin">
              <p>Already have an account? <a href="login.php">Sign in</a>.</p>
            </div>
</form>
</div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>