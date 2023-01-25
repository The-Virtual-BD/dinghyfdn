<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('volunteerApplications.index')" :active="request()->routeIs('volunteerApplications.index')">
                {{ __('Volunteer Applications') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 bg-white rounded-md flex gap-5">
            <img src="{{asset($volunteerApplication->photo)}}" alt="" srcset="">
            <div class="flex flex-col justify-between">
                <div class="">
                    <p class="font-bold text-xl text-eve uppercase">{{$volunteerApplication->name}}</p>
                    <p>Email: {{$volunteerApplication->email}}</p>
                    <p>Phone: {{$volunteerApplication->phone}}</p>
                    <p>Address: {{$volunteerApplication->address}}</p>
                    <p>Status: @if ($volunteerApplication->status == 1) <span class="text-red-400 font-bold uppercase">Pending</span> @elseif ($volunteerApplication->status == 2)<span class="text-blue-400 font-bold uppercase">Accepted</span> @elseif ($volunteerApplication->status == 3) <span class="text-red-500 font-bold uppercase">Declined</span> @endif</p>
                </div>
                <div class="flex gap-2">
                    @if ($volunteerApplication->cv)
                        <a href="/{{$volunteerApplication->cv}}"><x-largee-button>Download cv</x-largee-button></a>
                    @endif
                    <form action="{{route('volunteerApplications.update',$volunteerApplication->id)}}" method="post">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="statuschange" value="2">
                        <x-largee-button type="submit">Accept</x-largee-button>
                    </form>
                    <form action="{{route('volunteerApplications.update',$volunteerApplication->id)}}" method="post">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="statuschange" value="3">
                        <x-largee-button type="submit">Declined</x-largee-button>
                    </form>
                    <form action="{{route('volunteerApplications.destroy',$volunteerApplication->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <x-largee-button type="submit">Delete</x-largee-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
