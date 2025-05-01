import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import '../css/app.scss'
import * as bootstrap from 'bootstrap'
//BACK TO TOP
$(document).ready(function() {
    // Muestra el botón cuando se desplaza más allá de la posición del navbar (puedes ajustar este valor).
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) { // Ajusta este valor según la altura de tu navbar
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });

    // Al hacer clic en el botón, nos lleva a la parte superior de la página.
    $('.back-to-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });
});
//END BACK TO TOP
