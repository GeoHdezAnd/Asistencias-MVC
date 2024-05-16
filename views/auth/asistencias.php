
<div class="inicio">
    <h1 class="titulo">BUAP <span>FCC</span> </h1>      
    <h2>Registro de asistencia</h2>
    <p class="clase" id="clase">Clase: Diseño de la interaccion</p>

    <p id="fecha-hora"></p>
    <div class="contenedor-inicio">
            <?php 
                    include_once __DIR__ . "/../template/alertas.php"
                ?>
        <form action="/asistencia-alumno" method="post">
            
            <div class="campo">
            <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" maxlength="8" name="matricula" placeholder="Ingrese su matrícula">
            </div>
            <div class="campo">
                <label for="nrc">NRC de la clase:</label>
                <input type="text" id="nrc" name="nrc" maxlength="5" placeholder="Ingrese el NRC de la clase">
            </div>
            
            <div class="campo">
                <label for="salon">Salón:</label>
                <input type="text" id="salon" name="salon" maxlength="10" placeholder="Ingrese el número de salón">
            </div>
            <div class="opciones">
                <button class="boton" type="submit">Enviar</button>
            </div>
        </form>
    </div>
    
        <a href="/">Ir a inicio</a>
    
</>

<?php 
    $script = "
        <script src='build/js/app.js'></script>    
    ";
?>