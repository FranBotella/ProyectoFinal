<?php ob_start() ?>





  <div id="demo" class="carousel slide " data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id="imgCarruselInicio" src="./img/prueba.jpg" alt="Los Angeles" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/prueba2.jpg" alt="Chicago" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/prueba3.jpg" alt="New York" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img id="imgCarruselInicio" src="./img/prueba4.jpg" alt="New York" class="d-block w-100">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
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