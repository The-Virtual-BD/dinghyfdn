<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.index')">
                {{ __('All Galleries') }}
            </x-nav-link>
            <x-nav-link :href="route('galleries.create')" :active="request()->routeIs('galleries.create')">
                {{ __('Add New Gallery') }}
            </x-nav-link>
        </div>
    </x-slot>

    <x-slot name="headerstyle">
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    </x-slot>

    <div class="p-6 ">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">

                <h1 class="font-raleway font-bold uppercase text-eve">Gallery Information</h1>
                <a href="{{ route('galleries.index') }}"
                    class="text-eve font-oswald uppercase flex items-center justify-start hover:text-adam">All
                    Galleries</a>
            </div>

            <form method="POST" action="{{ route('galleries.store') }}"
                class="w-full grid grid-cols-1 sm:grid-cols-3 gap-5" enctype="multipart/form-data">
                @csrf

                <!-- Topic -->
                <div>
                    <x-input-label for="topic" :value="__('Topic')" />
                    <x-text-input id="topic" class="block mt-1 w-full" type="text" name="topic"
                        :value="old('topic')" required autofocus />
                    <x-input-error :messages="$errors->get('topic')" class="mt-2" />
                </div>

                <div class="mt-4 sm:col-span-3">
                    <input id="image" name="image[]" multiple="true" type="file" class="" required>
                </div>


                <div class="flex items-center justify-end sm:col-span-3">

                    <x-primary-button class="ml-4">
                        {{ __('Save Gallery') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>


    <x-slot name="script">
        <!-- Load FilePond library -->
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

        <!-- Turn all file input elements into ponds -->
        <script>
            // Create the FilePond instance
            FilePond.create(document.querySelector('input[name="image[]"]'), {
                chunkUploads: true
            });
            FilePond.setOptions({
                server: {
                    url: '/tempUpload',
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                    }
                }
            });
        </script>
    </x-slot>

</x-app-layout>
