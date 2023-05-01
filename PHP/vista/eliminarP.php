<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>



<div class="div-perfil container text-center p-1">
        <form id="eliminarForm" action="index.php?ctl=eliminarP" method="post" enctype="multipart/form-data">
            <div class="div-atr">
                
            <p>titulo</p>
			<p>* <input  TYPE="text" NAME="titulo" VALUE="" PLACEHOLDER="titulo"> <br></p>
            
                <br>
                <input  id="BTN-BTNregistro" TYPE="submit" NAME="bEliminar" VALUE="eliminar"><br>
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
   
</body>
 
</html>






<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>