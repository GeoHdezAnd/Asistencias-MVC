<div class="dashboard">
    <?php include_once __DIR__ . '/../template/sidebar.php'?>
    <div class="principal">
        <?php include_once __DIR__ . '/../template/barra.php' ?>
        <div class="admin">
        <h3>¡Agregar cuenta para administrador!</h3>
        <div class="menu-regresar">
                <a class="boton" href="/alumno">Regresar</a>
                
        </div>
        
        <div class="contenedor-form">
                <p>Llena el siguiente formulario</p>

                <?php 
                    include_once __DIR__ . "/../template/alertas.php"
                ?>
                <form class="formulario" method="POST" action="/agregar-admin">
                    <div class="campo">
                        <label for="nombre">Nombre:</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre" 
                            placeholder="Ingrese el nombre"
                            value="<?php echo s($admin->nombre);?>">
                    </div>
                    <div class="campo">
                        <label for="apellidoP">Apellido Paterno:</label>
                        <input 
                            type="text" 
                            id="apellidoP" 
                            name="apellidoPaterno" 
                            placeholder="Ingrese apellido paterno"
                            value="<?php echo s($admin->apellidoPaterno);?>">
                    </div> 
                    <div class="campo">
                        <label for="apellidoM">Apellido Materno:</label>
                        <input 
                            type="text" 
                            id="apellidoM" 
                            name="apellidoMaterno" 
                            placeholder="Ingrese apellido materno"
                            value="<?php echo s($admin->apellidoMaterno);?>">
                    </div> 
                    <div class="campo">
                        <label for="corroe">Correo: </label>
                        <input 
                            type="text" 
                            id="correo" 
                            name="correo" 
                            placeholder="Ingrese un correo"
                            value="<?php echo s($admin->correo);?>">
                    </div>
                    <div class="campo">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" id="password" name="password" placeholder="Ingrese la contraseña">
                    </div>     
                    <div class="campo">
                        <label for="password2">Confirma contraseña:</label>
                        <input type="password" id="password" name="password2" placeholder="Ingrese la contraseña">
                    </div>
                    <div class="opciones">
                        <button class="boton" type="submit">Agregar</button>
                    </div>
                </form>
            
        </div>
        </div>
    </div>

    
</div>