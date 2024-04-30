<main class="seccion contenedor">
    <h1>Contacto</h1>

    <?php if($mensaje) {  ?>
            <p class="alerta exito"><?php echo $mensaje; ?></p>    
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="img/webp">
        <source srcset="build/img/destacada3.jpg" type="img/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form action="/public/contacto" method="POST" class="formulario">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje">Mensaje</label>
            <textarea name="contacto[mensaje]" id="mensaje" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion Sobre la Propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="Compra" disabled selected>Selecciona</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>  
            </select>

            <label for="presupuesto">Precio o presupuesto</label> <!-- Se quitó el required aquí -->
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]">
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[forma_contacto]" required> <!-- Se cambió el name -->

                <label for="contactar-email">Email</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[forma_contacto]" required> <!-- Se cambió el name -->
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>
