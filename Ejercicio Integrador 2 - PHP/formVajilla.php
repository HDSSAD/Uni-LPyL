<fieldset>
    <legend>Conrato de Vajilla</legend>
    <form action="index.php" method="post">
        <label for="inpt-platos">Cantidad de platos</label>
        <input class="inpt-numero" type="number" name="inpt-platos" id="inpt-platos" placeholder="Cantidad de platos" maxlength="3" pattern="([0-9]+)" title="Solo numeros hasta 3 caracteres" min="0" max="200" required>

        <label for="inpt-cubiertos">Cantidad de cubiertos</label>
        <input class="inpt-numero" type="number" name="inpt-cubiertos" id="inpt-cubiertos" placeholder="Cantidad de cubiertos" maxlength="3" pattern="([0-9]+)" title="Solo numeros hasta 3 caracteres" min="0" max="200" required>

        <label for="inpt-lugarEntrega">Lugar de entrega</label>
        <input class="inpt-txtNum" type="text" name="inpt-lugarEntrega" id="inpt-lugarEntrega" placeholder="Lugar de entrega" maxlength="50" pattern="([a-zA-ZáéíóúÁÉÍÓÚ'\s0-9]+)" title="Letras mayusculas, minusculas, numeros y signo (') hasta 50 caracteres" required>

        <label for="inpt-fechInicio">Fecha de inicio</label>
        <input type="date" name="inpt-fechaInicio" id="inpt-fechaInicio" required>

        <label for="inpt-horaEntrega">Hora de entrega</label>
        <input type="time" name="inpt-horaEntrega" id="inpt-horaEntrega" required>

        <label for="inpt-horaFin">Hora de finalizacion</label>
        <input type="time" name="inpt-horaFin" id="inpt-horaFin" required>
        <br>
        <button type="submit" name="submitVaj">Enviar</button>
    </form>
</fieldset>