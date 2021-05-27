let aInptTxtNumGuion = document.getElementsByClassName("inpt-txtNumGuion");
let aInptTxtNumLite = document.getElementsByClassName("inpt-txtNumLite");
let aInptTxtNum = document.getElementsByClassName("inpt-txtNum");
let aInptNumero = document.getElementsByClassName("inpt-numero");
let aInptTexto = document.getElementsByClassName("inpt-texto");

let patron_texto = /^[a-zA-ZáéíóúÁÉÍÓÚ'\s]*$/;
let patron_numero = /^[0-9]*$/;

let patron_txtNumLite = /^[a-zA-Z'\-\s0-9]*$/;
let patron_txtNumGuion = /^[a-zA-ZáéíóúÁÉÍÓÚ'\-\s0-9]*$/;

let patron_txtNum = /^[a-zA-ZáéíóúÁÉÍÓÚ'\s0-9]*$/;

/* 
No pude añadir los eventListener a los input utilizando las variables creadas al inicio del documento
por alguna razon me me lo permitia y siempre aparecia un error en la consola al ejecutar la funcion despues del evento input
Solo quedaron añadidas las validaciones html, y en php
 */