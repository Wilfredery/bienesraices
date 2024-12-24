    <?php 
        require 'includes/funciones.php';
        
        addingTemplates('header', $inicio = true);
    ?>
    <main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="iconoseguridad" lazy="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim assumenda sunt ea nesciunt libero quod. Voluptatum eum cupiditate officia, blanditiis possimus labore, debitis id suscipit modi repellendus natus, dicta totam.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="iconoPrecio" lazy="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim assumenda sunt ea nesciunt libero quod. Voluptatum eum cupiditate officia, blanditiis possimus labore, debitis id suscipit modi repellendus natus, dicta totam.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="iconotiempo" lazy="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim assumenda sunt ea nesciunt libero quod. Voluptatum eum cupiditate officia, blanditiis possimus labore, debitis id suscipit modi repellendus natus, dicta totam.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y depas en venta</h2>

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa de lujo en el lago</h3>
                    <p>Casa en el lago con excelente vista.</p>
                    <p class="precio">$3,000,000</p>

                    <ul class="iconos-caracteristicas">

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="iconowc">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="iconoestacionamiento">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="iconodormitorio">
                            <p>4</p>
                        </li>
                    </ul>

                    <a class="boton-amarillo-block" href="anuncios.php">
                        Ver propiedad
                    </a>

                </div> <!--Conte-anuncio-->
            </div> <!--anuncio-->

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa terminados de lujo</h3>
                    <p>Casa en el lago con excelente vista.</p>
                    <p class="precio">$3,000,000</p>

                    <ul class="iconos-caracteristicas">

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="iconowc">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="iconoestacionamiento">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="iconodormitorio">
                            <p>4</p>
                        </li>
                    </ul>

                    <a class="boton-amarillo-block" href="anuncios.php">
                        Ver propiedad
                    </a>

                </div> <!--Conte-anuncio-->
            </div> <!--anuncio-->

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa con alberca</h3>
                    <p>Casa en el lago con excelente vista.</p>
                    <p class="precio">$3,000,000</p>

                    <ul class="iconos-caracteristicas">

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="iconowc">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="iconoestacionamiento">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="iconodormitorio">
                            <p>4</p>
                        </li>
                    </ul>

                    <a class="boton-amarillo-block" href="anuncios.php">
                        Ver propiedad
                    </a>

                </div> <!--Conte-anuncio-->
            </div> <!--anuncio-->

        </div> <!--Contenedor-anuncios-->

        <div class="alinear-right">
            <a class="boton-verde" href="anuncios.php">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo</p>
        <a class="boton-amarillo" href="contacto.php">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" types="image/webp">
                        <source srcset="build/img/blog1.jpg" types="image/jpg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="textoEntradaBlog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="infometa">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el  techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>

            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" types="image/webp">
                        <source srcset="build/img/blog2.jpg" types="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="textoEntradaBlog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoracion de tu hogar</h4>
                        <p class="infometa">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>

            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>

                <p>- Wilfredery D.C</p>
            </div>
        </section>
    </div>

<?php 
    addingTemplates('footer');
?>