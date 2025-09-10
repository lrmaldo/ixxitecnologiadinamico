import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

// Inicializar AOS
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        mirror: false,
        anchorPlacement: 'top-bottom',
        offset: 100
    });
});