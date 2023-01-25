<button {{ $attributes->merge(['class' => 'inline-flex items-center px-5 py-4 bg-white font-bold text-sm text-eve font-raleway uppercase border border-white tracking-widest hover:bg-eve hover:border hover:border-white hover:text-white focus:outline-none transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
