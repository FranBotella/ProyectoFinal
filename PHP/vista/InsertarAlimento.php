<?php ob_start(); ?>

<div class="container text-center py-2">
	<div class="col-md-12">
			<?php if(isset($params['mensaje'])) :?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $params['mensaje'] ?></span></b>
			<?php endif; ?>
	</div>
</div>

<div class="col-md-12">
			<?php foreach ($errores as $error) {?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $error."<br>"; ?></span></b>
			<?php } ?>
</div>

<div class="container-fluid text-center">
	<div class="container">
		<form ACTION="index.php?ctl=insertarA" METHOD="post">
           
			<p>* <input TYPE="text" NAME="nombre" PLACEHOLDER="Nombre"><br></p>
			<p>* <input TYPE="text" NAME="energia" PLACEHOLDER="Energia"><br></p>
			<p>* <input TYPE="text" NAME="proteina" PLACEHOLDER="Proteina"><br></p>
			<p>   <input TYPE="text" NAME="hidratocarbono" PLACEHOLDER="Hidratocarbono"><br></p>
            <p>   <input TYPE="text" NAME="fibra" PLACEHOLDER="Fibra"><br></p>	
            <p>   <input TYPE="text" NAME="grasatotal" PLACEHOLDER="Grasatotal"><br></p>
			<input TYPE="submit" name="bInsertarA" VALUE="Aceptar" PLACEHOLDER="Nombre de Aliemnto><br>
		</form>
	</div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>