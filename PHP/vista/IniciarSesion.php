<?php ob_start() ?>
	
	<!-- <div class="container text-center p-4">
		<div class="col-md-12" id="cabecera">
			<h1 class="h1Inicio">Iniciar</h1>
		</div>
	</div> -->
	
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
		<form id="formuRegistro" ACTION="index.php?ctl=iniciarSesion" METHOD="post" NAME="formIniciar">
		<br>	
		<p>Usuario</p>
		<p>* <input TYPE="text" NAME="user" VALUE="<?php echo $params['user'] ?>" PLACEHOLDER="usuario"> <br></p>
		<p>Contraseña</p>
		<i>Minimo 5 caracteres</i>	
		<p>* <input id="password2" TYPE="password" NAME="pass" VALUE="<?php echo $params['pass'] ?>" PLACEHOLDER="Contraseña"><br></p>
		<input type="button" id="ojo2" value="Mostrar/ocultar contraseña"></input>
			<div id="BTNregistro">
				<div class="botones">
					<div >
					<p>¿No tienes cuenta?</p>
					<p><a href="index.php?ctl=registro">Registrarse</a></p>
					</div>
					<input  id="BTN-BTNregistro" TYPE="submit" NAME="bIniciarSesion" VALUE="Iniciar Sesión"><br>
				
				</div>
			</div>
			
		</form>
		
	</div>
	<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<img id="socialMedia"  src="./img/facebook.png" ></img>
			<img  id="socialMedia"  src="./img/instgram3.png" ></img>
			</div>
		</div>
	</div>
	</footer>
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>