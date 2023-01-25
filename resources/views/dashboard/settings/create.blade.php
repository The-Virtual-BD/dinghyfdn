<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.index')">
                {{ __('All Settings') }}
            </x-nav-link>
            <x-nav-link :href="route('settings.create')" :active="request()->routeIs('settings.create')">
                {{ __('New Setting') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <form method="POST" action="{{ route('settings.store') }}" class="w-full grid grid-cols-1 sm:grid-cols-2 gap-5">
                @csrf

                <!-- Property -->
                <div>
                    <x-input-label for="property" :value="__('Setting Name')" />
                    <x-text-input id="property" class="block mt-1 w-full" type="text" name="property" :value="old('property')" required autofocus />
                    <x-input-error :messages="$errors->get('property')" class="mt-2" />
                </div>

                <!-- Value -->
                <div class="">
                    <x-input-label for="value" :value="__('Value')" />
                    <x-text-input id="value" class="block mt-1 w-full" type="text" name="value" :value="old('value')" required />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end sm:col-span-2">
                    <x-primary-button class="ml-4">
                        {{ __('Create Setting') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>
