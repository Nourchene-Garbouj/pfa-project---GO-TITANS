<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
<?php
include "../../Controller/admin/tarifs.php";
// Create an instanc
$instance = new tarifs_c();
$row=$instance->complete_update_c();
if(isset($_GET["id"])) {
    $id= $_GET["id"];
}
?>

<form action="../../Controller/admin/update_tarif.php?id_new=<?php echo $id ?>" method="post">
<div class="form-group mt-5">
            <label for="period">period</label>
            <input type="text" class="form-control" name="period" minlength="1" value="<?php echo $row['period']?>">
        </div>
        <div class="form-group">
            <label for="period">tarif par personne</label>
            <input type="text" class="form-control" name="tarif" minlength="2" value="<?php echo $row['Tarifs par personne']?>">
        </div>
        <input type="submit" class="btn btn-success mt-3" name="update-tarif" value="update">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>