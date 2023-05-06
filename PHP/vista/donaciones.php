<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>



<div id="D">

<div id="demo2" class="carousel slide " data-bs-ride="carousel" tabindex="1">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button aria-label="boton primera imagen" role="button" type="button" data-bs-target="#demo2" data-bs-slide-to="0" class="active"></button>
  <button aria-label="boton segunda imagen" role="button" type="button" data-bs-target="#demo2" data-bs-slide-to="1"></button>
  <button aria-label="boton tercera imagen" role="button" type="button" data-bs-target="#demo2" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img id="imgCarruselDonaciones" src="./img/root/098.jpg" alt="niñosSenegal1" class="d-block w-100">
  </div>
  <div class="carousel-item">
    <img id="imgCarruselDonaciones" src="./img/root/108.jpg" alt="niñosSenegal2" class="d-block w-100">
  </div>
  <div class="carousel-item">
    <img id="imgCarruselDonaciones" src="./img/root/400.jpg" alt="niñosSenegal3" class="d-block w-100">
  </div>

</div>

<!-- Left and right controls/icons -->
<button aria-label="boton izquierda pasar imagen" role="button" class="carousel-control-prev" type="button" data-bs-target="#demo2" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button aria-label="boton derecho pasar imagen" role="button" class="carousel-control-next" type="button" data-bs-target="#demo2" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>
<!-- 
solo funcionara el bootn de continuar se se ha seleccionado cuanto se va a donar y a que causa 
sino no se despliega el dialogo para confirmar el pay pal  -->

<br>
<div id="donaciones" >
    <div id="donar" tabindex="2" aria-label="25 euros">25 euros</div>
    <div id="donar" tabindex="3"  aria-label="30 euros">30 euros</div>
    <div id="donar" tabindex="4"   aria-label="50 euros">50 euros</p></div>
    <div >Otra cantidad
            <input tabindex="5" type="number" id="precioDI" aria-label="introdducir cantidad"></input>
        </div>
</div>
<div id="divCausa">
<p id="titulo_causa" tabindex="6">SELECIONA LA CAUSA</p>
<select name="titleD" id="titleD">
  <option role="option" value="Comedor Social">Comedor Social San José de Benimaclet</option>
  <option  role="option" value="Albert Ballerini" >"Albert Ballerini"(Senegal)</option>
  <option role="option" value="Asociacion" >Asociacion</option>
</select>
<br>
<br>

<input tabindex="7" id="BTN-BTNContinuar" TYPE="submit" NAME="Continuar" VALUE="Continuar">
</div>
<br>
</div>
<!-- ventana dialogo -->
<dialog id="modal">
<form method="dialog"  id="formModal">

    <label><?php echo $_SESSION["user"] ?></label>
    <br>
    <label>Tu correo<p ><?php echo $_SESSION["email"]?></p></label>
    <br>
    <label>Cantidad <p id="CDonada"></p>euros</label>
    
    <label>Destinado a : <p id="CCausa"></p></label>
    

    <!-- paypal -->
    <div id="paypal-button-container">
      
    </div>
    <button role="button" id="btn-cerrar-modal" type="submit">Cerrar</button>
    
</form>
</dialog>

<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p>Contáctanos</p>
	<p tabindex="8">Asociación GUP

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p tabindex="9">

Teléfono 616420909

</p>
<p tabindex="10">

asociaciongup@hotmail.es



</p>
<a tabindex="11" role="link" aria-label="enlace a su pagina de facebook" href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a tabindex="12" role="link" aria-label="enlace a su pagina de instagram" href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
    <a href="index.php?ctl=politicas_de_privacidad" tabindex="13" role="link">POLITICAS DE PRIVACIDAD</a>
  </div>
			</div>
		
		</div>
	</div>
	</footer>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>