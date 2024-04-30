<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio=false;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/public/">
                    <img src="/public/build/img/logo.svg" alt="Logotipo Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/public/build/img/barras.svg" alt="Icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/public/build/img/dark-mode.svg" alt="Dark Mode Boton">
                    <nav class="navegacion">
                        <a href="/public/nosotros">Nosotros</a>
                        <a href="/public/propiedades">Anuncios</a>
                        <a href="/public/blog">Blog</a>
                        <a href="/public/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/public/logout">Cerrar sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!--barra-->
            <?php if($inicio){ ?>
            <h1>Venta de casas y Apartamentos de lujo</h1>
            <?php }  ?> 
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenido-footer">
            <nav class="navegacion mostrar">
                <a href="/public/nosotros">Nosotros</a>
                <a href="/public/propiedades">Anuncios</a>
                <a href="/public/blog">Blog</a>
                <a href="/public/contacto">Contacto</a>
            </nav>

            <p class="copyright">Todos los derechos reservados 2024 &copy</p>
        </div>
    </footer>

    <script src="/public/build/js/bundle.min.js"></script>
</body>
</html>