Uso de la vista `es.blade.php`
================================

Este archivo es un partial Blade que exporta las traducciones del grupo `site` a JavaScript.

Incluir en tu layout (por ejemplo en `resources/views/layouts/app.blade.php`):

@include('es')

Después, en el frontend puedes acceder a las cadenas con `window.Lang.site`.

Ejemplo en JS:

console.log(window.Lang.site.statistics);
