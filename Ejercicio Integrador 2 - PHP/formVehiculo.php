<fieldset>
    <legend>Contrato de Vehiculo</legend>
    <form action="index.php" method="post">
        <label for="inpt-patente">Patente</label>
        <input class="inpt-txtNumLite" type="text" name="inpt-patente" id="inpt-patente" placeholder="Patente del vehiculo" maxlength="15" pattern="([a-zA-Z'\-\s0-9]+)" title="Letras mayusculas, minusculas, numeros, espacios y guion (-) hasta 15 caracteres" required>

        <label for="inpt-marca">Marca</label>
        <input class="inpt-txtNumGuion" type="text" name="inpt-marca" id="inpt-marca" placeholder="Marca del vehiculo" maxlength="15" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\-\s0-9]+)" title="Letras mayusculas, minusculas, numeros, guion (-) y simbolo (') hasta 15 caracteres" required>

        <label for="inpt-modelo">Modelo</label>
        <input class="inpt-txtNumGuion" type="text" name="inpt-modelo" id="inpt-modelo" placeholder="Modelo del vehiculo" maxlength="15" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\-\s0-9]+)" title="Letras mayusculas, minusculas, numeros, guion (-) y simbolo (') hasta 15 caracteres" required>

        <label for="inpt-lugarEntrega">Lugar de entrega</label>
        <input class="inpt-txtNumGuion" type="text" name="inpt-lugarEntrega" id="inpt-lugarEntrega" placeholder="Lugar de entrega" maxlength="50" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\-\s0-9]+)" title="Letras mayusculas, minusculas, numeros, espacios y signo (') hasta 50 caracteres" required>

        <label for="inpt-lugarRecep">Lugar de recepcion</label>
        <input class="inpt-txtNumGuion" type="text" name="inpt-lugarRecep" id="inpt-lugarRecep" placeholder="Lugar de recepcion" maxlength="50" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\-\s0-9]+)" title="Letras mayusculas, minusculas, numeros, espacios y signo (') hasta 50 caracteres" required>

        <label for="inpt-fechaInicio">Fecha de inicio</label>
        <input type="date" name="inpt-fechaInicio" id="inpt-fechaInicio" required>

        <label for="inpt-fechaFin">Fecha de finalizacion</label>
        <input type="date" name="inpt-fechaFin" id="inpt-fechaFin" required>
        <br>
        <button type="submit" name="submitVeh">Enviar</button>

    </form>
</fieldset>