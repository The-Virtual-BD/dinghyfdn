<button
    {{ $attributes->merge(['class' => 'inline-flex items-center p-1 sm:px-5 sm:py-4 bg-eve font-bold text-sm text-white font-raleway uppercase tracking-widest hover:bg-white border border-eve hover:border hover:border-eve hover:text-eve focus:outline-none transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
