
<main class="contenedor seccion">
    <h1>Registrar vendedor</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>   

    <a href="/public/admin"class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" action="/public/vendedores/crear">
        
        <?php
            include include __DIR__ . '/formulario.php';
        ?>

        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
    </form>
</main>