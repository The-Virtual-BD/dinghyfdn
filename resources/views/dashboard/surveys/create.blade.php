<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('researches.index')" :active="request()->routeIs('researches.index')">
                {{ __('All Researches') }}
            </x-nav-link>
            <x-nav-link :href="route('casestudies.index')" :active="request()->routeIs('casestudies.index')">
                {{ __('Case Studies') }}
            </x-nav-link>
            <x-nav-link :href="route('surveys.index')" :active="request()->routeIs('surveys.index')">
                {{ __('Surveys') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6 ">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">

                <h1 class="font-raleway font-bold uppercase text-eve">Survey Information</h1>
                <a href="{{route('surveys.index')}}" class="text-eve font-oswald uppercase flex items-center justify-start hover:text-adam">All Surveys</a>
            </div>

            <form method="POST" action="{{ route('surveys.store') }}" class="w-full grid grid-cols-1 sm:grid-cols-3 gap-5" enctype="multipart/form-data">
                @csrf

                <!-- Number -->
                <div>
                    <x-input-label for="number" :value="__('Survey Number')" />
                    <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required autofocus />
                    <x-input-error :messages="$errors->get('number')" class="mt-2" />
                </div>

                <!-- Subject -->
                <div class="">
                    <x-input-label for="subject" :value="__('Subject')" />
                    <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required />
                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                </div>

                <!-- Supervisor-->
                <div class="">
                    <x-input-label for="supervisors" :value="__('Supervisors')" />
                    <x-text-input type="text" class="block mt-1 w-full" id="supervisors" name="supervisors" :value="old('supervisors')"/>
                    <p class="mt-1 text-sm text-adam font-raleway" id="file_input_help">Supervisors name should be seperated by "," comma</p>
                    <x-input-error :messages="$errors->get('supervisors')" class="mt-2" />
                </div>

                <!-- Date-->
                <div class="">
                    <x-input-label for="date" :value="__('Publish Date')" />
                    <x-text-input type="date" class="block mt-1 w-full " id="date" name="date" :value="old('date')"/>
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <!--Link -->
                <div class="">
                    <x-input-label for="link" :value="__('Paper Link')" />
                    <x-text-input type="text" class="block mt-1 w-full" id="link" name="link" :value="old('link')"/>
                    <x-input-error :messages="$errors->get('link')" class="mt-2" />
                </div>

                <!-- File-->
                <div class="">
                    <x-input-label for="file" :value="__('Upload file')" />
                    <x-text-input type="file" class="block mt-1 w-full file:mr-5 file:py-3 file:px-4 file:border-0 file:font-raleway  file:text-white file:bg-eve text-eve" id="file" name="file"/>
                    <p class="mt-1 text-sm text-adam font-raleway" id="file_input_help">DOC,PDF, XLS, JPG (MAX. 5MB).</p>
                    <x-input-error :messages="$errors->get('file')" class="mt-2" />


                </div>

                <div class="flex items-center justify-end sm:col-span-3">

                    <x-primary-button class="ml-4">
                        {{ __('Save Survey') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
