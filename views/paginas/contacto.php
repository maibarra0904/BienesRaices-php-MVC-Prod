<main class="contenedor contenido-centrado">
    <h1>Contacto</h1>

    <?php
        if ($mensaje) { ?>
            <p class='alert exito '> <?php echo $mensaje ?></p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form action="/contacto" class="formulario" method="POST">
        <fieldset>

            <legend>Información Personal</legend>
                
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" >
                
                
                
                <label for="mensaje">Mensaje</label>
                <textarea id="telefono" name="contacto[mensaje]" ></textarea>

        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o Compra:</label>
            <select name="contacto[tipo]" id="opciones" >

                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>

            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" >

        </fieldset>

        <fieldset>
            <legend>Información sobre la forma de contacto</legend>
            <p>Cómo desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >
                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
            </div>

            <div id="contacto"></div>

            
        
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>

</main>
