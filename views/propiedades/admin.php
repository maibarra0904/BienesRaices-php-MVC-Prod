<main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>

        <?php
            if($resultado) {
                $mensaje = notificacionEvento(intval($resultado));
                if($mensaje) { ?>
                    <p class="alert exito"><?php echo s($mensaje) ?></p>
                    <?php header("refresh:1;url=/admin");
                    ?>
                <?php };    
            } 
            ?>

        <h5 class="ancho"></h5>
        <h2 class="admTitulo">Propiedades</h2>
        <h5 class="ancho"></h5>

        <a href="/propiedades/crear" class="boton boton-amarillo">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <th>ID</th>
                <th>Titulos</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>

            </thead>
            
            <!-- Paso 4: Mostrar los resultados -->

            <tbody>
                <?php foreach( $propiedades as $propiedad): ?>
                
                    <tr>
                        <td> <?php echo $propiedad->id; ?> </td>
                        <td> <?php echo $propiedad->titulo; ?> </td>
                        <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"> </td>
                        <td> $ <?php echo $propiedad->precio; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/eliminar" onsubmit="return confirm('¿Estás seguro de eliminar la publicación: <?php echo $propiedad->titulo ?>?')">

                                <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            
                            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-verde-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>
        <h5 class="ancho"></h5>
        <h2 class="admTitulo">Vendedores</h2>
        <h5 class="ancho"></h5>

        <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo Vendedor</a>

        <table class="propiedades">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </thead>
            
            <!-- Paso 4: Mostrar los resultados -->

            <tbody>
                <?php foreach( $vendedores as $vendedor): ?>
                
                    <tr>
                        <td> <?php echo $vendedor->id; ?> </td>
                        <td> <?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?> </td>
                        <td> <?php echo $vendedor->telefono; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action='/vendedores/eliminar' onsubmit="return confirm('¿Estás seguro de eliminar el vendedor: <?php echo $vendedor->nombre . ' ' . $vendedor->apellido?>?')">

                                <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            
                            <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-verde-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>

    </main>