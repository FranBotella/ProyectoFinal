<?php ob_start() ?>


<div id=$postId class=blog>";
<a class=tituloblog >$postTitulo </a>";
        
<img class=imagenesEve src=./img/root/$postImagen></img>";
<p>$postContenido</p>";
</div>";




        <?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>