<main class="contenedor seccion">
    <h1>Iniciar sesión</h1>
    <form class="formulario contenido-centrado" method="POST" action="/public/login">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Tu email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Tu password" required >
        </fieldset>
        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
    </form>
</main>
