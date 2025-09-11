# Carrusel de Fondo en Header - Landing Page

## Descripción
Se ha implementado un carrusel de imágenes de fondo con efecto crossfade en el header del landing page, reemplazando el fondo azul estático anterior.

## Características Implementadas

### 🎨 **Carrusel de Fondo**
- **Imágenes de fondo**: Utiliza las primeras 6 imágenes de la galería
- **Efecto crossfade**: Transición suave de 2 segundos entre imágenes
- **Cambio automático**: Cada 5 segundos cambia automáticamente
- **Object-cover**: Las imágenes se ajustan perfectamente sin deformarse
- **Fallback**: Gradiente azul cuando no hay imágenes disponibles

### 📱 **Responsive Design**
- **Desktop**: Imágenes centradas con object-position center
- **Mobile**: Optimización específica para pantallas pequeñas
- **Adaptive loading**: Lazy loading para imágenes no visibles
- **Performance**: Primera imagen con eager loading

### 🎯 **Contraste y Legibilidad**
- **Overlay degradado**: `bg-gradient-to-b from-blue-900/70 to-blue-900/40`
- **Text shadows**: Sombras fuertes para mejor legibilidad
- **Z-index optimizado**: Contenido en z-20, overlay en z-10
- **Colores mejorados**: Texto blanco con gradientes para destacar

### 🔧 **Interactividad**
- **Indicadores visuales**: Puntos en la parte inferior para navegación manual
- **Pausa inteligente**: Al hacer clic manual, pausa por 3 segundos
- **Alpine.js integration**: Control de estado reactivo
- **Smooth transitions**: Animaciones CSS optimizadas

## Código Clave

### Estructura HTML
```html
<header class="relative min-h-screen flex flex-col justify-center items-center overflow-hidden">
    <!-- Carrusel de imágenes de fondo -->
    <div class="absolute inset-0 w-full h-full">
        <!-- Imágenes con crossfade -->
    </div>
    
    <!-- Overlay para contraste -->
    <div class="absolute inset-0 bg-gradient-to-b from-blue-900/70 to-blue-900/40"></div>
    
    <!-- Contenido en primer plano -->
    <div class="relative z-20">
        <!-- Logo, título, botones -->
    </div>
</header>
```

### CSS Personalizado
```css
.hero-bg-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.text-shadow-strong {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

@media (max-width: 768px) {
    .hero-bg-image {
        object-position: center center;
    }
}
```

### Alpine.js Controller
```javascript
// Variables para el carrusel de fondo
headerSlide: 0,
headerTotalSlides: {{ $gallery && $gallery->count() > 0 ? $gallery->take(6)->count() : 0 }},

// Autoplay del carrusel
startHeaderAutoplay(){
    if(!this.headerIntervalId && this.headerTotalSlides > 0)
        this.headerIntervalId = setInterval(()=>{
            this.headerSlide = (this.headerSlide + 1) % this.headerTotalSlides
        }, 5000)
}
```

## Mejoras de Performance

### ⚡ **Optimizaciones**
- **Lazy loading**: Solo la primera imagen se carga inmediatamente
- **Transiciones CSS**: Uso de GPU acceleration
- **Clases condicionales**: Alpine.js maneja el estado de forma eficiente
- **Fallback inteligente**: Gradiente CSS cuando fallan las imágenes

### 📊 **Métricas**
- **Tiempo de transición**: 2000ms (suave pero perceptible)
- **Intervalo de cambio**: 5000ms (tiempo óptimo para lectura)
- **Pausa manual**: 3000ms (permite interacción sin interrupciones)

## Responsive Breakpoints

| Dispositivo | Logo Size | Text Size | Button Layout |
|-------------|-----------|-----------|---------------|
| Mobile (< 640px) | h-24 | text-3xl | Vertical stack |
| Tablet (640-1024px) | h-32 | text-4xl | Horizontal |
| Desktop (> 1024px) | h-48+ | text-6xl+ | Horizontal |

## Navegación Manual

### 🎮 **Controles de Usuario**
- **Indicadores**: Puntos en la parte inferior del header
- **Click interactivo**: Cambio inmediato a imagen seleccionada
- **Pausa temporal**: 3 segundos sin autoplay tras interacción manual
- **Estados visuales**: Punto activo con scale y shadow
- **Accesibilidad**: aria-labels para lectores de pantalla

## Compatibilidad

### ✅ **Navegadores Soportados**
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

### ✅ **Tecnologías Utilizadas**
- TailwindCSS (transiciones y layout)
- Alpine.js (estado reactivo)
- CSS Grid/Flexbox (responsive layout)
- CSS object-fit (aspect ratio handling)

## Mantenimiento

### 🔄 **Actualización de Imágenes**
Las imágenes se toman automáticamente de la galería existente. Para modificar:
1. Actualizar galería desde el admin
2. Las primeras 6 imágenes se usarán automáticamente
3. Fallback a gradiente si no hay imágenes

### 🎨 **Personalización de Colores**
```css
/* Cambiar overlay */
from-blue-900/70 to-blue-900/40

/* Cambiar fallback */
from-[#021869] via-[#0a1f4c] to-[#021869]

/* Cambiar indicadores */
bg-white (activo) | bg-white/60 (inactivo)
```

### ⚙️ **Configuración de Timing**
```javascript
// Cambiar velocidad de transición (CSS)
duration-[2000ms] // 2 segundos

// Cambiar intervalo de autoplay
setInterval(..., 5000) // 5 segundos

// Cambiar pausa tras interacción
setTimeout(..., 3000) // 3 segundos
```

## Troubleshooting

### ⚠️ **Problemas Comunes**
1. **Imágenes no cargan**: Verificar rutas y permisos de storage
2. **Transiciones bruscas**: Comprobar duración CSS vs JavaScript
3. **Performance lenta**: Optimizar tamaño de imágenes de galería
4. **Overlay muy oscuro**: Ajustar opacidad del gradiente

### 🔧 **Debugging**
```javascript
// Ver estado actual del carrusel
console.log('Header slide:', this.headerSlide);
console.log('Total slides:', this.headerTotalSlides);

// Forzar cambio manual
this.headerSlide = 2; // Cambiar a tercera imagen
```

## Futuras Mejoras
- [ ] Preload de la siguiente imagen
- [ ] Efecto parallax en scroll
- [ ] Integración con video backgrounds
- [ ] Gestos touch para móviles
- [ ] Modo reducido de movimiento (accessibility)
- [ ] Análisis de engagement por imagen
