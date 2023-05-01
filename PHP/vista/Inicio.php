<?php ob_start() ?>


<!-- 
carrusel -->

  <div id="demo" class="carousel slide " data-bs-ride="carousel" tabindex="1">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" aria-label="boton para primera imagen" role="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" aria-label="boton para segunda imagen" role="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" aria-label="boton para tercer imagen" role="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id="imgCarruselInicio" src="./img/root/263.jpg" alt="niñosSenegal1" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/root/400.jpg" alt="niñosSenegal2" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/root/IMG_20150315_144911.jpg" alt="niñosSenegal3" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/root/129.jpg" alt="niñosSenegal4" class="d-block w-100">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button  role="button" aria-label="boton lado izquierdo para pasar imagen" class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button role="button" aria-label="boton lado derecho para pasar imagen" class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>


<footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<div id="textoFooter">
			<p>Contáctanos</p>
	<p tabindex="2">Asociación GUP

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p tabindex="3">

Teléfono 616420909

</p>
<p tabindex="4">

asociaciongup@hotmail.es



</p>
<a tabindex="5" role="link" aria-label="enlace a su pagina de facebook" href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a tabindex="6" role="link" aria-label="enlace a su pagina de instagram" href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
</div>
			</div>
		
		</div>
	</div>
	</footer>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>