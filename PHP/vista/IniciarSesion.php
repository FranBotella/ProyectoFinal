<?php ob_start() ?>
	
	<div class="container text-center p-4">
		<div class="col-md-12" id="cabecera">
			<h1 class="h1Inicio">Iniciar</h1>
		</div>
	</div>
	
	<div class="container text-center py-2">
		<div class="col-md-12">
			<?php if(isset($params['mensaje'])) :?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $params['mensaje'] ?></span></b>
			<?php endif; ?>
		</div>
		<div class="col-md-12">
			<?php foreach ($errores as $error) {?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $error."<br>"; ?></span></b>
			<?php } ?>
		</div>
	</div>
	
	<div class="container text-center p-1">
		<form ACTION="index.php?ctl=iniciarSesion" METHOD="post" NAME="formIniciar">
			<p>* <input TYPE="text" NAME="user" VALUE="<?php echo $params['user'] ?>" PLACEHOLDER="Nombre"> <br></p>
			<p>* <input TYPE="password" NAME="pass" VALUE="<?php echo $params['pass'] ?>" PLACEHOLDER="Contraseña"><br></p>
			<input TYPE="submit" NAME="bIniciarSesion" VALUE="Aceptar"><br>
		</form>
	</div>
		
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>