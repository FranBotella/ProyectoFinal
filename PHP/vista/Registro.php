<?php ob_start() ?>
	
	<div class="container text-center p-4">
		<div class="col-md-12" id="cabecera">
			<h1 class="h1Inicio">REGISTRARSE</h1>
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
		<form ACTION="index.php?ctl=registro" METHOD="post" NAME="formRegistro">
			<p>* <input TYPE="text" NAME="user" VALUE="<?php echo $params['user'] ?>" PLACEHOLDER="Nombre"> <br></p>
			<p>* <input TYPE="password" NAME="pass" VALUE="<?php echo $params['pass'] ?>" PLACEHOLDER="Contraseña"><br></p>
			<p>* <input TYPE="text" NAME="nivel" VALUE="<?php echo $params['nivel'] ?>" PLACEHOLDER="Nivel"><br></p>
			<p>* <input TYPE="text" NAME="email" VALUE="<?php echo $params['email'] ?>" PLACEHOLDER="email"><br></p>
			<p>* <input TYPE="text" NAME="ciudad" VALUE="<?php echo $params['ciudad'] ?>" PLACEHOLDER="Ciudad"><br></p>
			<input TYPE="submit" NAME="bRegistro" VALUE="Aceptar"><br>
		</form>
	</div>
		
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>