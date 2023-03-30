<?php ob_start() ?>
	
	<!-- <div class="container text-center p-4">
		<div class="col-md-12" id="cabecera">
			<h1 class="h1Inicio">REGISTRARSE</h1>
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
	<!-- <div> -->
	<!-- <form  ACTION="index.php?ctl=enviarCodigo" METHOD="post" NAME="formcodigo"> -->

	<!-- <p>EmailCodigo</p>
			<p>* <input TYPE="text" NAME="emailCodigo" VALUE="
			<?php 
			// echo $params['email']
			 ?>
			" PLACEHOLDER="email"><br></p> -->

	<!-- <input  class="col-sm-6" TYPE="submit" NAME="benviarCodigo" VALUE="ENVIAR"><br>
			</form>
	</div>


	<form   METHOD="post" NAME="formcodigo"> -->
		
		<!-- <p>Codigo</p>
				<p>* <input TYPE="text" NAME="Codigo" VALUE="<?php
				//  echo $params['email']
				  ?>" PLACEHOLDER="codigo"><br></p>
	
		<input  class="col-sm-6" TYPE="submit" NAME="bverificar" VALUE="VERIFICAR"><br>
				</form>
		</div> -->
		
	
	<div class="container text-center p-1">
		<form id="formuRegistro" ACTION="index.php?ctl=registro" METHOD="post" NAME="formRegistro">
			<br>
			<p>Usuario</p>
			<p>* <input  TYPE="text" NAME="user" VALUE="<?php echo $params['user'] ?>" PLACEHOLDER="Usuario"> <br></p>
			<p>Contraseña</p>
			<i>Minimo 5 caracteres</i>
			<p>* <input id="password" TYPE="password" NAME="pass" VALUE="<?php echo $params['pass'] ?>" PLACEHOLDER="Contraseña"><br></p>
		<input type="button" id="ojo" value="Mostrar/ocultar contraseña"></input>
			<p>Email</p>
			<p>* <input TYPE="text" NAME="email" VALUE="<?php echo $params['email'] ?>" PLACEHOLDER="email"><br></p>
			<div id="BTNregistro">
				<div class="row">
					<div class="col-sm-6">
					<p>¿Ya tienes cuenta?</p>
					
					<p><a href="index.php?ctl=iniciarSesion">IniciarSesion</a></p>
					</div>
				
				<input id="BTN-BTNregistro" class="col-sm-6" TYPE="submit" NAME="bRegistro" VALUE="Registrarse"><br>
				</div>
			</div>
		</form>
	</div>
		
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>