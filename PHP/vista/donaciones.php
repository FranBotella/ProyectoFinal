<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>



<div id="D">

<div id="demo2" class="carousel slide " data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo2" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo2" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo2" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img id="imgCarruselDonaciones" src="./img/prueba.jpg" alt="Los Angeles" class="d-block w-100">
  </div>
  <div class="carousel-item">
    <img id="imgCarruselDonaciones" src="./img/prueba2.jpg" alt="Chicago" class="d-block w-100">
  </div>
  <div class="carousel-item">
    <img id="imgCarruselDonaciones" src="./img/prueba3.jpg" alt="New York" class="d-block w-100">
  </div>
  <div class="carousel-item">
    <img id="imgCarruselDonaciones" src="./img/prueba4.jpg" alt="New York" class="d-block w-100">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo2" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo2" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>



<p>Cuanto quiero aportar:</p>
<div id="donaciones" >
    <div id="donar">25 euros</div>
    <div id="donar">30 euros</div>
    <div id="donar">50 euros</p></div>
    <div >Otra cantidad
            <input type="text" id="precioDI"></input>
        </div>
</div>
<div id="divCausa">
<p id="titulo_causa">SELECIONA LA CAUSA</p>
<select name="titleD" id="titleD">
  <option value="Senegal">Senegal</option>
  <option value="Venezuela" >venezuela</option>
  <option value="Rusia">Rusia</option>
</select>
<br>
<br>

<input  id="BTN-BTNContinuar" TYPE="submit" NAME="Continuar" VALUE="Continuar">
</div>
<br>
</div>
<dialog id="modal">
<form method="dialog"  id="formModal">

    <label><?php echo $_SESSION["user"] ?></label>
    <br>
    <label>Tu correo<p ><?php echo $_SESSION["email"]?></p></label>
    <br>
    <label>Cantidad <p id="CDonada"></p>euros</label>
    
    <label>Destinado a : <p id="CCausa"></p></label>
    

    <!-- paypal -->
    <div id="paypal-button-container"></div>
    <button id="btn-cerrar-modal" type="submit">Cerrar</button>
    
</form>
</dialog>

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