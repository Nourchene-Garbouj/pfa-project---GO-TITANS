<?php
session_start();
if(!isset($_SESSION['userlogedin'])){
    header("location: ../log_in_system/login.php");
}elseif($_SESSION['userlogedin']=="admin"||$_SESSION['userlogedin']=="client"){
  header("location: ../acceuil.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="../img/logo.png" class="logo" height="50px" widrh="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../acceuil.php">Acceuil</a>
            </li>
            <?php
              if(isset($_SESSION['userlogedin'])){
                if($_SESSION['userlogedin']=="client"){
                    echo '<li class="nav-item"><a class="nav-link" href="../client/tablaux_cour.php">Cours</a></li>';
                }elseif($_SESSION['userlogedin']=="trainer"){
                    echo '<li class="nav-item"><a class="nav-link" href="../trainer/cours_table.php">Cours</a></li>';
                }else{
                    echo '<li class="nav-item"><a class="nav-link" href="../admin/cours_table.php">Cours</a></li>';
                }
              }
              ?>
             <li class="nav-item">
              <a class="nav-link" href="../tarifs.php">Tarifs</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Blog/Actualité</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../apropos.php">à propos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Espace membre
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              if(isset($_SESSION['userlogedin'])){
                if($_SESSION['userlogedin']=="client"){
                   echo '<a class="dropdown-item" href="../client/profile.php">profil</a>';
                   echo '<a class="dropdown-item" href="log_in_system/logout.php">Déconnexion</a>';
                }elseif($_SESSION['userlogedin']=="trainer"){
                  echo '<a class="dropdown-item" href="profile.php">profil</a>';
                  echo '<a class="dropdown-item" href="../log_in_system/logout.php">Déconnexion</a>';
                }else{
                  echo '<a class="dropdown-item" href="../admin/profile.php">profil</a>';
                  echo '<a class="dropdown-item" href="../log_in_system/logout.php">Déconnexion</a>';
                }
              }else{
                echo '<a class="dropdown-item" href="../log_in_system/login.php">log in</a>';
                echo '<a class="dropdown-item" href="../log_in_system/registration.php">sign up</a>';
              }
              ?>
              </div>
            </li>
          </ul>
          <form action="search_page.php" method="post" class="form-inline my-2 my-lg-0 mr-3">
                <input name="searchvalue" class="form-control mr-sm-2" type="search" placeholder="Rechercher un cours" aria-label="Search">
                <button name="search" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
        </div>
      </nav>
    </header>
      <h1 class="title"><strong>Soyez toujours à jour ! </strong></h1><br><br>
      <?php
// Include the class blog_c
include "../../Controller/admin/blog.php";
// Create an instance
$instance = new blog_c();
$result = $instance->lister_blog_c();
$row = mysqli_fetch_assoc($result);
?>
      <div class="card-group mb-3 mt-2 mr-2 ml-2">
        <div class="card">
          <img src="..\img\6.jpg" class="card-img-top" alt="..." height="300px">
          <div class="card-body">
            <h5 class="card-title">Nutrition :</h5>
            <p class="card-text"><em>
              <?php
              echo $row['article'];
              mysqli_data_seek($result, 1);
              ?>
            </em></p>
          </div>
        </div>
        <div class="card">
          <img src="..\img\7.jpg" class="card-img-top" alt="..." height="300px">
          <div class="card-body">
            <h5 class="card-title">Fitness :</h5>
            <p class="card-text"><em>
              <?php
              $row = mysqli_fetch_assoc($result);
              echo $row['article'];
              mysqli_data_seek($result, 2);
              ?>
              </em></p>
          </div>
        </div>
        <div class="card">
          <img src="..\img\88.jpg" class="card-img-top" alt="..." height="300px">
          <div class="card-body">
            <h5 class="card-title">Sport et santé :</h5>
            <p class="card-text"><em>
            <?php
              $row = mysqli_fetch_assoc($result);
              echo $row['article'];
              ?>
            </em></p>
          </div>
        </div>
      </div>
      <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
          <div class="me-5 d-none d-lg-block">
            <span class="yell"><strong>Get connected with us on social networks :</strong></span>
          </div>
        </section>
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <h6 class="yell" class="text-uppercase fw-bold mb-4">
                  <i class="fas fa-gem me-3"></i>GO TITANS
                </h6>
                <p>
                  Go Titans , The land of fitness, est la Première chaîne de clubs de fitness en Tunisie avec 10 clubs répartis sur le Grand Tunis et Sousse.
      
      Go Titans , Enjoy the difference!
                </p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="yell" class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <?php
              if(isset($_SESSION['userlogedin']) &&$_SESSION['userlogedin']=="admin"){
                echo ' <p>
               <a class="text-reset" href="tarifs.php">Découvrir nos offres !</a>
             </p>';}else{
              echo ' <p>
              <a class="text-reset" href="../tarifs.php">Découvrir nos offres !</a>
            </p>';
             }
              ?>
          <?php
              if(isset($_SESSION['userlogedin'])){
                if($_SESSION['userlogedin']=="client"){
                    echo '<p><a class="text-reset" href="../client/tablaux_cour.php">rejoignez nos cours ici.</a></p>';
                }elseif($_SESSION['userlogedin']=="trainer"){
                  echo '<p><a class="text-reset" href="../trainer/cours_table.php">rejoignez nos cours ici.</a></p>';
                }else{
                  echo '<p><a class="text-reset" href="cours_table.php">rejoignez nos cours ici.</a></p>';
                }
              }
              ?>
          <p>
            <a href="../apropos.php" class="text-reset">Faire connaitre nos coaches!</a>
          </p>
          <?php
              if(isset($_SESSION['userlogedin']) && $_SESSION['userlogedin']=="admin"){
                echo ' <p>
              <a class="text-reset" href="blog_actualité.php">Soyez toujours à jour.</a> </p>';
            }elseif(isset($_SESSION['userlogedin']) && $_SESSION['userlogedin']=="client"){
              echo ' <p>
              <a class="text-reset" href="../client/blog_actualité.php">Soyez toujours à jour.</a>
            </p>';
            }elseif(isset($_SESSION['userlogedin']) && $_SESSION['userlogedin']=="trainer"){
              echo ' <p>
              <a class="text-reset" href="../trainer/blog_actualité.php">Soyez toujours à jour.</a>
            </p>';
            }
              ?>
        </div>
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="yell" class="text-uppercase fw-bold mb-4">Contact</h6>
                <p><i class="fas fa-home me-3"></i> tunisia , tunis 1006, TN</p>
                <p>
                  <i class="fas fa-envelope me-3"></i>
                  gotitansinfos@gmail.com
                </p>
                <p><i class="fas fa-phone me-3"></i> + 216 50433168</p>
                <p><i class="fas fa-print me-3"></i> + 216 92189355</p>
              </div>
            </div>
          </div>
        </section>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2024 Copyright
        </div>
        <!-- Copyright -->
      </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>
    </html>