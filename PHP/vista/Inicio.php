<?php ob_start() ?>
<div class="row">
<img id="imgInicio"  class="col-sm-6" src="./img/prueba.jpg"></img>
<p class=" col-sm-6"  ><?php echo $params['descripcion'] ?></p>
   
  </div>

<!-- <h3 class="text-center"><b><?php// echo $params['fecha'] ?></b></h3><br>  

<h3 class="text-center"><b><?php// echo $params['mensaje'] ?></b></h3><br>

<h4 class="text-center"><?php // echo $params['mensaje2'] ?></h4><br> -->

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>