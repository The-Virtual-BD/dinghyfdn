<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                {{ __('All Projects') }}
            </x-nav-link>
            <x-nav-link :href="route('projects.create')" :active="request()->routeIs('projects.create')">
                {{ __('New Project') }}
            </x-nav-link>
        </div>
    </x-slot>

    <x-slot name="headerscript">
        <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    </x-slot>
    <x-slot name="headerstyle">
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    </x-slot>

    <div class="p-6 ">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">

                <h1 class="font-raleway font-bold uppercase text-eve">Project Information</h1>
                <a href="{{route('projects.index')}}" class="text-eve font-oswald uppercase flex items-center justify-start hover:text-adam">All Projects</a>
            </div>

            <form method="POST" action="{{ route('projects.store') }}" class="w-full grid grid-cols-1 sm:grid-cols-3 gap-5" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="sm:col-span-2">
                    <x-input-label for="title" :value="__('Project Title')" />
                    <textarea class="block w-full border-adam mt-1" name="title" id="title" rows="2" required autofocus></textarea>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Short title -->
                <div>
                    <x-input-label for="short_title" :value="__('Project Short Title')" />
                    <textarea class="block w-full border-adam mt-1" name="short_title" id="short_title" rows="2" required autofocus></textarea>
                    <x-input-error :messages="$errors->get('short_title')" class="mt-2" />
                </div>

                <!-- File-->
                <div class="">
                    <x-input-label for="cover" :value="__('Upload Cover Image')" />
                    <x-text-input type="file" class="block mt-1 w-full file:mr-5 file:py-3 file:px-4 file:border-0 file:font-raleway  file:text-white file:bg-eve text-eve" id="cover" name="cover"/>
                    <p class="mt-1 text-sm text-adam font-raleway" id="file_input_help">png, jpg, jpeg (max. 2MB).</p>
                    <x-input-error :messages="$errors->get('cover')" class="mt-2" />

                </div>

                <!-- Date-->
                <div class="">
                    <x-input-label for="date" :value="__('Publish Date')" />
                    <x-text-input type="date" class="block mt-1 w-full " id="date" name="date" :value="old('date')"/>
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <!-- Category -->
                <div class="">
                    <x-input-label for="category_id" :value="__('Select Category')" />
                    <select name="category_id" id="category_id" class="block mt-1 w-full">
                        @forelse ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @empty
                        <option value="" disabled>No Category Found</option>
                        @endforelse
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                <div class="">
                    <x-input-label for="image" :value="__('Image Of This Project')" />
                    <input id="image" name="image[]" multiple="true" type="file" class="mt-2" >
                </div>

                <!-- Target fund -->
                <div class="">
                    <x-input-label for="target_fund" :value="__('Target Fund')" />
                    <x-text-input id="target_fund" class="block mt-1 w-full" type="number" name="target_fund" :value="old('target_fund')" required />
                    <x-input-error :messages="$errors->get('target_fund')" class="mt-2" />
                </div>


                <!-- Raised fund -->
                <div class="">
                    <x-input-label for="raised_fund" :value="__('Raised Fund')" />
                    <x-text-input id="raised_fund" class="block mt-1 w-full" type="number" name="raised_fund" :value="old('raised_fund')" required />
                    <x-input-error :messages="$errors->get('raised_fund')" class="mt-2" />
                </div>

                <!-- Body -->
                <div class="sm:col-span-3">
                    <x-input-label for="body" :value="__('Body text')" />
                    <textarea
                        class="w-full border-adam rounded-md"
                        name="body" id="body" rows="10" required></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end sm:col-span-3">

                    <x-primary-button class="ml-4">
                        {{ __('Save Project') }}
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

            // CKEditor 4
            CKEDITOR.replace( 'body' );
        </script>
    </x-slot>
</x-app-layout>
