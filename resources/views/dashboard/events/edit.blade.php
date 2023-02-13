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

    <div class="p-6">
        <form action="{{route('events.update',$event->id)}}" method="post" class="block bg-white p-6 rounded-md" enctype="multipart/form-data">
            @csrf
            @method("PATCH")

            <div class="mx-auto grid grid-cols-3 mb-7 gap-5">
                <div class="col-span-3 sm:col-span-2">
                    <div class="flex sm:space-x-6 mb-7 flex-col sm:flex-row">
                        <p class="flex items-center uppercase"><span class="iconify text-eve mr-2" data-icon="uis:calender"></span>{{ date('d-M, Y', strtotime($event->date_one)) }}</p>
                        <p class="flex items-center uppercase"><span class="text-eve mr-2" >Event in:</span>{{$event->category->name}}</p>
                    </div>
                    <div class="flex sm:space-x-6 mb-7 flex-col sm:flex-row">
                        <!-- Start Time-->
                        <div class="">
                            <x-input-label for="time_one" :value="__('Start Time')" />
                            <x-text-input type="time" class="block mt-1 w-full " id="time_one" name="time_one" value="{{$event->time_one}}" required/>
                            <x-input-error :messages="$errors->get('time_one')" class="mt-2" />
                        </div>
                        <!-- End Time-->
                        <div class="">
                            <x-input-label for="time_two" :value="__('End Time')" />
                            <x-text-input type="time" class="block mt-1 w-full " id="time_two" name="time_two" value="{{$event->time_two ? $event->time_two : ''}}" required/>
                            <x-input-error :messages="$errors->get('time_two')" class="mt-2" />
                        </div>

                        <!-- Stert Date-->
                        <div class="">
                            <x-input-label for="date_one" :value="__('Stert Date')" />
                            <x-text-input type="date" class="block mt-1 w-full " id="date_one" name="date_one" value="{{$event->date_one}}"/>
                            <x-input-error :messages="$errors->get('date_one')" class="mt-2" />
                        </div>

                        <!-- End Date-->
                        <div class="">
                            <x-input-label for="date_two" :value="__('End Date')" />
                            <x-text-input type="date" class="block mt-1 w-full " id="date_two" name="date_two" value="{{$event->date_two ? $event->date_two : ''}}"/>
                            <p class="text-sm text-eve">If the time of the event is more then one day.</p>
                            <x-input-error :messages="$errors->get('date_two')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="">
                            <x-input-label for="category_id" :value="__('Select Category')" />
                            <select name="category_id" id="category_id" class="block mt-1 w-full">
                                @forelse ($categories as $category)
                                <option value="{{$category->id}}" @if ($category->id == $event->category_id) selected @endif>{{$category->name}}</option>
                                @empty
                                <option value="" disabled>No Category Found</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                    </div>
                    <div class="">

                        <h1 class="font-bold text-3xl sm:text-6xl uppercase font-oswald">{{$event->title}}</h1>
                        <!-- Title -->
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Project Title')" />
                            <textarea class="block w-full border-adam mt-1" name="title" id="title" rows="2" required>{{$event->title}}</textarea>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>
                </div>
                {{-- Project --}}
                <div class="bg-adam-light p-9 hidden sm:block">
                    <!-- Status -->
                    <div class="mb-4">
                        <x-input-label for="status" :value="__('Status')" />
                        <select name="status" id="status" class="block mt-1 w-full">
                            <option value="1" @if ($event->status == '1') selected @endif>Upcoming</option>
                            <option value="2" @if ($event->status == '2') selected @endif>Completed</option>
                            <option value="3" @if ($event->status == '3') selected  @endif>Cancelled</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>
                    <p class="inline-block text-dark uppercase top-8 left-0">Join Us</p>
                    <h3 class="font-bold font-oswald text-2xl text-dark uppercase mb-3">{{$event->short_title}}</h3>
                    <!-- Short title -->
                    <div class="mt-4">
                        <x-input-label for="short_title" :value="__('Project Short Title')" />
                        <textarea class="block w-full border-adam mt-1" name="short_title" id="short_title" rows="1" required >{{$event->short_title}}</textarea>
                        <x-input-error :messages="$errors->get('short_title')" class="mt-2" />
                    </div>
                    <p class="sm:col-span-3 text-eve uppercase font-raleway text-lg font-bold mt-4">Address of vanue</p>
                    <!-- Address line one-->
                    <div class="mt-2">
                        <x-input-label for="address_line_one" :value="__('Address line one')" />
                        <x-text-input type="text" class="block mt-1 w-full " id="address_line_one" name="address_line_one" value="{{$event->address_line_one}}" required/>
                        <x-input-error :messages="$errors->get('address_line_one')" class="mt-2" />
                    </div>
                    <!-- Address line two-->
                    <div class="mt-2">
                        <x-input-label for="address_line_two" :value="__('Address line two')" />
                        <x-text-input type="text" class="block mt-1 w-full " id="address_line_two" name="address_line_two" value="{{$event->address_line_two ? $event->address_line_two : ''}}"/>
                        <x-input-error :messages="$errors->get('address_line_two')" class="mt-2" />
                    </div>
                    <!-- Address line three-->
                    <div class="mt-2">
                        <x-input-label for="address_line_three" :value="__('Address line three')" />
                        <x-text-input type="text" class="block mt-1 w-full " id="address_line_three" name="address_line_three" value="{{$event->address_line_three ? $event->address_line_three: ''}}"/>
                        <x-input-error :messages="$errors->get('address_line_three')" class="mt-2" />
                    </div>

                </div>
            </div>
            <div class="mb-7">
                <div class="">
                    <img src="{{asset($event->cover)}}" alt="" srcset="" class="w-full mb-7">
                    <!-- File-->
                    <div class="my-4">
                        <x-input-label for="cover" :value="__('Upload Cover Image')" />
                        <x-text-input type="file" class="block mt-1 w-full file:mr-5 file:py-3 file:px-4 file:border-0 file:font-raleway  file:text-white file:bg-eve text-eve" id="cover" name="cover"/>
                        <p class="mt-1 text-sm text-adam font-raleway" id="file_input_help">png, jpg, jpeg (max. 2MB).</p>
                        <x-input-error :messages="$errors->get('cover')" class="mt-2" />

                    </div>
                    <p class="mb-7 font-raleway text-base">{!!$event->body!!}</p>
                    <!-- Body -->
                    <div class="sm:col-span-3 mt-4">
                        <x-input-label for="body" :value="__('Body text')" />
                        <textarea
                            class="w-full border-adam rounded-md"
                            name="body" id="body" rows="10" required>{!!$event->body!!}</textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>
                </div>

            </div>
            <div class="mt-4 sm:col-span-3">
                <x-input-label for="image" :value="__('Image Of This Project')" />
                <input id="image" name="image[]" multiple="true" type="file" class="mt-2" >
            </div>

            <div class="flex items-center justify-end sm:col-span-3">

                <x-primary-button class="w-full flex justify-center items-center">
                    {{ __('Update Event') }}
                </x-primary-button>
            </div>

        </form>

        <div class="p-6 bg-white rounded-md mt-4">
            <h2 class="font-bold font-oswald text-lg uppercase text-eve mb-4">Images Of <span class="uppercase">{{$event->title}} Event</span></h2>
            {{-- Images will  be shown here --}}

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-5">

                @foreach ($event->media as $media)
                <div class="relative group">
                    <img src="{{$media->original_url}}" alt="" srcset="">
                    <form action="{{route('mediaDelete',[$media->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="absolute hidden group-hover:block right-2.5 top-2.5 text-xl text-orange-300 hover:text-eve px-1 py-1 rounded bg-gray-300/40 hover:bg-gray-800"><span class="iconify" data-icon="bi:trash-fill"></button>
                    </form>
                </div>
                @endforeach
            </div>

        </div>
    </div>


    <x-slot name="script">
        <!-- Load FilePond library -->
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <!-- Turn all file input elements into ponds -->
        <script>
            $('ul').addClass('list-disc ml-4');
            $('ol').addClass('list-decimal ml-4');
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
