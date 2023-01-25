<x-guest-layout>
    <div class="p-4 sm:p-0 bg-projects-hero bg-cover bg-center bg-no-repeat ">
        <div class="max-w-7xl sm:pt-[150px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-white mt-5 uppercase">Events</h1>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 p-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @forelse ($events as $item)

                {{-- Event --}}
                <a href="{{route('eventsdetails', $item->id)}}">
                    <div
                        class="px-8 pb-8 pt-[125px] sm:pt-[242px] bg-adam bg-blend-overlay" style="background-image: url('{{asset($item->cover)}}')">
                        <p class="bg-eve px-4 py-1 inline-block text-white uppercase">{{$item->category->name}}</p>
                        <h3 class="font-bold font-oswald text-2xl text-white uppercase mb-3">{{$item->title}}</h3>
                    </div>
                </a>
                @empty

                @endforelse

            </div>
        </div>
    </div>


</x-guest-layout>

