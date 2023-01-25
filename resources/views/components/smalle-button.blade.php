<button
    {{ $attributes->merge(['class' => 'inline-flex items-center py-1 px-2 bg-eve font-bold text-sm text-white font-raleway uppercase tracking-widest hover:bg-white border border-eve hover:border hover:border-eve hover:text-eve focus:outline-none transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
