<?php /*
Esta vista Blade exporta las traducciones del grupo 'site' a JavaScript.
Uso: incluirla en el layout principal para exponer `window.Lang.site`.
Ejemplo: @include('es') o @include('views.es') según convenciones.
*/ ?>

<script>
    // Exporta las traducciones de resources/lang/es/site.php hacia JS
    window.Lang = window.Lang || {};
    window.Lang.site = @json(trans('site'));
</script>

<!-- Opcional: disponible como partial para usar en <head> o justo antes del cierre de <body> -->
