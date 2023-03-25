<?php
ob_start();

foreach ($params['nombreAlimento'] as $alimento) :
?>

					
						<h1 class="p-2"><?php echo $alimento['nombre']?></h1>
						


<?php
endforeach;
$contenido = ob_get_clean();
include 'layout.php' ?>