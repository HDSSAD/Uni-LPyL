<?php
session_start();
include("./class/persona.class.php");

if (isset($_POST["login"])) {
    if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
        if (validarCamposLogin($_POST)) {
            $storedUser = unserialize($_SESSION["user"]);
            if ($_POST["inpt-user"] == $storedUser->getUsuario() && $_POST["inpt-pass"] == $storedUser->getPass()) {
                echo("UsuarioActual y storedUser identicos");
                header("location:calcular.php");
            }
        } else {
            echo ("Los campos no son validos");
        }
    } else {
        echo("Aun no hay usuarios creados");
    }
}
if (isset($_POST["register"])) {
    if (validarCamposRegister($_POST)) {
        $persona = new Persona($_POST["inpt-user"], $_POST["inpt-pass"], $_POST["inpt-apellido"], $_POST["inpt-nombre"]);
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
        }
        $_SESSION["user"] = serialize($persona);
        header("location:index.php");
    };
};

function validarCamposLogin($arreglo)
{
    $isValid = true;
    $user = htmlentities(trim($arreglo["inpt-user"]));
    $pass = htmlentities(trim($arreglo["inpt-pass"]));
    
    $patron_txtNumLite = "/^[a-zA-Z'\-\s0-9]+$/";
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚ'\s]+$/";

    if (strlen($user) < 1 || !preg_match($patron_texto, $user)) {
        return $isValid = false;
    }
    if (strlen($pass) < 1 || !preg_match($patron_txtNumLite, $pass)) {
        return $isValid = false;
    }

    return $isValid;
};
function validarCamposRegister($arreglo)
{
    $isValid = true;
    $user = htmlentities(trim($arreglo["inpt-user"]));
    $pass = htmlentities(trim($arreglo["inpt-pass"]));
    $apellido = htmlentities(trim($arreglo["inpt-apellido"]));
    $nombre = htmlentities(trim($arreglo["inpt-nombre"]));
    
    $patron_txtNumLite = "/^[a-zA-Z'\-\s0-9]+$/";
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚ'\s]+$/";

    if (strlen($user) < 1 || !preg_match($patron_texto, $user)) {
        return $isValid = false;
    }
    if (strlen($pass) < 1 || !preg_match($patron_txtNumLite, $pass)) {
        return $isValid = false;
    }
    if (strlen($apellido) < 1 || !preg_match($patron_texto, $apellido)) {
        return $isValid = false;
    }
    if (strlen($nombre) < 1 || !preg_match($patron_texto, $nombre)) {
        return $isValid = false;
    }

    return $isValid;
};
