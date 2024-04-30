<?php

namespace Controller;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    public static function crear(Router $router)
    {
        $vendedor = new Vendedor;
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            //Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
        
            //Validar que no hallan campos vacios
            $errores = $vendedor->validar();
            
            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/crear',[
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $errores = Vendedor::getErrores();
        $vendedor = Vendedor::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            //asignar los valores
            $args = $_POST['vendedor'];
            //Sincronizar objeto en memoria
            $vendedor->sincronizar($args);
            //Validacion
            $errores = $vendedor->validar();
            
            if(empty($errores))
            {
                $vendedor->guardar();
            } 
        }

        $router->render('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if($_SERVER['REQUEST_METHOD']==='POST')
        {
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $tipo = $_POST['tipo'];
            if(validarTipoContenido($tipo))
            {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
        }
    }
}