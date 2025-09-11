# Módulo de Información de la Empresa

## Descripción
Este módulo permite gestionar la información corporativa de la empresa (misión, visión y valores) desde el panel de administración y mostrarla automáticamente en el landing page.

## Archivos Creados/Modificados

### Backend
- **Migración**: `database/migrations/2024_09_11_000000_create_company_info_table.php`
- **Modelo**: `app/Models/CompanyInfo.php`
- **Seeder**: `database/seeders/CompanyInfoSeeder.php`
- **Controlador Livewire**: `app/Livewire/Admin/CompanyInfoManager.php`
- **Componente Livewire**: `app/Livewire/Components/CompanyInfoSection.php`

### Frontend
- **Vista Admin**: `resources/views/livewire/admin/company-info-manager.blade.php`
- **Componente**: `resources/views/livewire/components/company-info-section.blade.php`
- **Landing Page**: Actualizado para mostrar la información de la empresa

### Rutas
- **Admin**: `/admin/company-info` (solo administradores)

### Navegación
- Agregado al sidebar del admin como "Información de Empresa"

## Características

### Panel de Administración
- **Interfaz responsive**: Optimizada para móviles y escritorio
- **Validación**: Campos obligatorios con mínimo 10 caracteres
- **Vista previa**: Muestra cómo se verá la información en el frontend
- **Estados de carga**: Indicadores visuales durante el guardado
- **Mensajes de éxito**: Confirmación de cambios guardados

### Frontend
- **Sección atractiva**: Diseño moderno con gradientes y efectos visuales
- **Completamente responsive**: Se adapta a todos los tamaños de pantalla
- **Iconografía**: Iconos únicos para cada sección (misión, visión, valores)
- **Animaciones**: Efectos de hover y transiciones suaves
- **Valores dinámicos**: Los valores se muestran como lista con viñetas

## Uso

### Para Administradores
1. Accede al panel de administración
2. Ve a "Administración" > "Información de Empresa"
3. Completa los campos de misión, visión y valores
4. Revisa la vista previa
5. Guarda los cambios

### Visualización Pública
- La información se muestra automáticamente en el landing page
- Ubicada estratégicamente entre las estadísticas y los servicios
- Diseño responsive que se adapta a móviles

## Técnicas Implementadas

### Responsive Design
- **Grid flexible**: Cambia de 1 columna en móvil a 3 en escritorio
- **Tipografía escalable**: Tamaños de texto adaptativos
- **Espaciado variable**: Padding y márgenes que se ajustan
- **Botones adaptativos**: Ancho completo en móvil, ancho automático en escritorio

### Patrón Singleton
- El modelo `CompanyInfo` utiliza el patrón singleton para garantizar una sola instancia
- Método `getInstance()` que crea datos por defecto si no existen

### Validación
- Campos obligatorios
- Longitud mínima de 10 caracteres
- Mensajes de error personalizados en español

### UX/UI
- **Loading states**: Indicadores de carga
- **Visual feedback**: Mensajes de éxito/error
- **Iconografía consistente**: Font Awesome icons
- **Color coding**: Cada sección tiene su color distintivo

## Personalización

### Cambiar Colores
```css
/* Misión - Azul */
from-[#0ea5a4] to-blue-500

/* Visión - Azul a Púrpura */
from-blue-500 to-purple-500

/* Valores - Púrpura a Rosa */
from-purple-500 to-pink-500
```

### Modificar Validación
En `app/Livewire/Admin/CompanyInfoManager.php`:
```php
public function rules()
{
    return [
        'mission' => 'required|string|min:10|max:500',
        'vision' => 'required|string|min:10|max:500',
        'values' => 'required|string|min:10|max:1000',
    ];
}
```

### Agregar Campos
1. Agregar columna en la migración
2. Añadir a `$fillable` en el modelo
3. Actualizar la validación
4. Agregar campos al formulario
5. Mostrar en el frontend

## Mantenimiento

### Backup de Datos
```sql
SELECT * FROM company_info;
```

### Resetear a Valores por Defecto
```bash
php artisan db:seed --class=CompanyInfoSeeder
```

### Verificar Funcionamiento
1. Verificar que las rutas funcionan: `/admin/company-info`
2. Comprobar que se muestran en el landing page
3. Probar responsive en diferentes dispositivos
4. Validar formularios con datos incorrectos

## Futuras Mejoras
- [ ] Soporte para múltiples idiomas
- [ ] Editor WYSIWYG para formato rico
- [ ] Historial de cambios
- [ ] Previsualización en tiempo real
- [ ] Importar/Exportar configuración
- [ ] Campos adicionales (historia, equipo, etc.)
