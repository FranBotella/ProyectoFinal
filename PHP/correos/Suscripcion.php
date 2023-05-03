

<?php 
    $statusMsg  = !empty( $_SESSION [ 'msg' ])? $_SESSION [ 'msg' ]: '' ; 
    unset ( $_SESSION [ 'mensaje' ]); 
    echo  $statusMsg ; 
?>
<html>
    <head></head>
    <body>
<form ACTION="index.php?ctl=enviarSuscripcion" METHOD="post" >
    <p><label>NOMBRE:</label><input type="text" name="fname"PLACEHOLDER="nombre"></input></p>
    
    <p><label>Apellido:</label><input type="text"name="nombre"PLACEHOLDER="apellido"></input></p>
    
    <p><label>Correo:</label><input type="text"name="correo_electrónico" PLACEHOLDER="correo"></input></p>
    
<p><input type="submit"  name="submit" value="Suscribirse" /></p>
</form>
<body>
</html>




