<main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <?php include 'iconos.php'; ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>

        <?php 
            $limite = 3;
            include 'listado.php';

        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>

    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario para ponernos en contacto contigo</p>
        <a href="contacto" class="boton-amarillo">Contáctanos</a>

    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            
            <article class="entrada-blog">

                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.webp" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/02/2023</span> por <span>Admin</span> </p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los 
                            mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>

            </article>

            <article class="entrada-blog">

                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.webp" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guía para la decoración en tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>23/02/2023</span> por <span>Admin</span> </p>
                        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y 
                            colores para darle vida a tu espacio
                        </p>

                    </a>
                </div>

            </article>
            
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    La compra de mi casa ha sido la mejor experiencia de mi vida. 
                    Además, fue increíble recibir un precio tan bueno para tan magnífica propiedad.
                </blockquote>
                <p>Mario Ibarra</p>
            </div>
        </section>

    </div>
