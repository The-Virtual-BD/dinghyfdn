<x-guest-layout>

    <x-slot name="headstyle">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    </x-slot>

    <div class="p-4 sm:p-0 bg-projects-hero bg-cover bg-center bg-no-repeat ">
        <div class="max-w-7xl sm:pt-[150px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-white mt-5 uppercase">{{$gallery->topic}}</h1>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 p-4">
            <div class="w-full flex justify-start space-x-5 mb-4">
                <a href="{{ route('gallery',) }}">
                    <p class=" px-4 py-1 inline-block text-eve uppercase transition duration-150 ease-in-out cursor-pointer hover:font-bold">All</p>
                </a>
                @forelse ($galleries as $item)
                {{-- Gallery category --}}
                <a href="{{ route('gallerydetails', $item->id ) }}">
                    <p class=" px-4 py-1 inline-block text-eve uppercase transition duration-150 ease-in-out cursor-pointer hover:font-bold">{{$item->topic}}</p>
                </a>
                @empty
                <p>No Topic Found</p>

                @endforelse
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @forelse ($gallery->media as $media)

                {{-- Gallery category --}}
                <img src="{{$media->original_url}}" alt="" onclick="galleryPopup();">
                @empty
                <p class="sm:col-span-3">No Image Found</p>

                @endforelse
            </div>
        </div>
    </div>

    <div class="fixed w-full h-full bg-adam-trans top-0 sm:p-20 hidden" id="galleryMediaSlide">
        <span class="iconify fixed top-4 right-4 sm:top-10 sm:right-10 text-eve text-2xl w-8 h-8 hover:bg-white rounded-md p-1" data-icon="maki:cross" onclick="galleryPopup();"></span>
        <div class="flex justify-center items-center py-20 sm:py-0">
            <div class="owl-carousel w-11/12 max-w-7xl ">
                @foreach ($gallery->media as $media)
                <div class="item flex items-center justify-center">
                    <img src="{{$media->original_url}}" alt="" class="max-w-[1080px] max-h-screen w-auto">
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop:false,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });

            $('.gPic').hover(function () {
                    $(this).addClass('bg-adam bg-blend-overlay');

                }, function () {
                    $(this).removeClass('bg-adam bg-blend-overlay');
                }
            );
        </script>
    </x-slot>
</x-guest-layout>

