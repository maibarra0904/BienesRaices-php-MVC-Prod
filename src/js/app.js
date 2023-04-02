document.addEventListener('DOMContentLoaded', function() {
    evenListeners();
    darkMode();
})

function evenListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');

    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto))

}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');


    navegacion.classList.toggle('mostrar'); //Si tiene esa clase la elimina y si no la añade
}

function darkMode() {
    //Verificacion de cambios en el sistema operativo para que opere el darkmode
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');

        } else {
            document.body.classList.remove('dark-mode');
        }
    });


    let botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function () {

        document.body.classList.toggle('dark-mode');
        
        document.body.classList.contains('dark-mode') ? botonDarkMode.src = '/build/img/light-mode.svg' : botonDarkMode.src = '/build/img/dark-mode.svg';
        

        
    })
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');


    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            
            <input type="tel" placeholder="Tu teléfono" id="telefono" name="contacto[telefono]">

            <p>Elija la fecha y la hora para contactarnos:</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else if (e.target.value === 'email') {
        contactoDiv.innerHTML = `
            <input type="email" placeholder="Tu e-mail" id="email" name="contacto[email]" >
        `;
    }
    
}