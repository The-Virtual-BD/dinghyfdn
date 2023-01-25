<x-guest-layout>
    <div class="p-4 sm:p-0 bg-team-hero bg-cover bg-center bg-no-repeat ">
        <div class="max-w-7xl sm:pt-[150px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-white mt-5 uppercase">meet our team</h1>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:py-18 p-4">
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">Founder</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-5">
                @forelse ($founders as $member)
                {{-- Member --}}
                <div class="">
                    <img src="{{asset($member->photo)}}" alt="" srcset="" class="w-full mb-2">
                    <p class="text-center font-raleway font-semibold text-xl text-dark mb-1">{{$member->name}}</p>
                    <p class="text-center font-raleway font-semibold text-lg text-dark-light mb-1">{{$member->designation}}</p>
                </div>
                @empty
                <p>No Member Found.</p>

                @endforelse
            </div>
        </div>
    </div>


    {{-- Administrator --}}
    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:py-18 p-4">
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">Administrator</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-5">
                @forelse ($administators as $member)
                {{-- Member --}}
                <div class="">
                    <img src="{{asset($member->photo)}}" alt="" srcset="" class="w-full mb-2">
                    <p class="text-center font-raleway font-semibold text-xl text-dark mb-1">{{$member->name}}</p>
                    <p class="text-center font-raleway font-semibold text-lg text-dark-light mb-1">{{$member->designation}}</p>
                </div>
                @empty
                <p>No Member Found.</p>

                @endforelse
            </div>
        </div>
    </div>

    {{-- Volunteer --}}
    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:py-18 p-4">
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">Volunteer</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-5">
                @forelse ($volunteers as $member)
                {{-- Member --}}
                <div class="">
                    <img src="{{asset($member->photo)}}" alt="" srcset="" class="w-full mb-2">
                    <p class="text-center font-raleway font-semibold text-xl text-dark mb-1">{{$member->name}}</p>
                    <p class="text-center font-raleway font-semibold text-lg text-dark-light mb-1">{{$member->designation}}</p>
                </div>
                @empty
                <p>No Member Found.</p>

                @endforelse
            </div>
        </div>
    </div>


</x-guest-layout>

