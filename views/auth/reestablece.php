<div class="inicio">
    <h1 class="titulo">BUAP <span>FCC</span> </h1>
    <h2>Reestablecer password</h2>
    <p>Ingresa password nueva</p>
    <div class="contenedor-inicio">
        <?php 
            include_once __DIR__ . "/../template/alertas.php"
        ?>

        <?php
            if($error) return;
        ?>
        <form class="formulario"  method="POST">
            <div class="campo">
                <label for="password">Password:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Ingrese su password"
                >
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