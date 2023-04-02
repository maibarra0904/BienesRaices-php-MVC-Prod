<?php

namespace Controllers;
use MVC\Router;
use Model\propiedad;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    //Estas funciones se las llama desde el index
    public static function index(Router $router) {

        $propiedades = propiedad::all();

        $vendedores = vendedor::all();

        //Muestra el mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    
    public static function crear(Router $router) {
        //Se crea la nueva instancia
        $propiedad = new propiedad;
        $vendedores = vendedor::all();
        //Arreglo de errores
        $errores  = propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia **/
            $propiedad = new propiedad($_POST['propiedad']);
    
            /** SUBIDA DE ARCHIVOS **/
            
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true)).'.jpg';
    
            //Setear la imagen: Relizar un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            
    
            //Validar errores
            $errores = $propiedad->validar();
    
    
            if(empty($errores)){
    
                //Crear Carpeta
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
    
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //Guarda la propiedad
                $resultado = $propiedad->guardar();
    
                //$resultado = mysqli_query($db, $query);
    
                
            } 
        }

        //Luego se la traslada a la vista
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');

        $propiedad = propiedad::find($id);

        $vendedores = vendedor::all();

        $errores = propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            //Asignando files a una variable
            //$imagen = $_FILES['imagen'];
    
            $args = $_POST['propiedad'];
    
    
    
            $propiedad -> sincronizar($args);
    
            //debugg($propiedad);
    
            $errores = $propiedad->validar();
    
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true)).'.jpg';
    
            //Realizar un resize
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
    
            if(empty($errores)){
                //$image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
    
            } else {
                //echo "Registro no insertado";
            };
    
            
        };

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
        
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $id = $_POST['id']; //Es necesario pasar el "Request_Method para que $_POST funcione"
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){

            $tipo = $_POST['tipo'];

            if(validarTipoContenido($tipo)) {
                $propiedad = propiedad::find($id);
                $propiedad->eliminar();

            } 
        }
        }
    }
}