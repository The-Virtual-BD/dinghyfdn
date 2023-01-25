@props(['value'])

<label {{ $attributes->merge(['class' => 'flex item-center font-medium text-sm text-dark font-raleway']) }}>
    {{ $value ?? $slot }}
</label>
