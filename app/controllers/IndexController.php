<?php

namespace app\controllers;

use MF\controller\Action;
use MF\model\Container;
use app\models\Conta;


class IndexController extends Action{

    private function autenticado(){
        session_start();
        if(gettype($_SESSION['id']) != 'integer' || $_SESSION['id'] < 0){
            header('location:/login');
            exit();
        }
    }

    public function index(){
        $this->autenticado();
        $conta = Container::getModel('conta');

        if(isset($_POST['valor'])){
            if($_GET['acao'] == 'sacar'){
                $msg = $conta->sacar($_POST['valor'],$_SESSION['id']);
                $this->view->msg = $msg; 
            }
            
            elseif($_GET['acao'] == 'depositar'){
                $conta->depositar($_POST['valor'],$_SESSION['id']);
            } 
        }

        $this->view->dados = $conta->getConta($_SESSION['id']);
        $this->render('index','layout');
    }

    public function logout(){
        session_start();
        unset($_SESSION['id']);
        header('location: /login');
    }
   
}

