<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>

<p>Cuanto quiero aportar:</p>
<div id="donaciones" >
    <div id="donar">25 euros</div>
    <div id="donar">30 euros</div>
    <div id="donar">50 euros</p></div>
    <div >Otra cantidad
            <input type="text" id="precioDI"></input>
        </div>
</div>

<p id="titulo_causa">SELECIONA LA CAUSA</p>
<select name="titleD" id="titleD">
  <option value="Senegal">Senegal</option>
  <option value="Venezuela" >venezuela</option>
  <option value="Rusia">Rusia</option>
</select>
<br>
<br>

<input  id="BTN-BTNContinuar" TYPE="submit" NAME="Continuar" VALUE="Continuar">

<br>
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