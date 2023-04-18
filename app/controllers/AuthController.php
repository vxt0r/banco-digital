<?php

namespace app\controllers;

use MF\controller\Action;
use MF\model\Container;
use app\models\Autenticacao;


class AuthController extends Action{

    public function cadastrar(){
        $autenticacao = Container::getModel('autenticacao');

        if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
          if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])){
            header('location: cadastrar?erro=1');
            exit();
          }
          $autenticacao->cadastrar($_POST['nome'],$_POST['email'],$_POST['senha']);
        }

        $this->view->dados = $_SERVER['REQUEST_URI'];
        $this->render('login','layout');
    }

    public function login(){
        $autenticacao = Container::getModel('autenticacao');

        if(isset($_POST['email']) && isset($_POST['senha'])){
          if(empty($_POST['email']) || empty($_POST['senha'])){
            header('location: login?erro=1');
            exit();
          }
          $autenticacao->login($_POST['email'],$_POST['senha']);
        }

        $this->view->dados = $_SERVER['REQUEST_URI'];
        $this->render('login','layout');
    }


}
