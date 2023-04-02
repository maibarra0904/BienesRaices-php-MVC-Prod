<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login( Router $router) {

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)) {
                //Verificar si el usuario existe

                $resultado = $auth->existeUsuario();

                if(!$resultado) {
                    //Verifica si el usuario existe o no
                    $errores = Admin::getErrores();
                } else {
                    //Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if($autenticado) {
                        //Autenticar el usuario
                        $auth->autenticar();

                    } else {
                        //Mensaje de error cuando el password es incorrecto
                        $errores = Admin::getErrores();
                    }

                    //Autenticar el usuario


                }

                

            }

        } 

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];

        header('Location: /');
    }
}