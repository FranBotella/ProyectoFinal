<?php

class Usuarios extends Modelo {
    
    public function consultarNombreAlimento($nombreAlimento) {
        $consulta = "SELECT * FROM alimentos WHERE nombre=:nombreAlimento ";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreAlimento', $nombreAlimento);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    public function insertarAlimento($nombre, $energia, $proteina, $hidratocarbono,$fibra,$grasatotal) {
        $consulta = "INSERT INTO alimentos (nombre, energia, proteina, hidratocarbono,fibra,grasatotal) VALUES (:nombre, :energia, :proteina, :hidratocarbono,:fibra,:grasatotal)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':energia', $energia);
        $result->bindParam(':proteina', $proteina);
        $result->bindParam(':hidratocarbono', $hidratocarbono);
        $result->bindParam(':fibra', $fibra);
        $result->bindParam(':grasatotal', $grasatotal);
        $result->execute();
        return $result;
    }
    
    public function listarAlimentos() {
        $consulta = "SELECT * FROM alimentos ORDER BY id ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }



    public function listarAlimentosEsttadisticas() {
        $consulta = "SELECT * FROM alimentos ORDER BY id ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


public function registrarse($user,$pass,$email){
    $consulta = "INSERT INTO usuarios (nombre, contraseñaEncriptada, correo) VALUES (:user, :pass, :email)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':user', $user);
        $result->bindParam(':pass', $pass);
        $result->bindParam(':email', $email);
        $result->execute();
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
        $nivel= $row['nombre'] ;
    }
    return $nivel;
    // return $result->fetch(PDO::FETCH_ASSOC);
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
    
}





?>