<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Clinica Vivir Mejor</title>
</head>

<body>
    <?php include_once("header.php") ?>
    <main>
        <section>
            <?php
            
            if (!isset($_GET["register"])) {
            ?>
                <label>Eres un usuario nuevo?</label>
                <button type="button" name="register" onclick="window.location='index.php?register'">Registrate!</button>
                <p>O sinó inicia sesion aqui:</p>
            <?php
            }
            ?>
        </section>
        <section>
            <article>
                <fieldset>
                    <legend>Login</legend>
                    <form action="login.php" method="post">
                        <label for="inpt-user">Usuario: </label>
                        <input class="inpt-texto" type="text" name="inpt-user" id="inpt-user" placeholder="Ingrese su Usuario" maxlength="16" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s]+)" title="Letras mayusculas, minusculas y el signo ('), Hasta 16 caracteres" required><br>
                        <label for="inpt-pass">Password: </label>
                        <input class="inpt-txtNumLite" type="password" name="inpt-pass" id="inpt-pass" maxlength="15" pattern="([a-zA-Z'\-\s0-9]+)" title="Letras mayusculas, minusculas, numeros, espacios y guion (-) hasta 15 caracteres" required><br>
                        <?php
                        if (isset($_GET["register"])) {
                        ?>
                            <label for="inpt-apellido">Apellido: </label>
                            <input class="inpt-texto" type="text" name="inpt-apellido" id="inpt-apellido" placeholder="Ingrese su Apellido" maxlength="16" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s]+)" title="Letras mayusculas, minusculas y el signo ('), Hasta 16 caracteres" required><br>
                            <label for="inpt-nombre">Nombre: </label>
                            <input class="inpt-texto" type="text" name="inpt-nombre" id="inpt-nombre" placeholder="Ingrese su nombre" maxlength="40" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s]+)" title="Letras mayusculas y minusculas y signo (') hasta 40 caracteres" required><br>
                            <button type="submit" name="register">Registrarse</button>
                        <?php
                        } else {
                        ?>
                            <button type="submit" name="login">Iniciar Sesion</button>
                        <?php } ?>
                    </form>
                </fieldset>
            </article>
        </section>
    </main>
    <?php include_once("footer.php") ?>
    <script src="./js/script.js" defer></script>
</body>

</html>