<?php

namespace Controllers;
use MVC\Router;
use Model\propiedad;
use Model\vendedor;

class VendedorController {
    public static function crear( Router $router) {

        $errores = vendedor::getErrores();

        $vendedor = new vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            //Crear la nueva instancia
            $vendedor = new vendedor($_POST['vendedor']);
    
            //Validar que no haya campos vacíos
            $errores = $vendedor->validar();
    
    
            //Programar en caso que no haya errores
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar(Router $router) {

        $errores = vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        $vendedor = vendedor::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            //Asignar los valores
            $args = $_POST['vendedor'];
    
            //Sincronizar el objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);
    
            //Validación
            $errores = $vendedor->validar();
    
            if(empty($errores)) {
                $vendedor->guardar();
            }
    
        }

        $router -> render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            


            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if($id) {
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    $vendedor = vendedor::find($id);
                    $vendedor-> eliminar();
                }
            }
    }
    }
}