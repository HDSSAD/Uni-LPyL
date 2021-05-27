<?php 

include("./class/persona.class.php");
include("./class/vehiculo.class.php");
include("./class/vajilla.class.php");

function validarPersonas($arreglo){
    $isValidLocador = true;
    $isValidLocatario = true;
    /* Locador */
    $apellido1 = htmlentities(trim($arreglo["inpt-apellido1"]));
    $nombre1 = htmlentities(trim($arreglo["inpt-nombre1"]));
    $dni1 = htmlentities(trim($arreglo["inpt-dni1"]));
    $fechaNacimiento1 = htmlentities(trim($arreglo["inpt-fechaNacimiento1"]));
    /* Locatario */
    $apellido2 = htmlentities(trim($arreglo["inpt-apellido2"]));
    $nombre2 = htmlentities(trim($arreglo["inpt-nombre2"]));
    $dni2 = htmlentities(trim($arreglo["inpt-dni2"]));
    $fechaNacimiento2 = htmlentities(trim($arreglo["inpt-fechaNacimiento2"]));

    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚ'\s]+$/";
    $patron_numero = "/^[0-9]+$/";

    //validar Locador
    if (strlen($apellido1) < 1 || !preg_match($patron_texto, $apellido1)) {
        echo "error apellido locador<br>";
        return $isValidLocador = false;
    }
    if (strlen($nombre1) < 1 || !preg_match($patron_texto, $nombre1)) {
        echo "error nombre locador<br>";
        return $isValidLocador = false;
    }
    if (!is_numeric($dni1) || !preg_match($patron_numero, $dni1) || $dni1 < 20000000 || $dni1 > 50000000) {
        echo "error dni locador<br>";
        return $isValidLocador = false;
    }
    if (strlen($fechaNacimiento1) < 1) {
        echo "error fecha nacimiento locador<br>";
        return $isValidLocador = false;
    }
    //validar Locatario
    if (strlen($apellido2) < 1 || !preg_match($patron_texto, $apellido2)) {
        echo "error apellido locatario<br>";
        return $isValidLocatario = false;
    }
    if (strlen($nombre2) < 1 || !preg_match($patron_texto, $nombre2)) {
        echo "error nombre locatario<br>";
        return $isValidLocatario = false;
    }
    if (!is_numeric($dni2) || !preg_match($patron_numero, $dni2) || $dni2 < 20000000 || $dni2 > 50000000) {
        echo "error dni locatario<br>";
        return $isValidLocatario = false;
    }
    if (strlen($fechaNacimiento2) < 1) {
        echo "error fecha nacimiento locatario<br>";
        return $isValidLocatario = false;
    }

    if ($isValidLocador && $isValidLocatario) {
        $locadorActual = new Persona($apellido1, $nombre1, $dni1, $fechaNacimiento1);
        $locatarioActual = new Persona($apellido2, $nombre2, $dni2, $fechaNacimiento2);
        if (isset($_SESSION["locador"]) || isset($_SESSION["locatario"])){ 
            unset($_SESSION["locador"]);
            unset($_SESSION["locatario"]);
        }
        $_SESSION["locador"] = serialize($locadorActual);
        $_SESSION["locatario"] = serialize($locatarioActual);
        //Tal vez quitar
        if (isset($_SESSION["vehiculos"]) && !empty($_SESSION["vehiculos"])) {
            unset($_SESSION["vehiculos"]);
        }
        if (isset($_SESSION["vajilla"])) {
            unset($_SESSION["vajilla"]);
        };
        return $isValidLocador && $isValidLocatario;
    }
}

function validarVehiculo($arreglo){
    $isValidVehiculo = true;
    $patente = htmlentities(trim($arreglo["inpt-patente"]));
    $marca = htmlentities(trim($arreglo["inpt-marca"]));
    $modelo= htmlentities(trim($arreglo["inpt-modelo"]));
    $lugarEntrega = htmlentities(trim($arreglo["inpt-lugarEntrega"]));
    $lugarRecepcion = htmlentities(trim($arreglo["inpt-lugarRecep"]));
    $fechaInicio = htmlentities(trim($arreglo["inpt-fechaInicio"]));
    $fechaFin = htmlentities(trim($arreglo["inpt-fechaFin"]));
    
    $patron_txtNumLite = "/^[a-zA-Z'\-\s0-9]+$/";
    $patron_txtNum = "/^[a-zA-ZáéíóúÁÉÍÓÚ'\-\s0-9]+$/";

    if (strlen($patente) < 1 || !preg_match($patron_txtNumLite, $patente)) {
        return $isValidVehiculo = false;
    }
    if (strlen($marca) < 1 || !preg_match($patron_txtNum, $marca)) {
        return $isValidVehiculo = false;
    }
    if (strlen($modelo) < 1 || !preg_match($patron_txtNum, $modelo)) {
        return $isValidVehiculo = false;
    }
    if (strlen($lugarEntrega) < 1 || !preg_match($patron_txtNum, $lugarEntrega)) {
        return $isValidVehiculo = false;
    }
    if (strlen($lugarRecepcion) < 1 || !preg_match($patron_txtNum, $lugarRecepcion)) {
        return $isValidVehiculo = false;
    }
    if (strlen($fechaInicio) < 1) {
        return $isValidVehiculo = false;
    }
    if (strlen($fechaFin) < 1) {
        return $isValidVehiculo = false;
    }
    /* fechas */
    if ($fechaInicio > $fechaFin) {
        echo "<p style='color:red'>Fecha inicial mayor a fecha de fin</p>";
        return $isValidVehiculo = false;
    }

    if ($isValidVehiculo) {
        $vehiculo = new Vehiculo($patente, $marca, $modelo, $lugarEntrega, $lugarRecepcion, $fechaInicio, $fechaFin);
        $_SESSION["vehiculos"][] = serialize($vehiculo);
        return $vehiculo;
    }
}

function validarVajilla($arreglo){
    $isValidVajilla = true;
    $cantPlatos = htmlentities(trim($arreglo["inpt-platos"]));
    $cantCubiertos = htmlentities(trim($arreglo["inpt-cubiertos"]));
    $lugarEntrega = htmlentities(trim($arreglo["inpt-lugarEntrega"]));
    $fechaInicio = htmlentities(trim($arreglo["inpt-fechaInicio"]));
    $horaEntrega = htmlentities(trim($arreglo["inpt-horaEntrega"]));
    $horaFin = htmlentities(trim($arreglo["inpt-horaFin"]));

    $patron_numero = "/^[0-9]+$/";
    $patron_txtNum = "/^[a-zA-ZáéíóúÁÉÍÓÚ'\s0-9]+$/";

    if (strlen($cantPlatos) < 1 || !preg_match($patron_numero, $cantPlatos)) {
        return $isValidVajilla = false;
    }
    if (strlen($cantCubiertos) < 1 || !preg_match($patron_numero, $cantCubiertos)) {
        return $isValidVajilla = false;
    }
    if (strlen($lugarEntrega) < 1 || !preg_match($patron_txtNum, $lugarEntrega)) {
        return $isValidVajilla = false;
    }
    if (strlen($fechaInicio) < 1) {
        return $isValidVajilla = false;
    }
    if (strlen($horaEntrega) < 1) {
        return $isValidVajilla = false;
    }
    if (strlen($horaFin) < 1) {
        return $isValidVajilla = false;
    }
    /* horas */
    if ($horaEntrega > $horaFin) {
        echo "<p style='color:red'>Hora inicial mayor a hora de fin</p>";
        return $isValidVajilla = false;
    }

    if ($isValidVajilla) {
        $vajilla =  new Vajilla($cantPlatos, $cantCubiertos, $lugarEntrega, $fechaInicio, $horaEntrega, $horaFin);
        $_SESSION["vajilla"][] = serialize($vajilla);
        return $vajilla;
    }
}



?>