<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /login-tec');
}

require 'bd.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_user, email, password FROM users WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = "";

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id_user'];
        header('Location: /login-tec');
    } else {
        $message = 'Sorry, those credentials do not match';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Iniciar Sesión</title>
</head>

<body style="background-image: url('./assets/img/tec_fondo_2.jpg');">
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #005AA0;">
        <h1 style="color: white;" class="ml-2 mr-2">Iniciar sesión</h1>
    </nav>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center card" style="background-color: #F6F6F6; border: 0; box-shadow: 0 5px 6px -6px #777; margin-top: 10%;">
        <div class="form-group m-5">
            <form method="post" action="login.php">
                <?php
                require 'partials/nombre_tec.php'
                ?>

                <div class="form-group">
                    <label>Usuario:</label>
                    <input class="form-control" type="text" name="email" placeholder="Ingresa tu correo">
                </div>

                <div class="form-group">
                    <label>Contraseña:</label>
                    <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña">
                </div>

                <div class="box-footer">
                    <input class="btn btn-outline-primary" type="submit" value="Ingresar">
                </div>

            </form>
        </div>
    </div>

</body>

</html>