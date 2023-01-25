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
            <form method="POST" action="{{ route('settings.update', $setting->id) }}" class="w-full grid grid-cols-1 gap-5">
                @csrf
                @method("PATCH")

                <!-- Value -->
                <div class="">
                    <label for="value" class="flex item-center font-medium text-sm text-dark font-raleway capitalize">{{$setting->property}}</label>
                    <x-text-input id="value" class="block mt-1 w-full" type="text" name="value" value="{{$setting->value}}" required />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end ">
                    <x-primary-button class="ml-4">
                        {{ __('Update Setting') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>
