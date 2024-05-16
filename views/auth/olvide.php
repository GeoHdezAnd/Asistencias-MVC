<div class="inicio">
    <h1 class="titulo">BUAP <span>FCC</span> </h1>
    <h2>Olvide password</h2>
    <p>Ingresa email para enviar formulario</p>
    <div class="contenedor-inicio">
        <?php 
            include_once __DIR__ . "/../template/alertas.php"
        ?>
        <form class="formulario" action="/olvide" method="post">
            <div class="campo">
                <label for="correo">Email:</label>
                <input 
                    type="text" 
                    id="correo" 
                    name="correo" 
                    placeholder="Ingrese su email"
                    value="<?php echo s($auth->correo); ?>">
            </div>
        <div class="opciones">
            <button class="boton" type="submit">Enviar formulario</button>
        </div>
        
        </form>
        
        
    </div>
    <div class="acciones">
        <a href="/">Ir a inicio</a>
        <a href="recuperar-contrasena">¿Olvidaste tu contraseña?</a>  
    </div>
    
</div>