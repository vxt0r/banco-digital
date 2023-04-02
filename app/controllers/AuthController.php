<?php

namespace app\controllers;

use MF\controller\Action;
use MF\model\Container;
use app\models\Autenticacao;


class AuthController extends Action{

    public function cadastrar(){
        $autenticacao = Container::getModel('autenticacao');

        if(!empty($_POST)){
            if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
                $autenticacao->cadastrar($_POST['nome'],$_POST['email'],$_POST['senha']);
            }
        }

        $this->view->dados = $_SERVER['REQUEST_URI'];
        $this->render('login','layout');
    }

    public function login(){
        $autenticacao = Container::getModel('autenticacao');

        if(!empty($_POST)){
            if(isset($_POST['email']) && isset($_POST['senha'])){
                $autenticacao->login($_POST['email'],$_POST['senha']);
            }
        }
        
        $this->view->dados = $_SERVER['REQUEST_URI'];
        $this->render('login','layout');
    }

   
}
