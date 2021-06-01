let aInptTxtNumGuion = document.getElementsByClassName("inpt-txtNumGuion");
let aInptTxtNumLite = document.getElementsByClassName("inpt-txtNumLite");
let aInptTxtNum = document.getElementsByClassName("inpt-txtNum");
let aInptNumero = document.getElementsByClassName("inpt-numero");
let aInptTexto = document.getElementsByClassName("inpt-texto");

const patron_texto = /[^a-zA-ZáéíóúÁÉÍÓÚ'\s]/g;
const patron_numero = /[^0-9]/g;

const patron_txtNumLite = /[^a-zA-Z'\-\s0-9]/g;
const patron_txtNumGuion = /[^a-zA-ZáéíóúÁÉÍÓÚ'\-\s0-9]/g;

const patron_txtNum = /[^a-zA-ZáéíóúÁÉÍÓÚ'\s0-9]/g;

/* 
Remueve los caracteres invalidos al momento en que se ingresan al textbox
Permitiendo solo entradas validas segun el regex indicado
*/

for (let i = 0; i < aInptTexto.length; i++) {
    let element = aInptTexto[i];
    element.addEventListener("input", (e) => {
        let validTxt = e.target.value.replace(patron_texto, "");
        e.target.value = validTxt;
    });
}
for (let i = 0; i < aInptNumero.length; i++) {
    let element = aInptNumero[i];
    element.addEventListener("input", (e) => {
        let validTxt = e.target.value.replace(patron_numero, "");
        e.target.value = validTxt;
    });
}
for (let i = 0; i < aInptTxtNum.length; i++) {
    let element = aInptTxtNum[i];
    element.addEventListener("input", (e) => {
        let validTxt = e.target.value.replace(patron_txtNum, "");
        e.target.value = validTxt;
    });
}
for (let i = 0; i < aInptTxtNumLite.length; i++) {
    let element = aInptTxtNumLite[i];
    element.addEventListener("input", (e) => {
        let validTxt = e.target.value.replace(patron_txtNumLite, "");
        e.target.value = validTxt;
    });
}
for (let i = 0; i < aInptTxtNumGuion.length; i++) {
    let element = aInptTxtNumGuion[i];
    element.addEventListener("input", (e) => {
        let validTxt = e.target.value.replace(patron_txtNumGuion, "");
        e.target.value = validTxt;
    });
}