<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Servicios.com</title>
</head>
<!-- Pido discupas porque está algo desordenado, descubri un error tarde no me parecio tener mucho tiempo para reordenar todo, tambien utilice varias formas de codigo que queria probar, como lo de utilizar una sola pagina (casi) -->
<!-- Aun asi coloque comentarios para que sea mas facil entender el codigo -->

<body>
    <?php include_once("header.php"); ?>
    <main>
        <?php
        /* Aqui coloque funciones de validacion */
        include_once("function.php");
        /* Validando datos segun el formulario que envia el post */
        /* validacion escrita en el archivo function.php */
        /* post de Personas */
        if (isset($_POST["submitPersonas"])) {
            if (validarPersonas($_POST)) {
            } else {
                echo "<p style='color:red'>Datos de Personas no valido o incompleto</p>";
            };
        }
        /* post de vehiculos */
        if (isset($_POST["submitVeh"])) {
            if (validarVehiculo($_POST)) {
            } else {
                echo "<p style='color:red'>Datos de vehiculo no valido o incompleto</p>";
            };
        }
        /* post de vajilla */
        if (isset($_POST["submitVaj"])) {
            if (validarVajilla($_POST)) {
            } else {
                echo "<p style='color:red'>Datos de vajilla no valido o incompleto</p>";
            };
        }
        ?>
        <?php
        /* Si existe un locador  y locatario en la variable sesion lo mostramos */
        if (isset($_SESSION["locador"]) && !empty($_SESSION["locador"]) && isset($_SESSION["locatario"]) && !empty($_SESSION["locatario"])) {
            $locadorActual = unserialize($_SESSION["locador"]);
            $locatarioActual = unserialize($_SESSION["locatario"]);
        ?>
            <!-- Personas validas -->
            <h2>Locador: <?= $locadorActual->getApellido() . " " . $locadorActual->getNombre() . " " ?><input type="button" value="Cerrar sesion" onclick="window.location='cerrarSesion.php'"></h2>
            <h3>Locatario: <?= $locatarioActual->getApellido() . " " . $locatarioActual->getNombre() . " " ?></h3>
            <form action="" method="post">
                <label for="slct-contrato">Agregar contrato de tipo:</label>
                <select name="slct-contrato" id="slct-contrato" onchange="this.form.submit()">
                    <option value="" selected disabled>---Seleccionar---</option>
                    <option value="vehiculo">Vehiculo</option>
                    <option value="vajilla">Vajilla</option>
                </select>
            </form>
            <?php
            /* Si tiene vehiculos en lista de contratos... */
            if (isset($_SESSION["vehiculos"]) && !empty($_SESSION["vehiculos"])) {
                /* desserializamos */
                $aVehiculos = $_SESSION["vehiculos"];
                for ($i = 0; $i < count($aVehiculos); $i++) {
                    $aVehiculos[$i] = unserialize($aVehiculos[$i]);
                }
            ?>
                <hr>
                <h3>Contratos solicitados para Vehiculos</h3>
                <?php
                if (isset($_GET["eliminarVeh"])) {
                    $i = 0;
                    $found = false;
                    while (!$found || $i <= count($aVehiculos)) {
                        if ($aVehiculos[$i]->getCodigo() == $_GET["eliminarVeh"]) {
                            unset($aVehiculos[$i]);
                            $found = true;
                        }
                        $i++;
                    }
                    $aVehiculos = array_values($aVehiculos);
                    unset($_SESSION["vehiculos"]);
                    for ($i = 0; $i < count($aVehiculos); $i++) {
                        $_SESSION["vehiculos"][$i] = serialize($aVehiculos[$i]);
                    }
                    header("location:index.php");
                }
                foreach ($aVehiculos as $objVeh) {
                ?>
                    <div>
                        <?= $objVeh->getCodigo() ?>
                        <a href="index.php?eliminarVeh=<?= $objVeh->getCodigo() ?>">Eliminar</a>
                        <a href="index.php?contratoVeh=<?= $objVeh->getCodigo() ?>">Ver contrato</a>
                    </div>
                <?php
                }
                /* Si se presiono un boton para ver uno de los contratos */
                if (isset($_GET["contratoVeh"])) {
                    $i = 0;
                    $found = false;
                    $vehiculoActual;
                    while (!$found) {
                        if ($aVehiculos[$i]->getCodigo() == $_GET["contratoVeh"]) {
                            $found = true;
                            $vehiculoActual = $aVehiculos[$i];
                        }
                        $i++;
                    }
                    if ($found) {
                        $datetime1 = new DateTime($vehiculoActual->getFechaInicio());
                        $datetime2 = new DateTime($vehiculoActual->getFechaFin());
                        $dias = $datetime1->diff($datetime2);
                        $dias = $dias->format('%a'); // cantidad de dias
                        echo "<h4>Contrato: " . $_GET["contratoVeh"] . "</h4>";
                        echo "El contrato de alquiler de vehículo se celebra en Comodoro Rivadavia, Chubut, el día <strong>" . date("d-m-Y") . "</strong> entre las siguientes partes Locador: <strong>" . $locadorActual->getApellido() . " " . $locadorActual->getNombre() . "</strong>, DNI <strong>" . $locadorActual->getDni() . "</strong> nacido el <strong>" . $locadorActual->getFechaNacimiento() . "</strong> en su carácter de titular del vehículo <strong>" . $vehiculoActual->getPatente() . "</strong>, <strong>" . $vehiculoActual->getMarca() . "</strong> y <strong>" . $vehiculoActual->getModelo() . "</strong>, y el Locatario: <strong>" . $locatarioActual->getApellido() . " " . $locatarioActual->getNombre() . "</strong>, DNI <strong>" .  $locatarioActual->getDni() . "</strong> nacido en <strong>" . $locatarioActual->getFechaNacimiento() . "</strong>, quien retira el vehículo en <strong>" . $vehiculoActual->getLugarEntrega() . "</strong> y lo retornará en <strong>" . $vehiculoActual->getLugarRecepcion() . "</strong> desde la fecha <strong>" . $vehiculoActual->getFechaInicio() . "</strong> por un total de pesos <strong>" . (int)$dias * $vehiculoActual->getImporteXdia() . "</strong>.";
                    } else {
                        echo "Ocurrio un error al buscar el contrato, se recomienda borrarlo y volver a crearlo";
                    }
                ?>
                    <br><br>
                    <input type="button" value="Ocultar Contrato" onclick="window.location='index.php'">
                <?php
                }
            }
            /* Si tiene vajilla en lista de contratos... */
            if (isset($_SESSION["vajilla"]) && !empty($_SESSION["vajilla"])) {
                /* desserializamos */
                $aVajilla = $_SESSION["vajilla"];
                for ($i = 0; $i < count($aVajilla); $i++) {
                    $aVajilla[$i] = unserialize($aVajilla[$i]);
                }

                ?>
                <!-- podria unir vehiculos y vajilla en una sola funcion con la sesion adecuada como parametro -->
                <hr>
                <h3>Contratos solicitados para Vajilla</h3>
                <?php

                if (isset($_GET["eliminarVaj"])) {
                    $i = 0;
                    $found = false;
                    while (!$found || $i <= count($aVajilla)) {
                        if ($aVajilla[$i]->getCodigo() == $_GET["eliminarVaj"]) {
                            unset($aVajilla[$i]);
                            $found = true;
                        }
                        $i++;
                    }
                    $aVajilla = array_values($aVajilla);
                    unset($_SESSION["vajilla"]);
                    for ($i = 0; $i < count($aVajilla); $i++) {
                        $_SESSION["vajilla"][$i] = serialize($aVajilla[$i]);
                    }
                    header("location:index.php");
                }
                foreach ($aVajilla as $objVaj) {
                ?>
                    <div>
                        <?= $objVaj->getCodigo() ?>
                        <a href="index.php?eliminarVaj=<?= $objVaj->getCodigo() ?>">Eliminar</a>
                        <a href="index.php?contratoVaj=<?= $objVaj->getCodigo() ?>">Ver contrato</a>
                    </div>
                <?php
                }
                /* Si se presiono un boton para ver uno de los contratos */
                if (isset($_GET["contratoVaj"])) {
                    $i = 0;
                    $found = false;
                    $vajillaActual;
                    while (!$found) {
                        if ($aVajilla[$i]->getCodigo() == $_GET["contratoVaj"]) {
                            $found = true;
                            $vajillaActual = $aVajilla[$i];
                        }
                        $i++;
                    }
                    if ($found) {
                        $datetime1 = new DateTime($vajillaActual->getFechaInicio() . " " . $vajillaActual->getHoraEntrega());
                        $datetime2 = new DateTime($vajillaActual->getFechaInicio() . " " . $vajillaActual->getHoraFin());
                        $horas = $datetime1->diff($datetime2);
                        $minutos =  $horas->format('%i');   // cantidad de minutos
                        $horas = $horas->format('%h');  // cantidad de horas
                        if ((int)$minutos > 30) {    // si esta 30min mas se contara como una hora adicional para el precio 
                            $horas = (int)$horas + 1;
                        }
                        echo "<h4>Contrato: " . $_GET["contratoVaj"] . "</h4>";
                        echo "El contrato de alquiler de vajilla se celebra en Comodoro Rivadavia, Chubut, el día <strong>" . date("d-m-Y") . "</strong> entre las siguientes partes Locador: <strong>" . $locadorActual->getApellido() . " " . $locadorActual->getNombre() . "</strong>, DNI <strong>" . $locadorActual->getDni() . "</strong> nacido el <strong>" . $locadorActual->getFechaNacimiento() . "</strong> en su carácter de titular de la vajilla de <strong>" . $vajillaActual->getCantPlatos() . "</strong> cantidad de platos y <strong>" . $vajillaActual->getCantCubiertos() . "</strong> cantidad de cubiertos y el Locatario: <strong>" . $locatarioActual->getApellido() . " " . $locatarioActual->getNombre() . "</strong>, DNI <strong>" . $locatarioActual->getDni() . "</strong> nacido en <strong>" . $locatarioActual->getFechaNacimiento() . "</strong>, quien recibe la vajilla en <strong>" . $vajillaActual->getLugarEntrega() . "</strong> desde la fecha <strong>" . $vajillaActual->getFechaInicio() . "</strong> en la hora <strong>" . $vajillaActual->getHoraEntrega() . "</strong> y hasta la hora <strong>" . $vajillaActual->getHoraFin() . "</strong> por un total de <strong>" . $horas . "</strong> horas por un total de pesos <strong>" . $horas * $vajillaActual->getImporteXhora() . "</strong>.";
                    } else {
                        echo "Ocurrio un error al buscar el contrato, se recomienda borrarlo y volver a crearlo";
                    }
                ?>
                    <br><br>
                    <input type="button" value="Ocultar Contrato" onclick="window.location='index.php'">
                <?php
                }
            }
            /* por ahora no se me ocurre alguna forma de hacer "bien" */
            if (!isset($_POST["slct-contrato"])) {
                $_POST["slct-contrato"] = "";
            }
            /* Despues de seleccionar algo en el combobox de Agregar Contrato  */
            if (isset($_POST["slct-contrato"]) || isset($_POST["submitVeh"]) || isset($_POST["submitVaj"])) {
                /* Si elije vehiculos en el select */
                if ($_POST["slct-contrato"] == "vehiculo" || isset($_POST["submitVeh"])) {
                ?>
                    <hr>
                    <section>
                        <h3>Contratacion de Vehiculo Nuevo</h3>
                        <article>
                            <?php include_once("formVehiculo.php") ?>
                        </article>
                    </section>
                <?php
                }
                /* Si elije Vajilla en el select */
                if ($_POST["slct-contrato"] == "vajilla" || isset($_POST["submitVaj"])) {
                ?>
                    <hr>
                    <section>
                        <h3>Contratacion de Vajilla Nueva</h3>
                        <article>
                            <?php include_once("formVajilla.php") ?>
                        </article>
                    </section>
            <?php
                }
            }
        } else {
            /* Personas no validas o no hay personas en Sesion */
            ?>
            <section>
                <h3>Contratacion de servicios</h3>
                <article>
                    <?php include_once("formCliente.php") ?>
                </article>
            </section>
        <?php
        }
        ?>

        <!-- para hace pruebas BORRAR-->
        <!-- <input type="button" value="(temp)borra sesion" onclick="window.location='cerrarSesion.php'"> -->
    </main>

    <?php include_once("footer.php") ?>
    <script src="./js/script.js" defer></script>
</body>


</html>