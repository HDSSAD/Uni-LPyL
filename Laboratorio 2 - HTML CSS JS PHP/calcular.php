<?php
session_start();
include_once("./class/persona.class.php");
include_once("./class/lista.class.php");

function validarCampos($arreglo)
{
    // validation code
    $isValid = true;
    $nombre = htmlentities(trim($arreglo["inpt-nombre"]));
    $peso = htmlentities(trim($arreglo["inpt-peso"]));
    $estatura= htmlentities(trim($arreglo["inpt-estatura"]));
    
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚ'\s]+$/";
    $patron_numero = "/^[0-9]+$/";

    if (strlen($nombre) < 1 || !preg_match($patron_texto, $nombre)) {
        return $isValid = false;
    }
    if (strlen($peso) < 1 || !preg_match($patron_numero, $peso)) {
        return $isValid = false;
    }
    if (strlen($estatura) < 1 || !preg_match($patron_numero, $estatura)) {
        return $isValid = false;
    }

    return $isValid;
}
if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    $usuarioActual = unserialize($_SESSION["user"]);

    if (isset($_POST["btn-submit"])) {
        if (validarCampos($_POST)) {
            $nuevaLista = new Lista($_POST["inpt-nombre"], $_POST["inpt-peso"], $_POST["inpt-estatura"]);
            $usuarioActual->agregarLista(serialize($nuevaLista));
            $_SESSION["user"] = serialize($usuarioActual);
        }
    }

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <title>Clinica</title>
    </head>

    <body>
    <?php include_once("header.php") ?>
        <main>
            <section>
                <article>
                    <fieldset>
                        <legend>Calculadora</legend>
                        <form action="" method="post">
                            <label for="inpt-nombre">Nombre de la persona: </label>
                            <input class="inpt-texto" type="text" name="inpt-nombre" id="inpt-nombre" placeholder="Ingrese su nombre" maxlength="40" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s]+)" title="Letras mayusculas y minusculas y signo (') hasta 40 caracteres" required><br>
                            <label for="inpt-peso">Peso: </label>
                            <input type="number" name="inpt-peso" id="inpt-peso" min="1" max="600"><br>
                            <label for="inpt-estatura">Estatura: </label>
                            <input type="number" name="inpt-estatura" id="inpt-estatura" min="20" max="300"><br>
                            <button type="submit" name="btn-submit">Calcular</button>
                        </form>
                    </fieldset>
                </article>
            </section>

            <?php
            if (count($usuarioActual->getLista()) > 0) {
                $listaActual =  $usuarioActual->getLista();
                $lastItem = unserialize($listaActual[count($listaActual) - 1]);
            ?>
                <fieldset>
                    <legend>Ultimo registro</legend>
                    <p><strong>Paciente: </strong> <?= $lastItem->getPersona() ?></p>
                    <p><strong>Peso: </strong> <?= $lastItem->getPeso() ?></p>
                    <p><strong>Estatura: </strong> <?= $lastItem->getEstatura() ?></p>
                    <p><strong>Indice de masa corporal: </strong> <?= $lastItem->getMasa() ?></p>
                    <p><strong>Resultado: </strong> <?= $lastItem->getStatus() ?></p>
                    <br>
                    <?php
                    if (count($usuarioActual->getLista()) > 1) {
                        echo "Calculos anteriores: <br>";
                    ?>
                        <table>
                            <tr>
                                <th>Paciente</th>
                                <th>IMC</th>
                                <th>Resultado</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($i < count($listaActual) - 1) {
                                $item = unserialize($listaActual[$i]);
                            ?>
                                <tr>
                                    <td><?= $item->getPersona(); ?></td>
                                    <td><?= $item->getMasa() ?></td>
                                    <td><?= $item->getStatus() ?></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </table>
                </fieldset>
            <?php
                    }
            ?>

        </main>
    <?php include_once("footer.php") ?>
    <script src="./js/script.js" defer></script>
    </body>

    </html>
<?php

            }
        } else {
            echo "no se ha iniciado la sesion";
            header("location:index.php");
        }
?>