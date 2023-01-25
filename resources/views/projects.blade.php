<x-guest-layout>
    <div class="p-4 sm:p-0 bg-projects-hero bg-cover bg-center bg-no-repeat ">
        <div class="max-w-7xl sm:pt-[150px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-white mt-5 uppercase">Projects</h1>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 p-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

                @forelse ($projects as $item)
                {{-- Project --}}
                <div class="bg-adam-light">
                    <img src="{{asset($item->cover)}}" alt="" srcset="" class="w-full mb-2">
                    <div class="p-8">
                        <p class="text-center sm:text-left font-oswald font-bold text-2xl text-dark mb-4">{{$item->title}}</p>
                        {{-- <p class="text-center sm:text-left font-raleway text-base text-dark mb-4">{!!$item->body!!}</p> --}}
                        <a href="{{route('project',$item->id)}}">
                            <x-largee-button class="w-full flex justify-center items-center">Learn More</x-largee-button>
                        </a>
                    </div>
                </div>
                @empty
                <p>No Project Found</p>
                @endforelse


            </div>
        </div>
    </div>


</x-guest-layout>

