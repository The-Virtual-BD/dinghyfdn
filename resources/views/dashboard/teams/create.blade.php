<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('teams.index')" :active="request()->routeIs('teams.index')">
                {{ __('All Members') }}
            </x-nav-link>
            <x-nav-link :href="route('teams.create')" :active="request()->routeIs('teams.create')">
                {{ __('New Team Member') }}
            </x-nav-link>
        </div>
    </x-slot>


    <div class="p-6 ">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">

                <h1 class="font-raleway font-bold uppercase text-eve">Member Information</h1>
                <a href="{{route('teams.index')}}" class="text-eve font-oswald uppercase flex items-center justify-start hover:text-adam">All Members</a>
            </div>

            <form method="POST" action="{{ route('teams.store') }}" class="w-full grid grid-cols-1 sm:grid-cols-3 gap-5" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="">
                    <x-input-label for="name" :value="__('Member Name')" />
                    <x-text-input type="text" class="block mt-1 w-full " id="name" name="name" :value="old('name')"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Designation -->
                <div class="">
                    <x-input-label for="designation" :value="__('Member Designation')" />
                    <x-text-input type="text" class="block mt-1 w-full " id="designation" name="designation" :value="old('designation')"/>
                    <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                </div>


                <!-- File-->
                <div class="">
                    <x-input-label for="photo" :value="__('Upload Photo ( png, jpg, jpeg | max. 2MB | Must be 256 x 256 )')" />
                    <x-text-input type="file" class="block mt-1 w-full file:mr-5 file:py-3 file:px-4 file:border-0 file:font-raleway  file:text-white file:bg-eve text-eve" id="photo" name="photo"/>
                    <p class="mt-1 text-sm text-adam font-raleway" id="file_input_help">png, jpg, jpeg (max. 2MB). Must be 256 x 256</p>
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />

                </div>


                <!-- Type -->
                <div class="">
                    <x-input-label for="type" :value="__('Select Type')" />
                    <select name="type" id="type" class="block mt-1 w-full">
                        <option value="3">Volunteer</option>
                        <option value="2">Administator</option>
                        <option value="1">Founder</option>
                    </select>
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>



                <div class="flex items-center justify-end sm:col-span-3">

                    <x-primary-button class="ml-4">
                        {{ __('Save Team Member') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>


    <x-slot name="script">

    </x-slot>
</x-app-layout>
