    <?php 
        require 'includes/funciones.php';
        
        addingTemplates('header', $inicio = true);
    ?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>

            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagenCasaBosque">

        </picture>

        <div class="resumen-propiedad">

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

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusantium ducimus nam sed amet incidunt reprehenderit odio est sequi, mollitia reiciendis quasi praesentium iste temporibus iusto ex sapiente ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusantium ducimus nam sed amet incidunt reprehenderit odio est sequi, mollitia reiciendis quasi praesentium iste temporibus iusto ex sapiente ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusantium ducimus nam sed amet incidunt reprehenderit odio est sequi, mollitia reiciendis quasi praesentium iste temporibus iusto ex sapiente ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus accusantium ducimus nam sed amet incidunt reprehenderit odio est sequi, mollitia reiciendis quasi praesentium iste temporibus iusto ex sapiente ut.</p>
        </div>
    </main>

    <?php
        addingTemplates('footer');
    ?>