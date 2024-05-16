<div class="dashboard">
    <?php include_once __DIR__ . '/../template/sidebar.php'?>
    <div class="principal">
        <?php include_once __DIR__ . '/../template/barra.php' ?>
        <div class="mensaje">
            <h1>Confirmar Cuenta</h1>
            <?php 
                include_once __DIR__ . "/../template/alertas.php"
            ?>
            <div class="acciones">
                <a href="/login">Iniciar sesión</a>
                <a href="/index">Salir a dashboard</a>  
            </div>
        </div>
    </div>
</div>