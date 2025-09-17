@props([
    'alt' => config('app.name', 'IXXI TECNOLOGÍA'),
])
<img src="{{ url('img/logo.png') }}" alt="{{ $alt }}" loading="lazy" {{ $attributes->merge(['class' => 'block h-auto w-auto max-h-10 select-none']) }} />
