<?php

class Controller {



    public function cargaMenu (){
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1 && $_SESSION["carritolleno"]!="lleno") {
            return 'menuUser.php';
        }
        else if ($_SESSION['nivel_usuario'] == 1 && $_SESSION["carritolleno"]=="lleno") {
            return 'menuUserCarro.php';
        }
        else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }

    }






    public function home() {
               
        $params = array(
            'mensaje' => 'Bienvenido a mercadona',
            'mensaje2' => 'Aquí encontrarás una gran variedad de alimentos xd',
            'fecha' => date('d-m-Y')
        );        
        $menu = 'menuInvitado.php';
        if ($_SESSION['nivel_usuario'] >=0) {
            header("location:index.php?ctl=inicio");
        }
      
        require __DIR__ . '/../vista/vista.php';
    }


    public function inicio() {
        
        
        $params = array(
            'descripcion'=> 'Pequeña descripcion',
            'mensaje' => 'Bienvenido a Inicio',
            'mensaje2' => 'Aquí encontrarás Tu inicio',
            'fecha' => date('d-m-Y')
        );        
      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/Inicio.php';
    }



    public function informacion() {

        
        $params = array(
            'descripcion'=> 'Pequeña descripcion',
            'mensaje' => 'Bienvenido a Inicio',
            'mensaje2' => 'Aquí encontrarás Tu inicio',
            'fecha' => date('d-m-Y')
        );        
      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/informacion.php';
    }


    public function donaciones() {
        
        $_SESSION['clienteid']="AYAaEkvtH81FaW9FUYQQSlLW5dAxocxzQmnHuucHeLpToWup6oRQkh_ieo47E8fuJP71UPf3PNzefA_x";
           
      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/donaciones.php';
    }
    public function eventos(){
        try {
            $post = new Usuarios();

            $nivel= $post->consultarUsuario($_SESSION["user"]);
            $postContador = $post ->contadorPost();
           
        } catch (PDOException $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
            // save errors
            $errorsGuide['NoGuide'] = "Ha habido un error <br>";
        }




        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/eventos.php';
    }


    public function tienda(){
         
        try {
            $post = new Usuarios();
            $nivel= $post->consultarUsuario($_SESSION["user"]);
            if(isset($_POST['valorSesion'])){
                
               
                $productosContador = $post ->contadorProductos($_POST['valorSesion']);
                
             }
           
            $nivel= $post->consultarUsuario($_SESSION["user"]);

           
            
           
        } catch (PDOException $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
            // save errors
            $errorsGuide['NoGuide'] = "Ha habido un error <br>";
        }




        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/tienda.php';
    }







    



public function insertarElementoCarrito(){
    try {
        $post = new Usuarios();
        $nivel= $post->consultarUsuario($_SESSION["user"]);
        $idUsu= $post->getIDUser($_SESSION["user"]);
        if(isset($_POST['bProducto'])){
        
           
      
            $fechaActual = date("d-m-Y");
            $estado="pendiente";
       
           $carrito= $post->insertarCarrito(recoge('idProducto'),$idUsu,recoge('tituloProducto'), $fechaActual,$estado,recoge('precioProducto'),recoge('cantidadP'));
// el campo carrito lleno es para cambiar la imagen de carrito de vacio a lleno cuando se inserta productos
           $_SESSION["carritolleno"]="lleno";
if($_SESSION["numeroCarrito"]>0){
    // el ir sumando es para cuando vayamos a quitar productoas y no haya cambiar la imagen a carrito vacio cuando sea 0
$_SESSION["numeroCarrito"]=$_SESSION["numeroCarrito"]+1;
header("Location: ".$_SERVER['HTTP_REFERER'].""); 
}
      else{
        
        $_SESSION["numeroCarrito"]=1;
header("Location: ".$_SERVER['HTTP_REFERER']."");
      }
        }
    } catch (PDOException $e) {
        error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
        // save errors
        $errorsGuide['NoGuide'] = "Ha habido un error <br>";
    }
    // header("Location: ".$_SERVER['HTTP_REFERER']."");
}

    public function carrito(){
       
 
       
            $prueba=  recoge('idProducto');
     
            echo $prueba;
    
            echo "<br>";
            try {
                $post = new Usuarios();
                    $nivel= $post->consultarUsuario($_SESSION["user"]);
                    $idUsu= $post->getIDUser($_SESSION["user"]);
                   
                    
                    //  echo   $_SESSION["numeroCarrito"];
                  
                  
                    if(isset($_POST['bCarrito'])){
                    
                        // echo $_POST['bCarrito'] ;  
                        // if($_POST['bCarrito']=="Confirmar"){
                          
                          
                            if(recoge('elementoseleccionado')==""){
                        $estado1="pendiente";
                        $estado="confirmar";
                     
                       $carritoActualizado= $post->actualizaCarrito(recoge('precioProductoCarrito'),recoge('cantidadPCarrito'), $estado, $estado1, $idUsu);
                       $_SESSION["carritolleno"]="vacio";
                            }
                       else{
                        $_SESSION["numeroCarrito"]= $_SESSION["numeroCarrito"]-1;
                        if($_SESSION["numeroCarrito"]==0){
                        $_SESSION["carritolleno"]="vacio";
                        }
                        $estado="pendiente";
                        $carritoElementoBorrado= $post->BorrarElementoCarrito(recoge('elementoseleccionado'),$estado,$idUsu);
                       }
                
                    }

               
                    
               
                  
                    
                    
                   



                } catch (PDOException $e) {
                    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
                    // save errors
                    $errorsGuide['NoGuide'] = "Ha habido un error <br>";
                }
        
             
          
        

  
    
        
       
     
          
    

    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/carrito.php';
}

public function insertarProducto(){
    $nameFile = "";
    $dir = "../../img";
    $max_file_size = "51200000";
    $extensions = array(
        "jpg",
        "png",
        "gif"
    );
    if (isset($_POST['bAñadir'])) {
        $titulo = recoge('titulo');
        $contenido = recoge('contenido');
        $imagen=$_FILES['imagen']['name'];
       $precio=recoge('precio');
       $genero=recoge('generos');
        try {
                        
            $l = new Usuarios();
            $l->insertarProducto($genero,$titulo,$imagen,$contenido,$precio);
            
            header("location:index.php?ctl=insertarProducto");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=insertarProducto");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/insertarProducto.php';   
}




public function eliminarProducto(){
   
    if (isset($_POST['bEliminar'])) {
        $titulo = recoge('titulo');
        
       $genero=recoge('generos');
        try {
                        
            $l = new Usuarios();
            $l->eliminarProducto($genero,$titulo);
            
            header("location:index.php?ctl=eliminarProducto");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=eliminarProducto");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/eliminarProducto.php';   
}



public function eliminarP(){
   
    if (isset($_POST['bEliminar'])) {
        $titulo = recoge('titulo');
        
       
        try {
                        
            $l = new Usuarios();
            $l->eliminarP($titulo);
            
            header("location:index.php?ctl=eliminarP");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=eliminarP");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/eliminarP.php';   
}





public function editarPrecioProducto(){
   
    if (isset($_POST['bEditar'])) {
        $titulo = recoge('titulo');
        $precio=recoge('precio');
       $genero=recoge('generos');
        try {
                        
            $l = new Usuarios();
            $l->editarPrecioProducto($precio,$genero,$titulo);
            
            header("location:index.php?ctl=editarPrecioProducto");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=editarPrecioProducto");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/editarPrecioProducto.php';   
}








public function insertarP(){
    $nameFile = "";
    $dir = "../../img";
    $max_file_size = "51200000";
    $extensions = array(
        "jpg",
        "png",
        "gif"
    );
    if (isset($_POST['bPost'])) {
        $titulo = recoge('titulo');
        $contenido = recoge('contenido');
        $imagen=$_FILES['imagen']['name'];
        $fechaini=recoge('fechain');
        $fechafin=recoge('fechafin');
        echo $fechaini;
        try {
                        
            $l = new Usuarios();
            $l->insertarP( $titulo,$imagen , $contenido,$fechaini,$fechafin  );
            
            header("location:index.php?ctl=eventos");
        } catch (Exception $e) {
            
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header("location:index.php?ctl=eventos");
        } 
    }
   
    $menu=$this->cargaMenu();
    require __DIR__ . '/../vista/insertarP.php';   
}


public function enviarCodigo(){
   
    
    
    $code = tokenG();
   $emailCodigo=$_SESSION['email'];
  $_SESSION['codigo']= $code;
  
    require __DIR__ . '/../correos/enviar.php';
}
public function recibirCodigo(){
    $codeIn = $_POST["codigoIn"];
     
            if($_SESSION['codigo']==$codeIn){
                try {
                        
                    $l = new Usuarios();
                    $l->registrarse($_SESSION['user'], $_SESSION['pass'], $_SESSION['email']);
                    mkdir(__DIR__ ."/../img/".$_SESSION['user'], 0777);
                copy(__DIR__ ."/../img/image.png", __DIR__ ."/../img/".$_SESSION['user']."/image.png");
                    header("location:index.php?ctl=inicio");
                } catch (Exception $e) {
                    // $l->deshacer();
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header("location:index.php?ctl=registro");
                } 
             
            }

require __DIR__ . '/../correos/recibe.php';
}

public function recuperarContrasenya(){
    $contrasenya="";
     
    if (isset($_POST['brecuperarContrasenya'])) {
        $correo = recoge('email');
                try {
                        
                    $l = new Usuarios();
                 $contrasenya= $l->getContrasenya($correo);
                 
                  
                } catch (Exception $e) {
                   
                    // error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    // header("location:index.php?ctl=inicio");
                } 
            }
            if (isset($_POST['bNuevaContrasenya'])) {
                $contraseñaNueva = recoge('contraseñaNueva');
                $correo2 = recoge('email2');
                
                try {
                        
                    $g = new Usuarios();
                 $nuevaContrasenya=$g->actualizaContrasenya($correo2,$contraseñaNueva);
                 
                    header("location:index.php?ctl=inicio");
                } catch (Exception $e) {
                    // $l->deshacer();
                    // error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    // header("location:index.php?ctl=inicio");
                } 
            
            }

require __DIR__ . '/../vista/recuperarContrasenya.php';
}



public function perfil(){
 
        try {
            $user = new Usuarios();

            $userGet = $user->getUser($_SESSION["user"]);
            $emailGet = $user->getEmail($_SESSION["user"]);
           
        } catch (PDOException $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
            // save errors
            $errorsGuide['NoGuide'] = "Ha habido un error <br>";
        }

        $nameFile = "";
        $dir = "../../img";
        $max_file_size = "51200000";
        $extensions = array(
            "jpg",
            "png",
            "gif"
        );

        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/perfil.php';
}

    
    public function registro() {
        // $menu = 'menuHome.php';
        if ($_SESSION['nivel_usuario'] >0) {
            header("location:index.php?ctl=inicio");
        }

        
            $params = array(
                'user' => '',
                'pass' => '',
                'email' => '',
                
                );
            $errores=array();
            if (isset($_POST['bRegistro'])) {
                $user = recoge('user');
                $pass = recoge('pass');
                $email = recoge('email');
                $emailCodigo = validarCorreo('email'); 
                cTexto($user, "user", $errores);
            
                cPass($pass, "pass", $errores);
                $_SESSION['email']=$email;
                $_SESSION['user']=$user;
                $_SESSION['pass']=$pass;
                
                if (empty($errores)){
                    // Si no ha habido problema creo modelo y hago inserció     
                    try {
                        
                    // $m = new Usuarios();
                    // if ($m->registrarse($user, $pass, $email)) {
                   

                        header("location:index.php?ctl=enviarCodigo");
                     
                    // } else {
                        
                    //     $params = array(
                    //         'user' => $user,
                    //         'pass' => $pass,
                    //         'email' => $email,
                            
                    //         );
                        
                    //     $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                    // }
                } catch (Exception $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header('Location: index.php?ctl=error');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                    header('Location: index.php?ctl=error');
                }

                } else {
                    $params = array(
                        'user' => $user,
                        'pass' => $pass,
                        
                        'email' => $email,
                       
                        
                        );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                    
                }
            }
        
            $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/Registro.php';
    }



    public function error() {
        
        $menu=$this->cargaMenu();

        require __DIR__ . '/../vista/error.php';
    }


    public function salir() {
        session_destroy();
        header ("location:index.php?ctl=home");
    }


    public function iniciarSesion() {
     
        if ($_SESSION['nivel_usuario'] >0) {
            header("location:index.php?ctl=inicio");
        }

        $params = array(
            'user' => '',
            'pass' => '',
           
            
            );
        $errores=array();
            if (isset($_POST['bIniciarSesion'])) { // Nombre del boton del formulario
                $nombreUsuario = recoge('user');
                $contrasenya = recoge('pass');
               
                        try{      
                    $m = new Usuarios();
                
                    if ($m->consultarUsuario($nombreUsuario)) {
                        // Compruebo si el password es correcto
                        $level=$m->consultarUsuario($nombreUsuario);
                        $_SESSION['nivel_usuario'] = $level;
                    
                        // foreach ($m as $row) {
                        //     $_SESSION['idUser'] = $row['id'];
                        //     $_SESSION['nombreUsuario'] = $row['user'] ;
                        //     $_SESSION['nivel_usuario'] = $row['nivel'];
                        //         }
                       
                   
                        if ($m->checkPassword($nombreUsuario,$contrasenya )) {
                            // Obtenemos el resto de datos
                        //     session_start();
                        // $_SESSION['nombreUsuario'] = $nombreUsuario ;
                        $_SESSION['email']=$m->getEmail($nombreUsuario);
                        $_SESSION['user']= $nombreUsuario;    
                        $_SESSION["carritolleno"]="vacio";         
                        header('Location: index.php?ctl=inicio');
                   }
                 
                
                }else {
                        $params = array(
                            'user' => $nombreUsuario,
                            'pass' => $contrasenya
                        );
                        // $params['mensaje'] = 'No se ha podido iniciar sesión. Revisa el formulario.';
                        $params['mensaje'] = $contrasenya;
                    }
               
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                header('Location: index.php?ctl=error');
            }
        }
    
      
        require __DIR__ . '/../vista/IniciarSesion.php';
    }



}




?>