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

<body style="background-image: url('./assets/img/tec_fondo.jpg');">

    <?php if (!empty($user)) : ?>

        <?php
        require 'partials/headerSesion.php'
        ?>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center card" style="background-color: #F6F6F6; border: 0; box-shadow: 0 5px 6px -6px #777;">

                    <div class="row justify-content-center">
                        <h1 class="text-center pt-2">Cargar documentos</h1>
                    </div>

                    <!-- form -->
                    <div class="card-body">
                        <form>
                            <!-- th:object se obtiene de la clase controller en el ModelAttribute-->

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Constancia inhabilitación
                                        (opcional)</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Acta de nacimiento</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file  mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Credencial de elector</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">CURP</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">RFC</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Comprobante de domicilio</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Curriculum / solicitud</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Kardex ó certificado
                                        (opcional)</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Titulo / carta pasante /
                                        constancia</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Cedula profesional</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file mr-2">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Maestria</label>
                                </div>
                                <button class="btn btn-outline-primary"><i class="fas fa-solid fa-square-up-right"></i></button>
                                <button class="btn btn-outline-success"><i class="fas fa-regular fa-circle-down"></i></button>
                            </div>

                            <div class="box-footer">
                                <button class="btn btn-outline-primary">Guardar</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    <?php else : ?>

        <?php
        require 'partials/header.php'
        ?>

        <div class="col-lg-6 col-md-6 col-sm-6 container card cuerpo-form" style="background-color: #F6F6F6; border: 0; box-shadow: 0 5px 6px -6px #777; margin-top: 10%;">
            <div class="form-group">
                <form>
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

</body>

</html>