
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

  session_start();
$id=$_SESSION['user_id'];
?>

<form action="../../Controller/admin/update_profile.php?id_new=<?php echo $id ?>" method="post">
        <div class="form-group mt-5">
            <label for="nom">nom</label>
            <input type="text" class="form-control" name="nom" minlength="4" value="<?php echo $_SESSION['nom'];?>">
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" minlength="4" name="email" value="<?php echo $_SESSION['email'];?>">
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input type="text" class="form-control" name="password" minlength="8" placeholder="change password?">
        </div>


        <input type="submit" class="btn btn-success mt-3" name="update-info" value="update">
</form>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
