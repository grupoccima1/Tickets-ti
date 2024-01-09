<?php

include 'connect.php';

class User extends DB{
    private $nombre;
    private $username;

    public function userExiste($usuario, $pass){
        $md5pass = md5($pass);

        $query = $this->connect()->prepare('SELECT * FROM username = :usuario and password = :$pass');
        query->execute(['user' => $usuario, 'pass' =>$md5pass]);
        if($query->rowCount()){
            return true;
        } else{
            return false;
        }
    }

    public function setUser($usuario){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $usuario]);

        foreach ($query as $currentUser){
            $this->nombre = $currentUser['nombre'];
            $this->usuario = $currentUser['usarname'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

    
?>