<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>
<?php
$estado="pendiente";
try {
    $post = new Usuarios();
        
        $idUsu= $post->getIDUser($_SESSION["user"]);
        // $TituloPC= $post->getTituloProductoCarrito($idUsu, $estado);
       $productosCarrito= $post->getCarrito($idUsu, $estado);
        // $PrecioPC= $post->getPrecioProductoCarrito( $idUsu, $estado);
        // $CantidadPC= $post->getCantidadProductoCarrito( $idUsu, $estado);
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
        // save errors
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
    }

// $precioTotal=0;
echo "<form id='formuInsertar' ACTION='index.php?ctl=insertarP' METHOD='post' NAME='formInsertar'>";
echo "<input type='submit' class='buttonForm' name='insertar' value='insertar' />";
echo "</form>";
    echo "<form id='carritoFORM'  ACTION='index.php?ctl=carrito' METHOD='post' >";
    foreach (  $productosCarrito as $arrayC) {
      $TituloPC1=  $arrayC["tituloProducto"];
      $PrecioPC1 = $arrayC["precio"];
      $CantidadPC1=  $arrayC["cantidad"];

       
      
   
        echo " <input type='text' name='tituloProductoCarrito' value='$TituloPC1' readonly></input> ";
     
     echo "<br>";
       echo "<p>Precio</p>";
      
       echo "<p>$PrecioPC1</p>";
       echo "<br>";
       echo "<p>Cantidad</p>";
       echo "<input type='number' name='cantidadPCarrito' class='cantidadCarrito' value='$CantidadPC1' ></input>";
       echo "<br>";
       echo "<input   TYPE='button' NAME='BCarrito' class='BCarrito' VALUE='QuitarProducto'>";


    //   $precioTotal=$precioTotal+($CantidadPC1*$PrecioPC1);
      
    }
    echo "<p id='CTOTAL'  ></p>";
    echo "<input   TYPE='submit' NAME='bCarrito' id='bCarrito1' VALUE='Confirmar'>";

 
   
    echo "</form>";






    echo "<form id='carritoFORM2'  ACTION='index.php?ctl=borrarElementoCarrito' METHOD='post' >";
    

     
      
    echo "<input   TYPE='submit' NAME='bCarrito' id='bCarrito2' VALUE='borrar'>";

 
   
    echo "</form>";



?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>