<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>

<form  id="formulario" method="POST" action="index.php?ctl=tienda">
<div class="categorias" id="categorias"> 
                <a  class="genres" id="Ropa">Ropa</a>
                <a  class="genres" id="Bolsos">Bolsos</a>
                <a  class="genres" id="Estuches">Estuches</a>
                <a   class="genres" id="Artesania">Artesania</a>
                <a class="genres" id="Visuteria">Visuteria</a>
                
                </div>
    
                </form>
  
    <div id="borrar">

<?php

 if(isset($_POST['valorSesion'])){
    
$generoEscogido=$_POST['valorSesion'];
$tiempo=0;
for ($i=0; $i <=$productosContador ; $i++) { 
    try {
        $post2 = new Usuarios();
       
        $postValidar = $post2->  getIdProductoValidar($i,$generoEscogido);
        while($postValidar==0){
            $i++ ;
            $postValidar = $post2->  getIdProductoValidar($i,$generoEscogido);
            $tiempo++;
            if($tiempo==500){
            break;
            }
          }

          
        if($postValidar==1){
            $postProducto = $post2-> getTituloProducto($i,$generoEscogido);
            $productoId = $post2->getIdProducto($i,$generoEscogido);
            $productoContenido = $post2-> getContenidoProducto($i,$generoEscogido);
        $productoImagen = $post2-> getImagenProducto($i,$generoEscogido);
        $precioProducto = $post2->  getprecioProducto($i,$generoEscogido); 
        echo "<form  ACTION='index.php?ctl=carrito' METHOD='post' >";
        echo " <table id=$productoId class=tabla_tienda>";
        echo "<tr>";
        echo "<td><input type='hidden' name='idProducto' value='$productoId' ></input></td>";
        echo "</tr>";
        echo " <tr>";
        echo " <th><input type='text' name='tituloProducto' value='$postProducto' readonly></input></th> ";
        echo " </tr>";
       echo " <tr>";
       echo " <th><img class=imagenesEve src=./img/root/$productoImagen></img></th>";
       echo "</tr>";
       echo " <tr>";
       echo "<th>$productoContenido</th>";
       echo " </tr>";
       echo " <tr>";
       echo "<th>Precio</th>";
       echo "<th><input type='number' name='precioProducto' value='$precioProducto' readonly></input></th>";
       echo "  </tr>";
       echo "<tr>";
       echo "<th>Cantidad</th>";
       echo "<th><input type='number' name='cantidadP' ></input></th>";
       echo "</tr>";
       echo "<tr>";
       echo "<th><input   TYPE='submit' NAME='bProducto' VALUE='Añadir'></th>";
       echo " </table>";
       echo "</form>";
        }
    


    
       
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
     
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
    }

}

}
?>
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