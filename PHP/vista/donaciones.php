<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>

<p>Cuanto quiero aportar:</p>
<div id="donaciones" >
    <div id="donar"><p>25 euros</p></div>
    <div id="donar"><p>30 euros</p></div>
    <div id="donar"><p>50 euros</p></div>
    <div id="donar"><p>Otra cantidad</p>
            <input type="text"></input>
        </div>
</div>
<p>SELECIONA LA CAUSA</p>
<select name="titleD">
  <option value="Senegal">Senegal</option>
  <option value="Venezuela" >venezuela</option>
  <option value="Rusia">Rusia</option>
</select>
<br>
<br>
<input  id="BTN-BTNregistro" TYPE="submit" NAME="Continuar" VALUE="Continuar"><br>
<dialog id="modal">
<form method="dialog" >
    <label><?php echo $_SESSION["user"] ?></label>
    <label>Tu correo<input type="text" value="<?php echo $_SESSION["email"] ?>"></label>
    <button type="submit">Enviar<
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