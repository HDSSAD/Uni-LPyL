<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include_once("header.php"); ?>
    <section>
        <article>
            <?php
            if (isset($_SESSION)) {
                $_SESSION = array();
                unset($_SESSION);
                session_destroy();
                echo "Sesion finalizada <br> Volviendo a la pagina principal en 2 segundos<br>";
            } else {
                echo "no hay sesion iniciada";
            }
            ?>
            <input id="btnNuevo" name="btnNuevo" type="button" value="Volver ahora" onclick="window.location='index.php'">
        </article>
    </section>
    <?php include_once("footer.php") ?>
    <script>
    window.onload = function() {
        setTimeout(() => {
            window.location = "index.php";
        }, 2000);
    }
    </script>
</body>

</html>