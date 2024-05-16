<div class="dashboard">
    <?php include_once __DIR__ . '/../template/sidebar.php'?>
    <div class="principal">
        <?php include_once __DIR__ . '/../template/barra.php' ?>
        <div class="admin">
        <h3>Editar un alumno!</h3>
        <div class="menu-regresar">
                <a class="boton" href="/alumno">Regresar</a>
        </div>
        <div class="contenedor-form">
                <p>Llena el siguiente formulario</p>

                <?php 
                    include_once __DIR__ . "/../template/alertas.php"
                ?>
                <form class="formulario" method="POST" >
                    <div class="campo">
                        <label for="nombre">Nombre:</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre" 
                            placeholder="Jose Francisco"
                            value="<?php echo s($alumno->nombre);?>">
                    </div>
                    <div class="campo">
                        <label for="apellidoP">Apellido Paterno:</label>
                        <input 
                            type="text" 
                            id="apellidoP" 
                            name="apellidoPaterno" 
                            placeholder="Antonio"
                            value="<?php echo s($alumno->apellidoPaterno);?>">
                    </div> 
                    <div class="campo">
                        <label for="apellidoM">Apellido Materno:</label>
                        <input 
                            type="text" 
                            id="apellidoM" 
                            name="apellidoMaterno" 
                            placeholder="Perez"
                            value="<?php echo s($alumno->apellidoMaterno);?>">
                    </div> 
                    <div class="campo">
                        <label for="matricula">Matricula: </label>
                        <input 
                            type="text"
                            maxlength="9"
                            id="matricula" 
                            name="matricula" 
                            placeholder="202039856"
                            value="<?php echo s($alumno->matricula);?>">
                    </div>
                    <div class="campo">
                        <label for="carrera">Carrera que cursa:</label>
                        <select name="carrera">
                            <option value="" disabled selected
                            >--Selecciona Materia--</option>
                            <option value="1">Ing. Tecnologias de la información</option>
                            <option value="2">Ing. Ciencias de la computación</option>
                            <option value="3">Lic. Ciencias de la computación</option>
                        </select>
                    </div>     
                    <div class="opciones">
                        <button class="boton" type="submit">Agregar</button>
                    </div>
                </form>
            
        </div>
        </div>
    </div>

    
</div>