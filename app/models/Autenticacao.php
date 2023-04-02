<?php

namespace app\models;
use MF\model\Model;

class Autenticacao extends Model{

    private function getUsuario($email){
        $query = 'SELECT * FROM usuarios WHERE email = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$email);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    private function criarConta($id_usuario){
        $numero = rand(1000,9999);
        $query = 'INSERT INTO conta(numero,id_usuario) VALUES (?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$numero);
        $stmt->bindValue(2,$id_usuario);
        $stmt->execute();
        header('location:/login');
    }

    public function cadastrar($nome,$email,$senha){
        $hash = password_hash($senha,PASSWORD_DEFAULT);
        $query = 'INSERT INTO usuarios(nome,email,senha) VALUES (?,?,?)';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$nome);
        $stmt->bindValue(2,$email);
        $stmt->bindValue(3,$hash);
        $stmt->execute();
        $usuario = $this->getUsuario($email);
        $this->criarConta($usuario['id']);
    }

    public function login($email,$senha){
        $usuario = $this->getUsuario($email);

        if(password_verify($senha,$usuario['senha'])){
            session_start();
            $_SESSION['id'] = $usuario['id'];
            header('location:/');
        }
        else die('Email ou senha incorretos');
    }
}