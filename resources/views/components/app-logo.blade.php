@props([
    'href' => route('home'),
    'size' => 'md', // md, sm, lg, xl
])

@php
    $sizes = [
        'sm' => 'h-6',
        'md' => 'h-8',
        'lg' => 'h-10',
        'xl' => 'h-16',
    ];
    $iconSize = $sizes[$size] ?? $sizes['md'];
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 select-none focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-[#021869]/60 rounded-sm']) }}>
    <x-app-logo-icon class="{{ $iconSize }} w-auto max-h-10" />
    <span class="sr-only">{{ config('app.name', 'IXXI TECNOLOGÍA') }}</span>
</a>
