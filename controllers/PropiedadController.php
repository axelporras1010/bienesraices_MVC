<?php

namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;
        $router->render('propiedades/admin',[
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);

    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
        
        if($_SERVER['REQUEST_METHOD']==='POST')
        {
            /** crea una nueva instancia */
            $propiedad = new Propiedad($_POST['propiedad']);
            /**Uploading files**/
            //Create unique number for the image
            $nombreImagen = md5(uniqid(rand(), true)) . $_FILES['propiedad']['name']['imagen'];
            //Setea el nombre
            //Upload the image
            //Realiza un resize con intervetion
            if($_FILES['propiedad']['tmp_name']['imagen'])
            {
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->scale(width: 300);;
                $propiedad->setImagen($nombreImagen);
            }
            
            $errores = $propiedad->validar(); 
            
            if(empty($errores))
            {   
                //crea la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES))
                {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                //Guardar en la DB
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();
        
        //metodo de POST para actualizar
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
            
            //Validacion
            $errores = $propiedad->validar();
    
            //Subida de archivos
            $nombreImagen = md5(uniqid(rand(), true)) . $_FILES['propiedad']['name']['imagen'];
            if($_FILES['propiedad']['tmp_name']['imagen'])
            {
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->scale(width: 300);;
                $propiedad->setImagen($nombreImagen);
            }
    
            if(empty($errores))
            {
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' =>  $vendedores
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
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }
        }
    }
}