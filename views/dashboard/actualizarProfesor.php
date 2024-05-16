<div class="dashboard">
    <?php include_once __DIR__ . '/../template/sidebar.php'?>
    <div class="principal">
        <?php include_once __DIR__ . '/../template/barra.php' ?>
        <div class="admin">
        <h3>¡Agregar maestro!</h3>
        <div class="menu-regresar">
            <a class="boton" href="/profesor">Regresar</a>
        </div>
        <div class="contenedor-form">
                <p>Llena el siguiente formulario</p>

                <?php 
                    include_once __DIR__ . "/../template/alertas.php"
                ?>
                <form class="formulario" method="POST">
                    <div class="campo">
                        <label for="nombre">Nombre:</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre" 
                            placeholder="Ejempo: Mario"
                            value="<?php echo s($profesor->nombre);?>">
                    </div>
                    <div class="campo">
                        <label for="apellidoP">Apellido Paterno:</label>
                        <input 
                            type="text" 
                            id="apellidoP" 
                            name="apellidoPaterno" 
                            placeholder="Ejemplo: Larios"
                            value="<?php echo s($profesor->apellidoPaterno);?>">
                    </div> 
                    <div class="campo">
                        <label for="apellidoM">Apellido Materno:</label>
                        <input 
                            type="text" 
                            id="apellidoM" 
                            name="apellidoMaterno" 
                            placeholder="Ejemplo: Roman"
                            value="<?php echo s($profesor->apellidoMaterno);?>">
                    </div> 
                    <div class="campo">
                        <label for="clave">Clave de trabajador: </label>
                        <input 
                            type="text" 
                            maxlength="9" 
                            name="clave" 
                            placeholder="Ejemplo: 123456789"
                            value="<?php echo s($profesor->clave);?>">
                    </div>
                    <div class="campo">
                        <label for="telefono">Teléfono:</label>
                        <input type="tell" id="telefono" name="telefono" placeholder="Ejemplo: 2491224487"
                        value="<?php echo s($profesor->telefono);?>">
                    </div>     
            
                    <div class="opciones">
                        <button class="boton" type="submit">Agregar</button>
                    </div>
                </form>
            
        </div>
        </div>
    </div>

    
</div>