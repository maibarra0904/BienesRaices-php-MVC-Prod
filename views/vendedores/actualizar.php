<main class="contenedor seccion contenido-centrado">
        <h1>Actualizar Vendedor(a)</h1>
        <a href="/admin" class="boton boton-verde">Regresar</a>
        <?php foreach ($errores as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>


    <form action="" class="formulario" method="POST" action="/vendedores/actualizar" enctype="multipart/form-data">
        <!-- enctype junto con el metodo $_FILES permiten mostrar las propiedades del archivo que se sube -->
        
        <?php include 'formulario.php'; ?>
        <input type="hidden" name="vendedor[creado]" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="vendedor[actualizado]" value="<?php echo date('Y-m-d'); ?>">
        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
    </form>

    </main>