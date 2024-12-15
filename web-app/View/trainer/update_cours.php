
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tarif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
<?php
    $id_trainer = $_GET['tr_id'];
    session_start();
if( $_SESSION['trainer_id']!=$id_trainer){
        header("location:../../View/trainer/cours_table.php?message_alert=tu n'a pas l'access de modifier ce cour");
    }
?>

<?php
include "../../Controller/trainer/cours_table.php";
$instance = new cours_t_c();
$row=$instance->complete_update_table_c();
if(isset($_GET["cr_id"])) {
    $id= $_GET["cr_id"];
}
?>

<form action="../../Controller/trainer/update_data.php?id_new=<?php echo $id ?>" method="post">
    
        <div class="form-group mt-5">
            <label>Nom de cour</label>
            <input type="text" class="form-control" name="nomcour"  minlength="3" value="<?php echo $row['nom']?>">
        </div>
        <div class="form-group">
            <label>Jour</label>
            <input type="text" class="form-control" name="jour" minlength="3" value="<?php echo $row['jour']?>">
        </div>
       
        <div class="form-group">
            <label>Horaire</label>
            <input type="text" class="form-control" name="horaire"  minlength="8" value="<?php echo $row['horaire']?>">
        </div>
        <div class="form-group">
            <label>Nb maximale</label>
            <input type="text" class="form-control" name="nbmax"  minlength="1" value="<?php echo $row['nb max']?>">
        </div>
        

        <input type="submit" class="btn btn-success mt-3" name="update-cours" value="update">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>