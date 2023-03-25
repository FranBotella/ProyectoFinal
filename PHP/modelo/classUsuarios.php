<?php

class Alimentos extends Modelo {
    
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


public function registrarse($user,$pass,$nivel,$email,$ciudad){
    $consulta = "INSERT INTO users (user, pass, nivel, email,ciudad) VALUES (:user, :pass, :nivel, :email,:ciudad)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':user', $user);
        $result->bindParam(':pass', $pass);
        $result->bindParam(':nivel', $nivel);
        $result->bindParam(':email', $email);
        $result->bindParam(':ciudad', $ciudad);
        $result->execute();
        return $result; 
}
    
      
public function consultarUsuario($user) {
    $consulta = "SELECT * FROM users where user=:user";
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



public function checkPassword($user, $password)
        {
            $consulta = "SELECT * FROM users WHERE user=?";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $user);
            $resultado->execute();
            foreach($resultado as $result){
               
                if($password === $result['pass']){
                    return true;
                } else{
                    return false;
                }
            }
        }
    
}





?>