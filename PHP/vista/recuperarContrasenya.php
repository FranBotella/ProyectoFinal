<?php ob_start() ?>
<?php if($contrasenya==""){ ?>
<div class="container text-center p-1">
		<form id="formurecuperarContrasenya" ACTION="index.php?ctl=recuperarContrasenya" METHOD="post" NAME="formRecuperarContrasenya">
			<br>
			
			<p>Introducir Correo con el que te registrastes</p>
			<p>* <input TYPE="text" NAME="email" VALUE="" PLACEHOLDER="email"><br></p>
			<div id="BTNrecuperarContrasenya">
				
				
				<input id="BTN-BTNrecuperarContrasenya"  TYPE="submit" NAME="brecuperarContrasenya" VALUE="recuperarContrasenya"><br>
				</div>
			</div>
		</form>
	</div>
    <?php } ?>
    <?php if($contrasenya!=""){ ?>
        <div class="container text-center p-1">
        <form id="formurecuperarContrasenya" ACTION="index.php?ctl=recuperarContrasenya" METHOD="post" NAME="formRecuperarContrasenya">
        <p>Vuelve a introducir el correo</p>
			<p>* <input TYPE="text" NAME="email2" VALUE="" PLACEHOLDER="email"><br></p>

    <p>* <input TYPE="text" NAME="contraseñaNueva" VALUE="" PLACEHOLDER="contraseñaNueva"><br></p>
    <input id="BTN-BTNuevaContrasenya"  TYPE="submit" NAME="bNuevaContrasenya" VALUE="NuevaContrasenya"><br> 
    </form>  
    </div>
<?php }?>
<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p>Contáctanos</p>
	<p>Asociación GUP

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p>

Teléfono 616420909

</p>
<p>

asociaciongup@hotmail.es



</p>
<a  href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
</div>
			</div>
		
		</div>
	</div>
	</footer>
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>