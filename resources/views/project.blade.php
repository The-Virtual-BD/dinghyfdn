<x-guest-layout>
    <div class="px-4 sm:py-24">
        <div class="max-w-7xl  mx-auto grid grid-cols-3 mb-7">
            <div class="col-span-3 sm:col-span-2">
                <div class="flex sm:space-x-6 mb-7 flex-col sm:flex-row">
                    <p class="flex items-center"><span class="iconify text-eve mr-2" data-icon="uis:calender"></span>{{ date('d-M, Y', strtotime($project->publish_date)) }}</p>
                    <p class="flex items-center"><span class="text-eve mr-2" >Project in:</span>{{$project->category->name}}</p>
                </div>
                <h1 class="font-bold text-3xl sm:text-6xl uppercase font-oswald">{{$project->title}}</h1>
            </div>
        </div>
        <div class="max-w-7xl  mx-auto grid grid-cols-1 sm:grid-cols-3 gap-5 mb-7">
            <div class="sm:col-span-2">
                <img src="{{asset($project->cover)}}" alt="" srcset="" class="w-full mb-7">
                <p class="mb-7 font-raleway text-base">{!!$project->body!!}</p>
                <div class="flex space-x-2 justify-center sm:justify-start mt-4" >
                    <p class="font-bold font-raleway text-lg">Share:</p>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-600"><span class="iconify" data-icon="ic:baseline-facebook"></span></a>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-400"><span class="iconify" data-icon="mdi:twitter"></span></a>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-800"><span class="iconify" data-icon="ri:linkedin-fill"></span></a>
                </div>
            </div>
            {{-- Project --}}
            <div class="scds fundmeter">
                <input type="hidden" name="raised" value="{{ $project->raised_fund }}">
                <input type="hidden" name="target" value="{{ $project->target_fund }}">

                <div class="bg-adam-light p-9 hidden sm:block max-h-[305px]">
                    <p class="inline-block text-dark uppercase top-8 left-0">Join Us</p>
                    <h3 class="font-bold font-oswald text-2xl text-dark uppercase mb-3">{{$project->short_title}}</h3>
                    <div class="">
                        <div class="flex justify-start mb-2">
                            <p class="text-dark"><span class="text-lg font-raleway font-bold text-eve mr-2">${{$project->raised_fund}}</span>of<span class="text-lg font-raleway font-bold text-eve mx-2">${{$project->target_fund}}</span><span class=""> raised</span></p>
                        </div>
                        <div class="w-full bg-white mb-4">
                            <div class="h-5 bg-orange-500 collected"></div>
                        </div>
                        <x-largee-button class="w-full flex justify-center items-center" onclick="openDonateFrom(100)">Donate Now! </x-largee-button>
                    </div>
                </div>
            </div>
        </div>

        @if ($project->media->count() > 0)

        <div class="max-w-7xl  mx-auto mb-7">
            <h2 class="font-bold font-oswald text-lg uppercase text-eve mb-4">Images Of <span class="uppercase">{{$project->title}} project</span></h2>
            {{-- Images will  be shown here --}}

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-5">

                @foreach ($project->media as $media)
                <div class="">
                    <img src="{{$media->original_url}}" alt="" srcset="">
                </div>
                @endforeach
            </div>
        </div>
        @endif


    </div>
</x-guest-layout>

