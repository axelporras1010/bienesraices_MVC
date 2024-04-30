<main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <?php
            include 'iconos.php';
        ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y depas en Venta</h2>

        <?php
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/public/propiedades" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa que deseas</h2>
        <p>Llena el formulario y un asesor de ventas te contactara a la brevedad posible</p>
        <a href="contacto.html" class="boton-amarillo">Contacto</a>
    </section>

    <div class="contenedor seccion inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Imagen Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el <span>20/10/2021</span> por <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Imagen Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p>Escrito el <span>20/10/2021</span> por <span>Admin</span></p>

                        <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores
                            para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

             <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Axel Porras</p>
             </div>
        </section>
    </div>