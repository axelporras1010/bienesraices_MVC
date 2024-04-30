<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);
    }
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada', []);
    }
    public static function contacto(Router $router)
    {
        $mensaje = null;
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            $respuestas = $_POST['contacto'];
            //Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io'; 
            $mail->SMTPAuth =true;
            $mail->Username = '39c0145dcfa7e0';
            $mail->Password = 'a8953841465d3d';
            $mail->SMTPSecure = 'tls';   
            $mail->Port =2525;

            //Configurar el contenido del emial
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'Bienes Raices');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //definir el contenido
            $contenido =  '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje </p>';
            $contenido .= '<p> Nombre: '. $respuestas['nombre'] . ' </p>';

            if($respuestas['forma_contacto'] === 'telefono')
            {
                $contenido .= '<p> Eligio ser contactado por telefono </p>';
                $contenido .= '<p> Telefono: '. $respuestas['telefono'] . ' </p>';
                $contenido .= '<p> Fecha de contacto: '. $respuestas['fecha'] . ' </p>';
                $contenido .= '<p> Hora de contacto: '. $respuestas['hora'] . ' </p>';
            }
            else
            {
                $contenido .= '<p> Eligio ser contactado por email </p>';
                $contenido .= '<p> Email: '. $respuestas['email'] . ' </p>';
            }

            $contenido .= '<p> Mensaje: '. $respuestas['mensaje'] . ' </p>';
            $contenido .= '<p> Vende o compra: '. $respuestas['tipo'] . ' </p>';
            $contenido .= '<p> Precio o presupuesto: $'. $respuestas['precio'] . ' </p>';
            $contenido .=  '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar email
            if($mail->send())
            {
                $mensaje =  "Mensaje enviado correctamente";
            }
            else
            {
                $mensaje =  "Mensaje no se pudo enviar";
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}