<?php

session_start();

require 'bd.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_user, email, password FROM users WHERE id_user = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Tec Mante</title>
</head>

<body>



    <?php if (!empty($user)) : ?>
        <?php
        require 'partials/headerSesion.php'
        ?>
        <br>You are Succesfully Logged In
    <?php else : ?>
        <?php
        require 'partials/header.php'
        ?>
        <div class="col-lg-6 col-md-6 col-sm-6 container card cuerpo-form" style="background-color: #F6F6F6; border: 0; box-shadow: 0 5px 6px -6px #777; margin-top: 10%;">
            <div class="form-group">
                <form action="">
                    <?php
                    require 'partials/nombre_tec.php'
                    ?>

                    <div class="container box-footer botones">
                        <a href="login.php" class="btn btn-outline-primary">Ingresar</a>
                        <a href="signup.php" class="btn btn-outline-primary">Registrarse</a>
                    </div>

                </form>
            </div>
        </div>
    <?php endif ?>


    <!--<img class="fondo-tec" src="assets/img/tec_fondo.jpg" alt="tec" height="100%">-->



</body>

</html>