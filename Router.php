<?php

namespace MVC;

class Router {
    
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url,$fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url,$fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {

        session_start();

        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas..
        $rutas_protegidas = ['/admin','/propiedades', '/vendedores'];
        
        //Funcion de validacion de rutas protegidas
        function validar_urlProtegida($array, $cadena) {
            foreach ($array as $elemento) {
              if (strpos($cadena, $elemento) !== false) {
                return true;
              }
            }
            return false;
        }

        $request_uri = $_SERVER['REQUEST_URI'];

        $urlActual = $request_uri=== '/' ? '/' : parse_url($request_uri)['path'];
        
        
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            //debugg($this);
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger rutas
        if(validar_urlProtegida($rutas_protegidas, $request_uri) && !$auth) {
            header('Location: /');
        }

        if($fn) {
            //debugg($fn);
            //La URL existe y tiene una función asociada
            call_user_func($fn, $this);
        } else {
            //debugg($fn);
            echo 'Pagina No encontrada';
        }

    }

    //Muestra una vista
    public function render($view, $datos =  []) {

        foreach($datos as $key => $value) {
            $$key = $value;
        }
        //Almacenar en memoria durante un momento
        ob_start();
        include_once __DIR__ . "/views/$view.php";

        //Limpiar el buffer
        $contenido = ob_get_clean();

        include_once __DIR__ . "/views/layout.php";
    }

    
}