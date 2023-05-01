<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>
<?php
$estado="pendiente";
try {
    $post = new Usuarios();
        
        $idUsu= $post->getIDUser($_SESSION["user"]);
       
       $productosCarrito= $post->getCarrito($idUsu, $estado);
    
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
        // save errors
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
    }


echo "<div id='formularios'>";
    echo "<form id='carritoFORM' name='carritoForm' ACTION='index.php?ctl=carrito' METHOD='post' >";

    foreach (  $productosCarrito as $arrayC) {
      $TituloPC1=  $arrayC["tituloProducto"];
      $PrecioPC1 = $arrayC["precio"];
      $CantidadPC1=  $arrayC["cantidad"];

       
      echo "<div>";
   
        echo " <input type='text' name='tituloProductoCarrito' value='$TituloPC1' readonly></input> ";
     
     echo "<br>";
       echo "<p>Precio</p>";
      
       echo "<p>$PrecioPC1</p>";
       echo "<br>";
       echo "<p>Cantidad</p>";
       echo "<input type='number' name='cantidadPCarrito' class='cantidadCarrito' value='$CantidadPC1' ></input>";
       echo "<br>";
    //    al pulsar este boton y al confirmar la compra se borrara el productoi elegido y se volvera al carrito por si quisieras borrar alguno mas 
       echo "<input   TYPE='button' NAME='BCarrito' class='BCarrito' VALUE='QuitarProducto'>";
      
       echo "</div>";
       echo "<br>";


      
    }
    // calcula el total del carrito de la compra 
    echo "<p id='CTOTAL'  ></p>";
    echo "<input TYPE='text' name='elementoseleccionado' id='elementoseleccionado' value='' hidden></input>";
    echo "<input   TYPE='submit' NAME='bCarrito' id='bCarrito1' VALUE='Confirmar'>";

 
   
    echo "</form>";







//     echo "<form id='carritoFORM2' name='carritoForm2'  ACTION='index.php?ctl=borrarElementoCarrito' METHOD='post' >";
    

     
      
//     echo "<input   TYPE='submit' NAME='bCarrito2' id='bCarrito2' VALUE=''>";

 
   
//     echo "</form>";
echo "</div>";


?>
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