<fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo: </label>
            <input type="text" id="titulo" name="titulo" placeholder="titulo de la propiedad" value="<?php echo sanitizar($propiedad->titulo); ?>">

            <label for="precio">Precio: </label>
            <input type="number" id="precio" name="precio" placeholder="precio propiedad" value="<?php echo sanitizar($propiedad->precio); ?>">

            <label for="imagen">Imagen: </label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="Descripción">Descripcion</label>
            <textarea id="Descripción" name="Descripción" ><?php echo sanitizar($propiedad->Descripción); ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones: </label>
            <input type="number" id="habitaciones" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="habitaciones" value="<?php echo sanitizar($propiedad->habitaciones); ?>">

            <label for="bathroom">Baños: </label>
            <input type="number" id="bathroom" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="bathroom" value="<?php echo sanitizar($propiedad->bathroom); ?>">


            <label for="estacionamiento">Estacionamientos: </label>
            <input type="number" id="estacionamiento" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="estacionamiento" value="<?php echo $propiedad->estacionamiento; ?>">
        </fieldset>

        
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="" value="<?php echo sanitizar($propiedad->vendedores_idvendedores) ?>">
                <option value="">--Seleccionar--</option>
                <!-- <option value="1">Juan</option>
                <option value="2">Pablito</option> -->

                <?php while( $vendedor = mysqli_fetch_assoc($resultado) ): ?>
                    <option <?php echo $vendedor === $vendedor['idvendedores'] ? 'selected' : ''; ?>  value="<?php echo sanitizar($vendedor['idvendedores']); ?>">
                         <?php echo $vendedor['nombre']. " ". $vendedor['apellido']; ?> 
                    </option>
                
                <?php endwhile; ?>

            </select>
        </fieldset>