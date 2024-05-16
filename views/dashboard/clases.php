<div class="dashboard">
    <?php include_once __DIR__ . '/../template/sidebar.php'?>
    <div class="principal">
        <?php include_once __DIR__ . '/../template/barra.php' ?>
        <div class="admin">
            <h3>¡Bienvenido a clases!</h3>
            <p>Aqui puedes encontrar las clases que existen</p>
            <div class="registro">
            
                <div class="acciones-registro">
                    <a class="boton-registro boton" href="/agregar-clase">Agregar</a>
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
                        <th>NRC</th>
                        <th>CLAVE</th>
                        <th>NOMBRE</th>
                        <th>SECC</th>
                        <th>MAESTRO</th>
                        <th>CLAVE MAESTRO</th>
                        <th>SALON</th>
                        <th>OPERACIONES</th>
                    </thead>
                    <tbody>
                    <?php 
                            foreach( $clases as $clase ) {
                                if($idClase !== $clase->id) {
                        ?>
                        <tr>
                            <th> <?php echo $clase->nrc; ?> </th>
                            <th> <?php echo $clase->clave; ?> </th>
                            <th> <?php echo $clase->nombre; ?> </th>
                            <th> <?php echo $clase->secc; ?> </th>
                            <th> <?php echo $clase->profesor ?></th>
                            <th> <?php echo $clase->claveProfe ?></th>
                            <th> <?php echo $clase->salon ?></th>
                            <th class="operaciones"> 
                                <a href="/editar-clase?id=<?php echo $clase->id ?>">  
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="32" height="32" viewBox="0 0 24 24" stroke-width="3" stroke="#50b2c0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                </a>
                                <form action="/eliminar-clase" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $clase->id; ?>">
                                    <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-off" width="32" height="32" viewBox="0 0 24 24" stroke-width="3" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M3 3l18 18" />
                                        <path d="M4 7h3m4 0h9" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 14l0 3" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l.077 -.923" />
                                        <path d="M18.384 14.373l.616 -7.373" />
                                        <path d="M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                    </button>
                                    
                                </form>
                            </th>
                        <?php 
                            $idClase = $clase->id;
                        }
                        ?>
                        </tr>
                        <?php }       ?>
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