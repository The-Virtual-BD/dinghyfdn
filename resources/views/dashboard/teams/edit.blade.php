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

                <h1 class="font-raleway font-bold uppercase text-eve">{{$team->name}}'s Information</h1>
                <a href="{{route('teams.index')}}" class="text-eve font-oswald uppercase flex items-center justify-start hover:text-adam">All Members</a>
            </div>
            <div class="flex gap-5">

                <form method="POST" action="{{ route('teams.update', $team->id) }}" class="w-full grid grid-cols-1 sm:grid-cols-3 gap-5" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")

                    <!-- Name -->
                    <div class="">
                        <x-input-label for="name" :value="__('Member Name')" />
                        <x-text-input type="text" class="block mt-1 w-full " id="name" name="name" value="{{$team->name}}"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Designation -->
                    <div class="">
                        <x-input-label for="designation" :value="__('Member Designation')" />
                        <x-text-input type="text" class="block mt-1 w-full " id="designation" name="designation" value="{{$team->designation}}"/>
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
                            <option value="3" @if ($team->type == 3) selected @endif>Volunteer</option>
                            <option value="2" @if ($team->type == 2) selected @endif>Administator</option>
                            <option value="1" @if ($team->type == 1) selected @endif>Founder</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>



                    <div class="flex items-center justify-end sm:col-span-3">
                        <x-primary-button class="ml-4">
                            {{ __('Update Team Member') }}
                        </x-primary-button>
                    </div>
                </form>
                {{-- Member --}}
                <div class="relative group">
                    <img src="{{asset($team->photo)}}" alt="" srcset="" class="w-full mb-2">
                    <p class="text-center font-raleway font-semibold text-xl text-dark mb-1">{{$team->name}}</p>
                    <p class="text-center font-raleway font-semibold text-lg text-dark-light mb-1">{{$team->designation}}</p>
                    <div class="hidden group-hover:flex space-x-2 absolute top-1 left-1">
                        <a href="{{route('teams.edit', $team->id)}}" class="bg-adam-light hover:bg-gray-300 p-2 rounded text-xl text-blue-500"><span class="iconify" data-icon="material-symbols:edit"></span></a>
                        <form action="{{route('teams.destroy',$team->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="bg-adam-light hover:bg-gray-300 p-2 rounded text-xl text-eve"><span class="iconify" data-icon="material-symbols:delete-rounded"></span></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <x-slot name="script">

    </x-slot>
</x-app-layout>
