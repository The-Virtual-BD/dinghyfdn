@props(['active'])

@php
$classes = ($active ?? false)
            ? 'my-1 inline-flex items-center justify-center sm:justify-start text-base text-raleway leading-5 text-eve hover:text-eve focus:outline-none transition duration-150 ease-in-out'
            : 'my-1 inline-flex items-center justify-center sm:justify-start text-base text-raleway leading-5 text-darlk hover:text-eve hover:border-gray-300 focus:outline-none focus:text-dark-light transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="iconify mr-2 hidden sm:block" data-icon="material-symbols:arrow-right-alt"></span>{{ $slot }}
</a>
