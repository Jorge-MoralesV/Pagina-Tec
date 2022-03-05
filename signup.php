<?php

require 'bd.php';

$message = '';
$pass = $_POST['password'];
$conf_pass = $_POST['confirm_password'];

if ($pass == $conf_pass) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            header('Location: /login-tec');
            $message = 'Registrado correctamente';
        } else {
            $message = 'Ocurrio un error';
        }
    }
} else {
    $message = 'Las contraseñas no coinciden';
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Registrarse</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #005AA0;">
        <h1 style="color: white;" class="ml-2 mr-2">Registrarse</h1>
    </nav>

    <?php if (!empty($message)) : ?>
        <p style="height: 25px; background-color: #FFC8C8; text-align: center; color: red;"><?= $message ?></p>
    <?php endif; ?>


    <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center card" style="background-color: #F6F6F6; border: 0; box-shadow: 0 5px 6px -6px #777; margin-top: 10%;">
        <div class="form-group">
            <form method="post" action="signup.php">
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

                <div class="form-group">
                    <label>Confirmar contraseña:</label>
                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirma tu contraseña">
                </div>

                <div class="box-footer">
                    <input class="btn btn-outline-primary" type="submit" value="Registrarse">
                </div>

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js "></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
    <script src="assets/js/functions.js"></script>

</body>

</html>