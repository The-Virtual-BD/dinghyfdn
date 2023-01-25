@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'bg-eve py-1 px-4 text-white uppercase font-bold inline-block absolute right-6 top-6']) }} id="notificationflush">
        {{ $status }}
    </div>
@endif
