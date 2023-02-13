<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                {{ __('All Events') }}
            </x-nav-link>
            <x-nav-link :href="route('events.create')" :active="request()->routeIs('events.create')">
                {{ __('New Event') }}
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

                <h1 class="font-raleway font-bold uppercase text-eve">Event Information</h1>
                <a href="{{route('events.index')}}" class="text-eve font-oswald uppercase flex items-center justify-start hover:text-adam">All Events</a>
            </div>

            <form method="POST" action="{{ route('events.store') }}" class="w-full grid grid-cols-1 sm:grid-cols-3 gap-5" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="sm:col-span-2">
                    <x-input-label for="title" :value="__('Event Title')" />
                    <textarea class="block w-full border-adam mt-1" name="title" id="title" rows="2" required autofocus></textarea>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Short title -->
                <div>
                    <x-input-label for="short_title" :value="__('Event Short Title')" />
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

                <!-- File-->
                <div class="">
                    <x-input-label for="thumbnail" :value="__('Upload Thumbnail Image')" />
                    <x-text-input type="file" class="block mt-1 w-full file:mr-5 file:py-3 file:px-4 file:border-0 file:font-raleway  file:text-white file:bg-eve text-eve" id="thumbnail" name="thumbnail"/>
                    <p class="mt-1 text-sm text-adam font-raleway" id="file_input_help">png, jpg, jpeg (max. 2MB). 150x150</p>
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />

                </div>

                <!-- Start Time-->
                <div class="">
                    <x-input-label for="time_one" :value="__('Start Time')" />
                    <x-text-input type="time" class="block mt-1 w-full " id="time_one" name="time_one" :value="old('time_one')" required/>
                    <x-input-error :messages="$errors->get('time_one')" class="mt-2" />
                </div>
                <!-- End Time-->
                <div class="">
                    <x-input-label for="time_two" :value="__('End Time')" />
                    <x-text-input type="time" class="block mt-1 w-full " id="time_two" name="time_two" :value="old('time_two')" required/>
                    <x-input-error :messages="$errors->get('time_two')" class="mt-2" />
                </div>

                <!-- Stert Date-->
                <div class="">
                    <x-input-label for="date_one" :value="__('Stert Date')" />
                    <x-text-input type="date" class="block mt-1 w-full " id="date_one" name="date_one" :value="old('date_one')"/>
                    <x-input-error :messages="$errors->get('date_one')" class="mt-2" />
                </div>

                <!-- End Date-->
                <div class="">
                    <x-input-label for="date_two" :value="__('End Date')" />
                    <x-text-input type="date" class="block mt-1 w-full " id="date_two" name="date_two" :value="old('date_two')"/>
                    <p class="text-sm text-eve">If the time of the event is more then one day.</p>
                    <x-input-error :messages="$errors->get('date_two')" class="mt-2" />
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

                <!-- Status -->
                <div class="">
                    <x-input-label for="status" :value="__('Status')" />
                    <select name="status" id="status" class="block mt-1 w-full">
                        <option value="1" selected>Upcoming</option>
                        <option value="2">Completed</option>
                        <option value="3">Cancelled</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                <p class="sm:col-span-3 text-eve uppercase font-raleway text-lg font-bold">Address of vanue</p>
                <!-- Address line one-->
                <div class="">
                    <x-input-label for="address_line_one" :value="__('Address line one')" />
                    <x-text-input type="text" class="block mt-1 w-full " id="address_line_one" name="address_line_one" :value="old('address_line_one')" required/>
                    <x-input-error :messages="$errors->get('address_line_one')" class="mt-2" />
                </div>
                <!-- Address line two-->
                <div class="">
                    <x-input-label for="address_line_two" :value="__('Address line two')" />
                    <x-text-input type="text" class="block mt-1 w-full " id="address_line_two" name="address_line_two" :value="old('address_line_two')"/>
                    <x-input-error :messages="$errors->get('address_line_two')" class="mt-2" />
                </div>
                <!-- Address line three-->
                <div class="">
                    <x-input-label for="address_line_three" :value="__('Address line three')" />
                    <x-text-input type="text" class="block mt-1 w-full " id="address_line_three" name="address_line_three" :value="old('address_line_three')"/>
                    <x-input-error :messages="$errors->get('address_line_three')" class="mt-2" />
                </div>
                <p class="sm:col-span-3 text-eve uppercase font-raleway text-lg font-bold">Organizer</p>
                <!-- Organizer Name-->
                <div class="">
                    <x-input-label for="organizer_name" :value="__('Organizer Name')" />
                    <x-text-input type="text" class="block mt-1 w-full " id="organizer_name" name="organizer_name" value="Dingy Foundation"/>
                    <x-input-error :messages="$errors->get('organizer_name')" class="mt-2" />
                </div>
                <!-- Organizer Phone-->
                <div class="">
                    <x-input-label for="organizer_phone" :value="__('Organizer Phone')" />
                    <x-text-input type="text" class="block mt-1 w-full onlynumber" id="organizer_phone" name="organizer_phone"/>
                    <x-input-error :messages="$errors->get('organizer_phone')" class="mt-2" />
                </div>
                <!-- Organizer Website Link-->
                <div class="">
                    <x-input-label for="organizer_link" :value="__('Organizer Website Link')" />
                    <x-text-input type="text" class="block mt-1 w-full" id="organizer_link" name="organizer_link"/>
                    <x-input-error :messages="$errors->get('organizer_link')" class="mt-2" />
                </div>


                <!-- Body -->
                <div class="sm:col-span-3">
                    <x-input-label for="body" :value="__('Body text')" />
                    <textarea
                        class="w-full border-adam rounded-md"
                        name="body" id="body" rows="10" required></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="sm:col-span-3">
                    <x-input-label for="image" :value="__('Image Of This Event')" />
                    <input id="image" name="image[]" multiple="true" type="file" class="mt-2" >
                    <p class="text-sm text-eve">Suitable for completed event.</p>
                </div>

                <div class="flex items-center justify-end sm:col-span-3">

                    <x-primary-button class="ml-4">
                        {{ __('Save Event') }}
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
            CKEDITOR.replace( 'body' , {
                customConfig: '/js/ckeditor_config.js'
            });
        </script>
    </x-slot>
</x-app-layout>
