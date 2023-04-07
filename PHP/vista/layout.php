
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>tienda-virtual</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />
<link rel="stylesheet" href="css/normalizar.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- paypol -->
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $_SESSION['clienteid'] ?>&currency=USD"></script>
 

</head>

<body>




<?php	
	if (!isset($menu)) {
	    $menu = 'menuInvitado.php';
	}
	include $menu;
	
    ?>


<div id="body">
    
 <!-- <div class="container-fluid  "> -->
		<div > 
			<div class=" pt-2" id="contenido">
			<?php echo $contenido ?>
			</div>
		 </div>
	<!-- </div> -->

		
	</div>

<!-- <footer>
<div  class=" pie ">
		<div  >
			<div class="prueba">
			<img id="socialMedia"  src="./img/facebook.png" ></img>
			<img  id="socialMedia"  src="./img/instgram3.png" ></img>
			</div>
		</div>
	</div>
	</footer> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../JS/functiones.js"></script>
</body>
</html>