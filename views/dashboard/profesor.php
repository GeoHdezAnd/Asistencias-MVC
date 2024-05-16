<div class="dashboard">
    <?php include_once __DIR__ . '/../template/sidebar.php'?>
    <div class="principal">
        <?php include_once __DIR__ . '/../template/barra.php' ?>
        <div class="admin">
            <h3>¡Bienvenido a profesores!</h3>
            <div class="menu-regresar">
                <a class="boton" href="/index">Regresar</a>
            </div>
            
            <div class="registro">
            
                <div class="acciones-registro">
                    <a class="boton-registro boton" href="/agregar-profesor">Agregar</a>
                    <div class="buscador">
                        <input class="buscador-input" type="search" name="serch" id="search" placeholder="Buscar">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="32" height="32" viewBox="0 0 24 24" stroke-width="3" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                            </svg>
                    </p>
                    </div>
                
                </div>
            
                <table class="tabla">
                    <thead class="encabezado">
                        <th>Nombre</th>
                        <th>Apellido P</th>
                        <th>Apellido M</th>
                        <th>Clave</th>
                        <th>Telefono</th>
                        <th>Operaciones</th>
                    </thead>
                    <tbody id="profesores">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</div>

<?php 
    $script = "
        <script src='build/js/app.js'></script>    
    ";
?>