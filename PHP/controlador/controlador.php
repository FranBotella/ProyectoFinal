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




    public function verAlimentosEstadisticas() {
        try {
            $m = new Alimentos();
            $params = array(
                'Alimentos' => $m->listarAlimentos(), 
                
            );
            if (! $params['Alimentos'])
            $params['mensaje'] = "No hay Alimentos que mostrar.";  
            // $menu = 'menuHome.php';       
            
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu=$this->cargaMenu();
    
        require __DIR__ . '/../vista/verStatsAlimentos.php';
    }








    public function verAlimento() {
        try {
            $m = new Alimentos();
            $params = array(
                'nombreAlimento' => $m->listarAlimentos(), 
                
            );
            if (! $params['nombreAlimento'])
            $params['mensaje'] = "No hay Alimentos que mostrar.";  
            // $menu = 'menuHome.php';       
            
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu=$this->cargaMenu();
    
        require __DIR__ . '/../vista/verAlimento.php';
    }
    

public function insertarA(){
    if ($_SESSION['nivel_usuario'] <2) {
        header("location:index.php?ctl=inicio");
    }  

   
    $errores=array();
//nombre, energia, proteina, hidratocarbono,fibra,grasatotal
    if (isset($_POST['bInsertarA'])) {
        $nombre = recoge('nombre');
        $energia = recoge('energia');
        $proteina = recoge('proteina');
        $hidratocarbono = recoge('hidratocarbono');
        $fibra= recoge('fibra');
        $grasatotal= recoge('grasatotal');
     
        
       
        
        if (empty($errores)){
            // Si no ha habido problema creo modelo y hago inserció     
            try {

            $m = new Alimentos();
            if ($m->insertarAlimento($nombre,$energia,$proteina,$hidratocarbono,$fibra,$grasatotal)) {
                
                header('Location: index.php?ctl=inicio');
            } else {
               
                
                $params['mensaje'] = 'No se ha podido insertar el alimento.';
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        } 
    }

    $menu=$this->cargaMenu();
require __DIR__ . '/../vista/InsertarAlimento.php';

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
                   
                    header("location:index.php?ctl=inicio");
                } catch (Exception $e) {
                    // $l->deshacer();
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header("location:index.php?ctl=registro");
                } 
             
            }

require __DIR__ . '/../correos/recibe.php';
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