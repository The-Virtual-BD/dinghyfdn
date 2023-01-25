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

    <div class="p-6">
        <form action="{{route('projects.update',$project->id)}}" method="post" class="block bg-white p-6 rounded-md" enctype="multipart/form-data">
            @csrf
            @method("PATCH")

            <div class="mx-auto grid grid-cols-3 mb-7 gap-5">
                <div class="col-span-3 sm:col-span-2">
                    <div class="flex sm:space-x-6 mb-7 flex-col sm:flex-row">
                        <p class="flex items-center uppercase"><span class="iconify text-eve mr-2" data-icon="uis:calender"></span>{{ date('d-M, Y', strtotime($project->publish_date)) }}</p>
                        <p class="flex items-center uppercase"><span class="text-eve mr-2" >Project in:</span>{{$project->category->name}}</p>
                    </div>
                    <div class="flex sm:space-x-6 mb-7 flex-col sm:flex-row">
                        <div class="">
                            <x-input-label for="date" :value="__('Publish Date')" />
                            <x-text-input type="date" class="block mt-1 w-full " id="date" name="date" value="{{$project->publish_date}}"/>
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="">
                            <x-input-label for="category_id" :value="__('Select Category')" />
                            <select name="category_id" id="category_id" class="block mt-1 w-full">
                                @forelse ($categories as $category)
                                <option value="{{$category->id}}" @if ($category->id == $project->category_id) selected @endif>{{$category->name}}</option>
                                @empty
                                <option value="" disabled>No Category Found</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                    </div>
                    <div class="">

                        <h1 class="font-bold text-3xl sm:text-6xl uppercase font-oswald">{{$project->title}}</h1>
                        <!-- Title -->
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Project Title')" />
                            <textarea class="block w-full border-adam mt-1" name="title" id="title" rows="2" required>{{$project->title}}</textarea>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>
                </div>
                {{-- Project --}}
                <div class="bg-adam-light p-9 hidden sm:block">
                    <p class="inline-block text-dark uppercase top-8 left-0">Join Us</p>
                    <h3 class="font-bold font-oswald text-2xl text-dark uppercase mb-3">{{$project->short_title}}</h3>
                    <!-- Short title -->
                    <div class="mt-4">
                        <x-input-label for="short_title" :value="__('Project Short Title')" />
                        <textarea class="block w-full border-adam mt-1" name="short_title" id="short_title" rows="1" required >{{$project->short_title}}</textarea>
                        <x-input-error :messages="$errors->get('short_title')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-start mb-2">
                            <p class="text-dark"><span class="text-lg font-raleway font-bold text-eve mr-2">${{$project->raised_fund}}</span>of<span class="text-lg font-raleway font-bold text-eve mx-2">${{$project->target_fund}}</span><span class=""> raised</span></p>
                        </div>
                        <div class="w-full bg-white mb-4">
                            <div class="h-5 bg-orange-500 w-3/5"></div>
                        </div>
                        <div class="flex justify-center items-center gap-2">
                            <!-- Raised fund -->
                            <div class="">
                                <x-input-label for="raised_fund" :value="__('Raised Fund')" />
                                <x-text-input id="raised_fund" class="block mt-1 w-full" type="number" name="raised_fund" value="{{$project->raised_fund}}" required />
                                <x-input-error :messages="$errors->get('raised_fund')" class="mt-2" />
                            </div>

                            <!-- Target fund -->
                            <div class="">
                                <x-input-label for="target_fund" :value="__('Target Fund')" />
                                <x-text-input id="target_fund" class="block mt-1 w-full" type="number" name="target_fund" value="{{$project->target_fund}}" required />
                                <x-input-error :messages="$errors->get('target_fund')" class="mt-2" />
                            </div>
                        </div>
                        <x-largee-button class="w-full flex justify-center items-center mt-4" onClick="event.preventDefault();">Donate Now! </x-largee-button>
                    </div>
                </div>
            </div>
            <div class="mb-7">
                <div class="">
                    <img src="{{asset($project->cover)}}" alt="" srcset="" class="w-full mb-7">
                    <!-- File-->
                    <div class="my-4">
                        <x-input-label for="cover" :value="__('Upload Cover Image')" />
                        <x-text-input type="file" class="block mt-1 w-full file:mr-5 file:py-3 file:px-4 file:border-0 file:font-raleway  file:text-white file:bg-eve text-eve" id="cover" name="cover"/>
                        <p class="mt-1 text-sm text-adam font-raleway" id="file_input_help">png, jpg, jpeg (max. 2MB).</p>
                        <x-input-error :messages="$errors->get('cover')" class="mt-2" />

                    </div>
                    <p class="mb-7 font-raleway text-base">{!!$project->body!!}</p>
                    <!-- Body -->
                    <div class="sm:col-span-3 mt-4">
                        <x-input-label for="body" :value="__('Body text')" />
                        <textarea
                            class="w-full border-adam rounded-md"
                            name="body" id="body" rows="10" required>{!!$project->body!!}</textarea>
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
                    {{ __('Update Project') }}
                </x-primary-button>
            </div>

        </form>

        <div class="p-6 bg-white rounded-md mt-4">
            <h2 class="font-bold font-oswald text-lg uppercase text-eve mb-4">Images Of <span class="uppercase">{{$project->title}} project</span></h2>
            {{-- Images will  be shown here --}}

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-5">

                @foreach ($project->media as $media)
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
