@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-1 text-base font-bold text-raleway uppercase leading-5 text-dark-light focus:outline-none transition duration-150 ease-in-out w-full'
            : 'inline-flex items-center px-4 py-1 text-base font-bold text-raleway uppercase leading-5 text-dark hover:text-white hover:bg-eve hover:border-gray-300 focus:outline-none focus:text-dark-light transition duration-150 ease-in-out w-full';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
