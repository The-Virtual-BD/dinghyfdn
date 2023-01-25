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

    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-raleway font-bold uppercase text-eve">Founders</h1>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-6 gap-5">
                @forelse ($founders as $member)
                {{-- Member --}}
                <div class="relative group">
                    <img src="{{asset($member->photo)}}" alt="" srcset="" class="w-full mb-2">
                    <p class="text-center font-raleway font-semibold text-xl text-dark mb-1">{{$member->name}}</p>
                    <p class="text-center font-raleway font-semibold text-lg text-dark-light mb-1">{{$member->designation}}</p>
                    <div class="hidden group-hover:flex space-x-2 absolute top-1 left-1">
                        <a href="{{route('teams.edit', $member->id)}}" class="bg-adam-light hover:bg-gray-300 p-2 rounded text-xl text-blue-500"><span class="iconify" data-icon="material-symbols:edit"></span></a>
                        <form action="{{route('teams.destroy',$member->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="bg-adam-light hover:bg-gray-300 p-2 rounded text-xl text-eve"><span class="iconify" data-icon="material-symbols:delete-rounded"></span></button>
                        </form>
                    </div>
                </div>
                @empty
                <p>No Member Found.</p>

                @endforelse

            </div>

        </div>
        <div class="p-6 bg-white rounded-md mt-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-raleway font-bold uppercase text-eve">Administators</h1>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-6 gap-5">
                @forelse ($administators as $member)
                {{-- Member --}}
                <div class="relative group">
                    <img src="{{asset($member->photo)}}" alt="" srcset="" class="w-full mb-2">
                    <p class="text-center font-raleway font-semibold text-xl text-dark mb-1">{{$member->name}}</p>
                    <p class="text-center font-raleway font-semibold text-lg text-dark-light mb-1">{{$member->designation}}</p>
                    <div class="hidden group-hover:flex space-x-2 absolute top-1 left-1">
                        <a href="{{route('teams.edit', $member->id)}}" class="bg-adam-light hover:bg-gray-300 p-2 rounded text-xl text-blue-500"><span class="iconify" data-icon="material-symbols:edit"></span></a>
                        <form action="{{route('teams.destroy',$member->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="bg-adam-light hover:bg-gray-300 p-2 rounded text-xl text-eve"><span class="iconify" data-icon="material-symbols:delete-rounded"></span></button>
                        </form>
                    </div>
                </div>
                @empty
                <p>No Member Found.</p>

                @endforelse

            </div>


        </div>
        <div class="p-6 bg-white rounded-md mt-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-raleway font-bold uppercase text-eve">Volunteers</h1>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-6 gap-5">
                @forelse ($volunteers as $member)
                {{-- Member --}}
                <div class="relative group">
                    <img src="{{asset($member->photo)}}" alt="" srcset="" class="w-full mb-2">
                    <p class="text-center font-raleway font-semibold text-xl text-dark mb-1">{{$member->name}}</p>
                    <p class="text-center font-raleway font-semibold text-lg text-dark-light mb-1">{{$member->designation}}</p>
                    <div class="hidden group-hover:flex space-x-2 absolute top-1 left-1">
                        <a href="{{route('teams.edit', $member->id)}}" class="bg-adam-light hover:bg-gray-300 p-2 rounded text-xl text-blue-500"><span class="iconify" data-icon="material-symbols:edit"></span></a>
                        <form action="{{route('teams.destroy',$member->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="bg-adam-light hover:bg-gray-300 p-2 rounded text-xl text-eve"><span class="iconify" data-icon="material-symbols:delete-rounded"></span></button>
                        </form>
                    </div>
                </div>
                @empty
                <p>No Member Found.</p>

                @endforelse

            </div>

        </div>




    </div>


    <x-slot name="script">
        <script>


        </script>
    </x-slot>
</x-app-layout>
