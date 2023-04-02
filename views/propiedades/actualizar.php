<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin" class="boton boton-verde">Regresar</a>

    <?php foreach ($errores as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php' ?>
        <input type="hidden" name="propiedad[creado]" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="propiedad[actualizado]" value="<?php echo date('Y-m-d'); ?>">
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

    
</main>