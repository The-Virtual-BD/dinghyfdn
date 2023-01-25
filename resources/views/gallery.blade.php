<x-guest-layout>
    <div class="p-4 sm:p-0 bg-projects-hero bg-cover bg-center bg-no-repeat ">
        <div class="max-w-7xl sm:pt-[150px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-white mt-5 uppercase">Gallery</h1>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 p-4">
            <div class="w-full flex justify-start space-x-5 mb-4">
                <a href="{{ route('gallery',) }}">
                    <p class=" px-4 py-1 inline-block text-eve uppercase transition duration-150 ease-in-out cursor-pointer hover:font-bold">All</p>
                </a>
                @forelse ($galleries as $gallery)
                {{-- Gallery category --}}
                <a href="{{ route('gallerydetails', $gallery->id ) }}">
                    <p class=" px-4 py-1 inline-block text-eve uppercase transition duration-150 ease-in-out cursor-pointer hover:font-bold">{{$gallery->topic}}</p>
                </a>
                @empty
                <p>No Topic Found</p>

                @endforelse
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @forelse ($galleries as $gallery)

                {{-- Gallery category --}}
                <a href="{{ route('gallerydetails', $gallery->id ) }}">
                    <div class="px-8 pb-8 pt-[125px] sm:pt-[242px] group gPic transition duration-150 ease-in-out" style="background-image: url('{{$gallery->media->first()->original_url}}')">
                        <p class="bg-eve px-4 py-1 inline-block text-white uppercase invisible group-hover:visible  transition duration-150 ease-in-out">{{$gallery->topic}}</p>
                    </div>
                </a>
                @empty
                <p>No Image Found</p>

                @endforelse
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $('.gPic').hover(function () {
                    $(this).addClass('bg-adam bg-blend-overlay');

                }, function () {
                    $(this).removeClass('bg-adam bg-blend-overlay');
                }
            );
        </script>
    </x-slot>
</x-guest-layout>

