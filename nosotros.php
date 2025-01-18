    <?php 
        require 'includes/app.php';
        
        addingTemplates('header');
    ?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">

                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">

                    <img loading="lazy" src="build/img/nosotros.jpg" alt="imagennosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet, sint atque accusamus culpa saepe quisquam nulla aperiam id corporis debitis error placeat odit, mollitia enim maiores fuga commodi optio maxime.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet, sint atque accusamus culpa saepe quisquam nulla aperiam id corporis debitis error placeat odit, mollitia enim maiores fuga commodi optio maxime.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet, sint atque accusamus culpa saepe quisquam nulla aperiam id corporis debitis error placeat odit, mollitia enim maiores fuga commodi optio maxime.
                </p>

                
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet, sint atque accusamus culpa saepe quisquam nulla aperiam id corporis debitis error placeat odit, mollitia enim maiores fuga commodi optio maxime.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet, sint atque accusamus culpa saepe quisquam nulla aperiam id corporis debitis error placeat odit, mollitia enim maiores fuga commodi optio maxime.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet, sint atque accusamus culpa saepe quisquam nulla aperiam id corporis debitis error placeat odit, mollitia enim maiores fuga commodi optio maxime.
                </p>
            </div>

        </div>
        <section>

            <h1>Mas sobre nosotros</h1>

            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="build/img/icono1.svg" alt="iconoseguridad" lazy="lazy">
                    <h3>Seguridad</h3>
                    <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim assumenda sunt ea nesciunt libero quod. Voluptatum eum cupiditate officia, blanditiis possimus labore, debitis id suscipit modi repellendus natus, dicta totam.</h3>
                </div>

                <div class="icono">
                    <img src="build/img/icono2.svg" alt="iconoPrecio" lazy="lazy">
                    <h3>Precio</h3>
                    <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim assumenda sunt ea nesciunt libero quod. Voluptatum eum cupiditate officia, blanditiis possimus labore, debitis id suscipit modi repellendus natus, dicta totam.</h3>
                </div>

                <div class="icono">
                    <img src="build/img/icono3.svg" alt="iconotiempo" lazy="lazy">
                    <h3>Tiempo</h3>
                    <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim assumenda sunt ea nesciunt libero quod. Voluptatum eum cupiditate officia, blanditiis possimus labore, debitis id suscipit modi repellendus natus, dicta totam.</h3>
                </div>
            </div>

        </section>
    </main>

<?php 
    addingTemplates('footer');
?>