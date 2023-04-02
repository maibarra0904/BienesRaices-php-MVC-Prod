<?php 

namespace Controllers;

use Model\propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index( Router $router ) {

        $propiedades = propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros( Router $router ) {
        $router -> render('paginas/nosotros');
    }
    public static function propiedades( Router $router ) {
        
        $propiedades = propiedad::all();
        
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad( Router $router ) {

        $id = validarORedireccionar('/propiedades');

        $propiedad = propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog( Router $router ) {

        $router->render('paginas/blog');
    }
    public static function entrada( Router $router ) {
        $router->render('paginas/entrada');
    }
    public static function contacto( Router $router ) {

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $respuestas = $_POST['contacto'];

            //Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar protocolo de envío de emails SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'd5f8c9cb561b01';
            $mail->Password = 'afd0e4571e71bd';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configurar el contenido del mail
            $mail->setFrom('admin@miempresa.com');
            $mail->addAddress('mario.ibarra.86@gmail.com', 'MarioIbarra.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= ' <p> Tienes un nuevo mensaje </p></html>';
            $contenido .= ' <p>Nombre: ' . $respuestas['nombre'] .'</p>';
            
            //Enviar de forma condicional algunos campos de email o telefono
            
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= ' <p>Teléfono: ' . $respuestas['telefono'] .'</p>';
                $contenido .= ' <p>Fecha de Contacto: ' . $respuestas['fecha'] .'</p>';
                $contenido .= ' <p>Hora: ' . $respuestas['hora'] .'</p>';
            } else {
                $contenido .= ' <p>Email: ' . $respuestas['email'] .'</p>';
            }
            
            $contenido .= ' <p>Mensaje: ' . $respuestas['mensaje'] .'</p>';
            $contenido .= ' <p>Vende o compra: ' . $respuestas['tipo'] .'</p>';
            $contenido .= ' <p>Precio o presupuesto: $' . $respuestas['precio'] .'</p>';
            $contenido .= ' <p>Preferencia de contacto: ' . $respuestas['contacto'] .'</p>';
            
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el mail
            if($mail->send()) {
                $mensaje = 'Mensaje enviado correctamente';
            } else {
                $mensaje = 'Mensaje No enviado';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

}