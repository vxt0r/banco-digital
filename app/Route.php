<?php

namespace app;

use MF\init\Bootstrap;

class Route extends Bootstrap{

    protected function initRoutes(){

        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' =>  'index'
        );
        
        $routes['cadastrar'] = array(
            'route' => '/cadastrar',
            'controller' => 'authController',
            'action' =>  'cadastrar'
        );

        $routes['login'] = array(
            'route' => '/login',
            'controller' => 'authController',
            'action' =>  'login'
        );

        $routes['logout'] = array(
            'route' => '/logout',
            'controller' => 'indexController',
            'action' =>  'logout'
        );

        $this->setRoutes($routes);
    }

   
    
}