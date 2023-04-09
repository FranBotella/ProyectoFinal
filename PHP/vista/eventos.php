<?php ob_start() ?>

<?php $contenido = ob_get_clean() ?>
<?php if( $nivel==1){?>
<form id="formuInsertar" ACTION="index.php?ctl=insertarP" METHOD="post" NAME="formInsertar">
<input type="submit" class="buttonForm" name="insertar" value="insertar" />
</form>
<?php }?>
<div id="borrar">
<?php



for ($i=0; $i <=$postContador ; $i++) { 
    try {
        $post2 = new Usuarios();
        $postValidar = $post2->  getIdPostValidar($i);
        if($postValidar==true){
            $postTitulo = $post2-> getTitulo($i);
            $postId = $post2->getIdPost($i);
        $postContenido = $post2-> getContenido($i);
        $postImagen = $post2-> getImagen($i);
        echo "<div id=$postId class=blog>";
        echo "<a class=tituloblog >juan alberto </a>";
        echo "<img class=imagenesEve src=./img/prueba.jpg></img>";
        echo "<p>$postContenido</p>";
        echo "</div>";
        }
       
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
       
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
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