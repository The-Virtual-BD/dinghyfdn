@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-base font-bold text-raleway uppercase leading-5 text-dark-light focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-base font-bold text-raleway uppercase leading-5 text-dark hover:text-dark-light hover:border-gray-300 focus:outline-none focus:text-dark-light transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
