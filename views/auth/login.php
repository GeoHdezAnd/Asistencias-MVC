<div class="inicio">
    <h1 class="titulo">BUAP <span>FCC</span> </h1>
    <h2>Iniciar sesión</h2>
    <p>Ingresa tus datos</p>
    <div class="contenedor-inicio">
        <?php 
            include_once __DIR__ . "/../template/alertas.php"
        ?>
        <form class="formulario" action="/login" method="post">
            <div class="campo">
                <label for="correo">Email:</label>
                <input 
                    type="text" 
                    id="correo" 
                    name="correo" 
                    placeholder="Ingrese su email"
                    value="<?php echo s($auth->correo); ?>">
            </div>
            <div class="campo">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su contraseña">
            </div>      
        <div class="opciones">
            <button class="boton" type="submit">Iniciar sesión</button>
        </div>
        
        </form>
        
        
    </div>
    <div class="acciones">
        <a href="/">Ir a inicio</a>
        <a href="/olvide">¿Olvidaste tu contraseña?</a>  
    </div>
    
</div>