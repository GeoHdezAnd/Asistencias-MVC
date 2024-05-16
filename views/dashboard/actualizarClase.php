<div class="dashboard">
    <?php include_once __DIR__ . '/../template/sidebar.php'?>
    <div class="principal">
        <?php include_once __DIR__ . '/../template/barra.php' ?>
        <div class="admin">
        <h3>¡Agregar una clase!</h3>
        <div class="menu-regresar">
                <a class="boton" href="/clases">Regresar</a>
                
        </div>
        
        <div class="contenedor-form">
                <p>Llena el siguiente formulario</p>

                <?php 
                    include_once __DIR__ . "/../template/alertas.php"
                ?>
                <form class="formulario" method="POST">
                    <div class="campo">
                        <label for="nombre">NRC:</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            maxlength="5"
                            name="nrc" 
                            placeholder="Ejemplo: 50875"
                            value="<?php echo s($clase->nrc);?>">
                    </div>
                    <div class="campo">
                        <label for="clave">Clave (ITIS-000):</label>
                        <input 
                            type="text" 
                            id="apellidoP"
                            maxlength="8" 
                            name="clave" 
                            placeholder="Ejemplo: ITIS-252"
                            value="<?php echo s($clase->clave);?>">
                    </div> 
                    <div class="campo">
                        <label for="nombre">Nombre:</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre" 
                            placeholder="Ejemplo: Calculo diferencial"
                            value="<?php echo s($clase->nombre);?>">
                    </div> 
                    <div class="campo">
                        <label for="secc">Seccion (000): </label>
                        <input 
                            type="text" 
                            id="secc" 
                            maxlength="3"
                            name="secc" 
                            placeholder="Ejemplo: 101"
                            value="<?php echo s($clase->secc);?>">
                    </div>
                    <div class="campo">
                        <label for="profesor">Profesor:</label>
                        <select name="id_profesor" id="">
                        <option value="" disabled selected
                            >--Selecciona profesor--</option>
                            <option value="1">Elvira Roberto Enriquez</option>
                            <option value="2">Gustavo Mendoza Olguin</option>
                            <option value="3">Josefina Guerrero Garcia</option>
                        </select>
                    </div>     
                    <div class="campo">
                        <label for="salon">Salon (edificio/salon): </label>
                        <input 
                            type="text" 
                            id="salon" 
                            maxlength="10"
                            name="salon" 
                            placeholder="Ejemplo: 1CC04/304"
                            value="<?php echo s($clase->salon);?>">
                    </div>
                    <div class="opciones">
                        <button class="boton" type="submit">Actualizar</button>
                    </div>
                </form>
            
        </div>
        </div>
    </div>

    
</div>