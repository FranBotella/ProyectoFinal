<?php
ob_start();

foreach ($params['Alimentos'] as $alimento) :
?>

					
		<h1 class="p-2"><?php echo $alimento['nombre']?></h1>
		<p class="p-2"><?php echo "-ENERGIA".$alimento['energia']?></p>				
        <p class="p-2"><?php echo "-PROTEINA".$alimento['proteina']?></p>	
        <p class="p-2"><?php echo "-HIDRATOCARBONO".$alimento['hidratocarbono']?></p>
        <p class="p-2"><?php echo "-GRASATOTAL".$alimento['grasatotal']?></p>
<?php
endforeach;
$contenido = ob_get_clean();
include 'layout.php' ?>