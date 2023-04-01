<?php

class Usuarios extends Modelo {
    
   


public function registrarse($user,$pass,$email){
    // $result2 = $this->conexion->beginTransaction();
    
    
    $consulta = " INSERT INTO usuarios (nombre, contraseñaEncriptada, correo) VALUES (:user, :pass, :email)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':user', $user);
        $result->bindParam(':pass', $pass);
        $result->bindParam(':email', $email);
        $result->execute();
        // $result2 = $this->conexion->commit();
        return $result; 
}

    
      
public function consultarUsuario($user) {
    $consulta = "SELECT * FROM usuarios where nombre=:user";
    $result = $this->conexion->prepare($consulta);
    $result->bindParam(':user', $user);
    $result->execute();
    // $resultadoUsuario = $result->fetchAll();
    // return $resultadoUsuario;
    $resultadoUsuario=$result;
    foreach ($resultadoUsuario as $row) {
        $nivel= $row['nivel'] ;
    }
    return $nivel;
    // return $result->fetch(PDO::FETCH_ASSOC);
}

public function actualizainfo($email, $usuario)
        {
           
          $consulta="UPDATE `usuarios` SET `nombre` = ?, `correo` = ? WHERE nombre = ?";
          $resultado = $this->conexion->prepare($consulta);
        
            $resultado->bindParam(1, $email);
        
            $resultado->bindParam(2, $usuario);
            $resultado->execute();
        }

        public function checkEmail($email)
        {
            $consulta = "SELECT * FROM usuarios WHERE correo=?";
            $resultado = $this->prepare($consulta);
            $resultado->bindParam(1, $email);
            $resultado->execute();

            foreach($resultado as $result){
                if($email === $result['correo']){
                    return true;
                } else{
                    return false;
                }
            }
        }

public function getLevel($nameUser){
    $consulta="SELECT * FROM `usuarios`where nombre=?;";
    $stmt=$this->conexion->prepare($consulta);
    $stmt->bindParam(1,$nameUser);
    $stmt->execute();
    $resultado=$stmt;
    foreach($resultado as $result){
       $numero=$result['nivel'];
    
   }
   return $numero;
}
public function getUser($user)
        {
            $consulta = "SELECT * FROM usuarios WHERE nombre=:user";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':user', $user);
            $result->execute();
            $resultadoUsuario = $result;

            foreach ($resultadoUsuario as $row) {
                $nameUser= $row['nombre'] ;
            }
            return $nameUser;
        }

public function checkPassword($user, $password)
        {
            $consulta = "SELECT * FROM usuarios WHERE nombre=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $user);
            $resultado->execute();
           
            foreach($resultado as $result){
               
                if($password === $result['contraseñaEncriptada']){
                    return true;
                } else{
                    return false;
                }
            }
        }



        public function getUserByMail($mail){
            $consulta = "SELECT * FROM usuarios WHERE correo=:mail";
            $result =$this->conexion->prepare($consulta);
            $result->bindParam(':mail', $mail);
            $result->execute();
            $resultadoUsuario = $result;
            foreach ($resultadoUsuario as $row) {
                $nameUser= $row['nombre'];
            }
            return $nameUser;
        }

       


        public function getPassword($email)
        {
            $consulta = "SELECT * FROM usuarios WHERE correo=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $email);
            $resultado->execute();

            foreach($resultado as $result){
                $contraseñaGet=$result['contraseñaEncriptada'];
            }
            return $contraseñaGet;
        }



        public function getEmail($usuario)
        {
            $consulta = "SELECT * FROM usuarios WHERE nombre=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $usuario);
            $resultado->execute();

            foreach($resultado as $result){
                $emailBuscado=$result['correo'];
                
            }
            return $emailBuscado;
        }
    
}





?>