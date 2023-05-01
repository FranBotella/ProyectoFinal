<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>
<!-- seleccionas por generos y se despliega los obejtos que se han guardado en la base de datos -->
<form  id="formulario" method="POST" action="index.php?ctl=tienda">
<div class="categorias" id="categorias"> 
                <a role="link" class="genres" id="Ropa" tabindex="1" aria-label="Categoria Ropa" >Ropa</a>
                <a role="link" class="genres" id="Bolsos" tabindex="2" aria-label="Categoria Bolsos"  >Bolsos</a>
                <a  role="link" class="genres" id="Estuches" tabindex="3" aria-label="Categoria Estuches"  >Estuches</a>
                <a  role="link"  class="genres" id="Artesania" tabindex="4" aria-label="Categoria Artesania" >Artesania</a>
                <a role="link" class="genres" id="Visuteria" tabindex="5" aria-label="Categoria Visuteria"  >Visuteria</a>
                
                </div>
    
                </form>
  <br>
    <div id="borrar">

<?php
// botones administrador para insertar porductos,eliminarlos y cambiar precio a productos
 if( $nivel==1){
echo "<div id='botonesAdminTienda'>";
echo "<form id='formuInsertar' ACTION='index.php?ctl=insertarProducto' METHOD='post' NAME='formInsertar'>";
echo "<input type='submit' class='buttonForm' name='insertar' value='insertar' />";
echo "</form>";
echo "<form id='formuEliminar' ACTION='index.php?ctl=eliminarProducto' METHOD='post' NAME='formEliminar'>";
echo "<input type='submit' class='buttonForm' name='eliminar' value='eliminar' />";
echo "</form>";
echo "<form id='formuEditar' ACTION='index.php?ctl=editarPrecioProducto' METHOD='post' NAME='formEditar'>";
echo "<input type='submit' class='buttonForm' name='eliminar' value='editarPrecio' />";
echo "</form>";
echo "</div>";
 }
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
        echo "<br>";
        echo "<form class='tiendaForm' ACTION='index.php?ctl=insertarElementoCarrito' METHOD='post' >";
        echo " <table id=$productoId class=tabla_tienda>";
        echo "<tr>";
        echo "<td><input type='hidden' name='idProducto' value='$productoId' ></input></td>";
        echo "</tr>";
        echo " <tr>";
        echo " <th><input type='text' name='tituloProducto' class='tituloProductoTienda' value='$postProducto' readonly></th> ";
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
       echo "<th><input   TYPE='submit' NAME='bProducto' class='Añadir' VALUE='Añadir'></th>";
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
			<div id="textoFooter">
			<p  >Contáctanos</p>
	<p tabindex="6">Asociación GUP

C/ Ntra. Sra. de la Asunción, 2.   46020 Valencia

</p>
<p tabindex="7">

Teléfono 616420909

</p>
<p tabindex="8">

asociaciongup@hotmail.es



</p>
<a tabindex="9" role="link" aria-label="Enlace a facebook"   href="https://www.facebook.com/asociaciongup/?locale=es_ES"><img id="socialMedia"  src="./img/facebook.png" ></img></a>
		<a tabindex="10" role="link" aria-label="Enalce a Instagram"  href="https://www.instagram.com/asociaciongup/?hl=es">	<img  id="socialMedia"  src="./img/instgram3.png" ></img></a>
</div>
			</div>
		
		</div>
	</div>
	</footer>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>