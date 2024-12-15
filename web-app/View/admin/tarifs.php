<?php
session_start();
if(!isset($_SESSION['userlogedin'])){
    header("location: ../log_in_system/login.php");
}elseif($_SESSION['userlogedin']=="client"||$_SESSION['userlogedin']=="trainer"){
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>
</head>
<body class="bgcolor">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="..\img\logo.png" class="logo" height="50px" widrh="50px">
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
                    echo '<li class="nav-item"><a class="nav-link" href="client/tablaux_cour.php">Cours</a></li>';
                }elseif($_SESSION['userlogedin']=="trainer"){
                    echo '<li class="nav-item"><a class="nav-link" href="trainer/cours_table.php">Cours</a></li>';
                }else{
                    echo '<li class="nav-item"><a class="nav-link" href="cours_table.php">Cours</a></li>';
                }
              }
              ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Tarifs</a>
            </li>
            <?php
              if(isset($_SESSION['userlogedin']) && $_SESSION['userlogedin']=="admin"){
                echo ' <li class="nav-item">
              <a class="nav-link" href="../admin/blog_actualité.php">Blog/Actualité</a> </li>';
            }elseif(isset($_SESSION['userlogedin']) && $_SESSION['userlogedin']=="client"){
              echo ' <li class="nav-item">
              <a class="nav-link" href="../client/blog_actualité.php">Blog/Actualité</a>
            </li>';
            }elseif(isset($_SESSION['userlogedin']) && $_SESSION['userlogedin']=="trainer"){
              echo ' <li class="nav-item">
              <a class="nav-link" href="../trainer/blog_actualité.php">Blog/Actualité</a>
            </li>';
            }
              ?>
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
                   echo '<a class="dropdown-item" href="client/profile.php">profil</a>';
                   echo '<a class="dropdown-item" href="log_in_system/logout.php">Déconnexion</a>';
                }elseif($_SESSION['userlogedin']=="trainer"){
                  echo '<a class="dropdown-item" href="trainer/profile.php">profil</a>';
                  echo '<a class="dropdown-item" href="log_in_system/logout.php">Déconnexion</a>';
                }else{
                  echo '<a class="dropdown-item" href="profile.php">profil</a>';
                  echo '<a class="dropdown-item" href="../log_in_system/logout.php">Déconnexion</a>';
                }
              }else{
                echo '<a class="dropdown-item" href="log_in_system/login.php">log in</a>';
                echo '<a class="dropdown-item" href="log_in_system/registration.php">sign up</a>';
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
    <section>
      <article>
        <div class="card mb-3 mr-2 ml-2 mt-2">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="..\img\5.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Promotions en cours : </h5>
                <p class="card-text">Découvrez les promotions actuellement disponibles dans notre salle de sport,
                   conçues pour vous aider à atteindre vos objectifs de remise en forme. Profitez d'une réduction spéciale 
                   sur les adhésions mensuelles et annuelles, bénéficiez d'avantages supplémentaires en parrainant vos
                    amis, et explorez nos cours de groupe avec un essai gratuit. De plus, recevez des séances gratuites
                     avec un entraîneur personnel pour personnaliser votre programme d'entraînement, et complétez-le avec une
                      consultation nutritionnelle gratuite pour maximiser vos résultats. Ne manquez pas cette opportunité de
                       démarrer votre parcours vers une meilleure santé et un bien-être optimal dès maintenant !</p>
              </div>
            </div>
          </div>
        </div>   
         <h3 class="title"><strong>Tarifs : </strong></h3>
<div>
<button type="button" class="btn btn-primary ml-5 mb-2" data-toggle="modal" data-target="#exampleModal">Ajouter Tarif</button>
</div>
<div class="container">
<?php
if(isset($_GET["message_alert"])){
  echo"<div class='alert alert-danger'>".$_GET["message_alert"]."</div>";
}
if(isset($_GET["message_success"])){
  echo"<div class='alert alert-success'>".$_GET["message_success"]."</div>";
}
    ?>
    <table class="table table-hover table-bordered table-striped">
<thead><tr>
  <th>ID</th>
<th>Période (en mois)</th>
<th>Tarif par personne (en dinar)</th>
<th>Mise à jour</th>
<th>Supprimer</th>
</tr></thead>
<tbody>
<?php
// Include the class tarif_c
include "../../Controller/admin/tarifs.php";
// Create an instance
$instance = new tarifs_c();
$result = $instance->lister_tarifs_c();
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['period'] . "</td>";
    echo "<td>" . $row['Tarifs par personne'] . "</td>";
    echo "<td><a href='update_tarif.php?id=" . $row['Id'] . "' class='btn btn-success'>Mise à jour</a></td>";
    echo "<td><a href='../../Controller/admin/delete_tarif.php?id=" . $row['Id'] . "' class='btn btn-danger'>Supprimer</a></td>";
    echo "</tr>";
}
?>
</tbody>
    </table>
<form action="../../Controller/admin/insert_tarif.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tarif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <div class="form-group">
            <label for="period">period (en mois)</label>
            <input type="text" class="form-control" name="period">
        </div>
        <div class="form-group">
            <label for="period">tarif par personne (en dinar)</label>
            <input type="text" class="form-control" name="tarif">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="ajouter-tarif">
      </div>
    </div>
  </div>
</div>
</form>
</div>
</article>
</section>
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
               <a class="text-reset" href="../admin/tarifs.php">Découvrir nos offres !</a>
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
                  echo '<p><a class="text-reset" href="../trainer/tablaux_cour.php">rejoignez nos cours ici.</a></p>';
                }else{
                  echo '<p><a class="text-reset" href="../admin/cours_table.php">rejoignez nos cours ici.</a></p>';
                }
              }
              ?>
          <p>
            <a href="../apropos.php" class="text-reset">Faire connaitre nos coaches!</a>
          </p>
          <?php
              if(isset($_SESSION['userlogedin']) && $_SESSION['userlogedin']=="admin"){
                echo ' <p>
              <a class="text-reset" href="../admin/blog_actualité.php">Soyez toujours à jour.</a> </p>';
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
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>