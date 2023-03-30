<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// include("../libs/bGeneral.php");
// require("./modelo/modelo.php");
// require("./modelo/classUsuarios.php");
// require("./modelo/config.php");

//Crear una instancia. Con true permitimos excepciones




$mail = new PHPMailer(true);
    try {
        $mail->isSMTP(); //Para usaar SMTP
        $mail->Host       = 'smtp.gmail.com';//Nuestro servidor SMTMP smtp.gmail.com en caso de usar gmail
        $mail->SMTPAuth   = true;    
        /* 
        * SMTP username y password Poned los vuestros. La contraseña es la que nos generó GMAIL
        */
        // $mail->Username = 'grupoongvlc011@gmail.com';
                     
        // $mail->Password = 'cxfv rmxm lrqm cxxv';    
        $mail->Username = 'forogamershelp@gmail.com';             
        $mail->Password = 'mglk frwc fgws ydng'; 
        /*
        * Encriptación a usar ssl o tls, dependiendo cual usemos hay que utilizar uno u otro puerto
        */            
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
        $mail->Port = "465";
        /*TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                         
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;  
        Receptores y remitente
        */
        $usuarioEmail=new Usuarios();
     
  
        $emailGet=$emailCodigo;
        
        
        // $getpassword=$usuarioEmail-> getPassword($emailGet);
        // $username = $usuarioEmail->getUserByMail($emailGet);
       
    

        //Remitente
        $mail->setFrom('grupoongvlc011@gmail.com', 'grupoONGVLC');
        //Receptores. Podemos añadir más de uno. El segundo argumento es opcional, es el nombre
        $mail->addAddress($emailGet);     //Add a recipient
        //$mail->addAddress('ejemplo@example.com'); 

        //Copia
        //$mail->addCC('cc@example.com');
        //Copia Oculta
        //$mail->addBCC('bcc@example.com');

        //Archivos adjuntos
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Contenido
        //Si enviamos HTML
        $mail->isHTML(true);    
        $mail->CharSet = "UTF8";    
        //Asunto
        $mail->Subject = 'Account Recovery - grupoONGVLC';
        //Conteido HTML
        $mail->Body    = "Hello , we received an account recovery request on ForoGamers for: <br>" .$emailGet. "<br><br>This is code: ".  $code;
        //Contenido alternativo en texto simple
        $mail->AltBody = "Hello , we received an account recovery request on ForoGamers for: <br>" .$emailGet. "<br><br>This is code: ". $code;
        //Enviar correo
        $mail->send();
        echo 'The email has been succesfully sent!';
        echo "Please check your email and to write the code below ";
        echo "<form  action=index.php?ctl=recibirCodigo METHOD='post' NAME='formRegistro'>";
        echo "<input  TYPE='text' NAME='codigoIn' VALUE='' PLACEHOLDER='Codigo'>";
        echo " <input TYPE='submit' name='bCodigoCon' value='Confirmar Codigo'></input>";
        echo "</form>";
  
       
        
    } catch (Exception $e) {
        echo $emailCodigo;
        echo $code;
        echo "Error -> Email not sent!";
        echo $e;
       
        // header("Refresh:3;url=../Index.php");
    }
       

      
    // } catch (Exception $e) {
    //     echo "Error -> Email not sent!";
    //     echo $e;
    //     // header("Refresh:3;url=../Index.php");
    // }

?>