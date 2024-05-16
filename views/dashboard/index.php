<div class="dashboard">
    <?php include_once __DIR__ . '/../template/sidebar.php'?>
    <div class="principal">
        <?php include_once __DIR__ . '/../template/barra.php' ?>
        <div class="menu">
        <h3>¡Bienvenido a usuarios!</h3>
        <p>Selecciona el tipo de usuario que desees consultar</p>
        <div class="fichas-usuarios">
            <div class="ficha">
                <h4>Administradores</h4>
                <img class="imagen" src="/build/img/administrador.png" alt="administrador">
                <a class="boton" href="/administrador">Ver</a>
            </div>
            <div class="ficha">
                <h4>Alumnos</h4>
                <img class="imagen" src="/build/img/alumno.png" alt="alumno">
                <a class="boton" href="/alumno">Ver</a>
            </div>
            <div class="ficha">
                <h4>Maestros</h4>
                <img class="imagen" src="/build/img/profesor.png" alt="maestros">
                <a class="boton" href="/profesor">Ver</a>
            </div>
        </div>
        </div>
    </div>

    
</div>