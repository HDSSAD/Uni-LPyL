/* 
Con algo de decoracion
*/
let progressBar = document.getElementById("pbar-progreso");
let formulario = document.getElementById("frm-userInfo");
let apellido = document.getElementById("inpt-apellido");
let nombres = document.getElementById("inpt-nombres");
let edad = document.getElementById("inpt-edad");
let user = document.getElementById("inpt-user");
let email = document.getElementById("inpt-email");
let tipoUser = document.getElementById("slct-tipoUser");
let selectSpan = document.getElementById("selectSpan");
selectSpan.textContent = '✖';
selectSpan.style.color = "red";
selectSpan.style.position = "absolute";
selectSpan.style.paddingLeft = "5px";
let numRequired = 0;

function updateBar() {
    let numRequired = 0;
    let requiredFields = document.querySelectorAll("[required]");
    requiredFields.forEach(e => {
        if (e.validity.valid) {
            numRequired++;
        }
    });
    switch (numRequired) {
        case 0:
            progressBar.setAttribute("value", 0);
            break;
        case 1:
            progressBar.setAttribute("value", 1);
            break;
        case 2:
            progressBar.setAttribute("value", 2);
            break
        case 3:
            progressBar.setAttribute("value", 3);
            break
        default:
            break;
    }
}
let fields = document.querySelectorAll("input");
fields.forEach(e => {
    e.addEventListener("input", function(event) {
        if (!e.validity.valid) {
            e.style.backgroundColor = "#ffb6c1";
        } else {
            e.style.backgroundColor = "#ffffff";
        }
    })
    e.addEventListener("", function(event) {
        if (!e.validity.valid) {
            e.style.backgroundColor = "#ffb6c1";
        } else {
            e.style.backgroundColor = "#ffffff";
        }
    });
});

function check(e) {
    if (!e.validity.valid) {
        e.style.backgroundColor = "#ffb6c1";
    } else {
        e.style.backgroundColor = "#ffffff";
    }
}

tipoUser.addEventListener("change", function(event) {
    if (tipoUser.options[tipoUser.selectedIndex].text == "---Seleccionar---") {
        selectSpan.textContent = '✖';
        selectSpan.style.color = "red";
    } else {
        selectSpan.textContent = ' ✓';
        selectSpan.style.color = "green";
    }
    updateBar();
});

function validate() {
    let regExText = /^[A-Za-zÁÉÍÓÚáéíóú'\s]*$/;
    let regExNumber = /^[0-9]{0,3}$/;
    let regExUser = /^[A-Za-z1-9]{5,25}$/;
    let regExMail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let regExTipoUser = /Administrador|Administrativo|Invitado/;
    let camposConErrores = "";
    if (!apellido.value.match(regExText)) {
        camposConErrores += "Apellido\n";
    };
    if (!nombres.value.match(regExText)) {
        camposConErrores += "Nombres\n";
    };
    if (!edad.value.match(regExNumber)) {
        camposConErrores += "Edad\n";
    };
    if (edad.value != "" && (edad.value < 18) || edad.value > 120) {
        camposConErrores += "Edad\n";
    }
    if (!user.value.match(regExUser)) {
        camposConErrores += "Usuario\n";
    };
    if (!email.value.match(regExMail)) {
        camposConErrores += "Email\n";
    };
    if (!tipoUser.options[tipoUser.selectedIndex].text.match(regExTipoUser)) {
        camposConErrores += "Tipo Usuario\n";
    };
    if (camposConErrores.trim() != "") {
        alert("Los siguiente campos contienen errores:\n" + camposConErrores);
    }
    let requiredIsValid = (user.validity.valid && email.validity.valid && tipoUser.validity.valid);
    let noRequiredIsValid = (apellido.validity.valid && nombres.validity.valid && edad.validity.valid)
    if (requiredIsValid) {
        if (noRequiredIsValid) {
            formulario.submit();
        } else {
            if (confirm("Algunos datos no son necesarios y son invalidos, desea borrarlos y enviar solo lo requerido?")) {
                if (!apellido.validity.valid) {
                    apellido.value = "";
                    apellido.style.backgroundColor = "#ffffff";
                }
                if (!nombres.validity.valid) {
                    nombres.value = "";
                    nombres.style.backgroundColor = "#ffffff";
                }
                if (!edad.validity.valid) {
                    edad.value = "";
                    edad.style.backgroundColor = "#ffffff";
                }
                formulario.submit();
            } else {
                alert("No se envio el formulario, por favor corrija sus datos e intentelo de nuevo");
            }
        }
    } else {
        alert("Algunos datos requeridos no son validos, por favor corrijalos e intente de nuevo");
    }

    /*  let condition = true;
     if (!(edad.value > 0 && edad.value <= 120)) {
         condition = false;
     }
     if (condition) {

     }

     if (condition) {
         alert("Datos enviados");
         formulario.submit();
     } else {
         alert("Existen datos incorrectos en el formulario");
     } */
}