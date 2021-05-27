<form action="index.php" method="post">
    <fieldset>
        <legend>Datos del Locador</legend>
        <label for="inpt-apellido1">Apellido</label>
        <input class="inpt-texto" type="text" name="inpt-apellido1" id="inpt-apellido1" placeholder="Ingrese su Apellido"maxlength="16" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s]+)" title="Letras mayusculas, minusculas y el signo ('), Hasta 16 caracteres" required>

        <label for="inpt-nombre1">Nombre</label>
        <input class="inpt-texto" type="text" name="inpt-nombre1" id="inpt-nombre1" placeholder="Ingrese su nombre" maxlength="40" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s]+)" title="Letras mayusculas y minusculas y signo (') hasta 40 caracteres" required>

        <label for="inpt-dni1">DNI</label>
        <input class="inpt-numero" type="number" name="inpt-dni1" id="inpt-dni1" min="20000000" max="50000000" placeholder="Ingrese su DNI" maxlength="8" pattern="([0-9]+)" title="Solo numeros hasta 8 caracteres" required>

        <label for="inpt-fechaNacimiento1">Fecha Nacimiento</label>
        <input type="date" name="inpt-fechaNacimiento1" id="inpt-fechaNacimiento1" required>
    </fieldset>
    <fieldset>
        <legend>Datos del Locatario</legend>
        <label for="inpt-apellido2">Apellido</label>
        <input class="inpt-texto" type="text" name="inpt-apellido2" id="inpt-apellido2" placeholder="Ingrese su Apellido"maxlength="16" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s]+)" title="Letras mayusculas, minusculas y el signo ('), Hasta 16 caracteres" required>

        <label for="inpt-nombre2">Nombre</label>
        <input class="inpt-texto" type="text" name="inpt-nombre2" id="inpt-nombre2" placeholder="Ingrese su nombre" maxlength="40" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s]+)" title="Letras mayusculas y minusculas y signo (') hasta 40 caracteres" required>

        <label for="inpt-dni2">DNI</label>
        <input class="inpt-numero" type="number" name="inpt-dni2" id="inpt-dni2" min="20000000" max="50000000" placeholder="Ingrese su DNI" maxlength="8" pattern="([0-9]+)" title="Solo numeros hasta 8 caracteres" required>

        <label for="inpt-fechaNacimiento2">Fecha Nacimiento</label>
        <input type="date" name="inpt-fechaNacimiento2" id="inpt-fechaNacimiento2" required>
    </fieldset>
    <br>
    <button type="submit" name="submitPersonas">Enviar</button>
    <!-- <button type="submit" name="submitPersonas" onclick="window.location='index.php'">Enviar</button> -->
</form>
