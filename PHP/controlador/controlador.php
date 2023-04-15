<?php

class Controller {



    public function cargaMenu (){
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menuUser.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
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
        if ($_SESSION['nivel_usuario'] >0) {
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
         
           
        } catch (PDOException $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
            // save errors
            $errorsGuide['NoGuide'] = "Ha habido un error <br>";
        }




        $menu=$this->cargaMenu();
        require __DIR__ . '/../vista/tienda.php';
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
                $emailCodigo = recoge('email'); 
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