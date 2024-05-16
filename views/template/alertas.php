<?php 
    foreach($alertas as $key => $mensajes):
        foreach($mensajes as $mensaje):
?>
    <div class="alerta <?php echo $key; ?> ">
            <?php echo $mensaje;?>
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.alerta.<?php echo $key; ?>').style.display = 'none';
        }, 5000); // Desaparecer después de 5 segundos (5000 milisegundos)
    </script>
<?php
        endforeach;
    endforeach;
?>