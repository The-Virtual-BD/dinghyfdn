<x-guest-layout>
    <div class="px-4 sm:py-24">
        <div class="max-w-7xl  mx-auto grid grid-cols-3 mb-7">
            <div class="col-span-3 sm:col-span-2">
                <div class=" mb-7 grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <div class="">

                        <p class="flex items-center"><span class="iconify text-eve mr-2" data-icon="uis:calender"></span>Date: {{ date('d-M, Y', strtotime($event->date_one)) }} @if ($event->date_two) - {{ date('d-M, Y', strtotime($event->date_two)) }}@endif</p>
                        <p class="flex items-center"><span class="iconify text-eve mr-2" data-icon="ic:baseline-access-time-filled"></span>Time: {{ date('H:i A', strtotime($event->time_one))}} @if ($event->time_two) - {{ date('H:i A', strtotime($event->time_two)) }}@endif</p>
                    </div>
                    <div class="">
                        <p class="flex items-center"><span class="iconify text-eve mr-2" data-icon="ic:round-category"></span><span class="mr-2" >Event Category:</span>{{$event->category->name}}</p>
                        <p class="flex items-center"><span class="iconify text-eve mr-2 mb-2" data-icon="material-symbols:location-on-rounded"></span>Venue: {{ $event->address_line_one.', '.$event->address_line_two.', '.$event->address_line_three }}</p>
                    </div>
                    <div class="">
                        <p class="flex items-center"><span class="iconify text-eve mr-2 mb-2" data-icon="fluent:organization-24-filled"></span><span class="mr-2" >Organized By:</span><a class="text-eve" href="{{$event->organizer_weblink ? $event->organizer_weblink : ''}}">{{ $event->organizer_name ? $event->organizer_name  : 'Dinghy Foundatoin'}}</a></p>
                        @if ($event->organizer_phone)
                        <p class="flex items-center"><span class="iconify text-eve mr-2 mb-2" data-icon="material-symbols:phone-enabled"></span><span class="mr-2" >Phone Number:</span>{{ $event->organizer_phone }}</p>
                        @endif
                    </div>
                </div>

                <h1 class="font-bold text-3xl sm:text-6xl uppercase font-oswald">{{$event->title}}</h1>
            </div>
        </div>
        <div class="max-w-7xl  mx-auto grid grid-cols-1 sm:grid-cols-3 gap-5 mb-7">
            <div class="sm:col-span-2">
                <img src="{{asset($event->cover)}}" alt="" srcset="" class="w-full mb-7">
                <p class="mb-7 font-raleway text-base">{!!$event->body!!}</p>

                <div class="flex space-x-2 justify-center sm:justify-start mt-4" >
                    <p class="font-bold font-raleway text-lg">Share:</p>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-600"><span class="iconify" data-icon="ic:baseline-facebook"></span></a>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-400"><span class="iconify" data-icon="mdi:twitter"></span></a>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-800"><span class="iconify" data-icon="ri:linkedin-fill"></span></a>
                </div>
            </div>

            @if ($relatedevent)
            <div class="">
                <h2 class="font-bold mb-4 text-eve font-raleway uppercase text-lg">More Events</h2>
                <a href="{{route('eventsdetails', $relatedevent->id)}}">
                    <div
                        class="px-8 pb-8 pt-[125px] sm:pt-[242px] bg-adam bg-blend-overlay bg-cover bg-no-repeat bg-center" style="background-image: url('{{asset($relatedevent->thumbnail)}}')">
                        <p class="bg-eve px-4 py-1 inline-block text-white uppercase">{{$relatedevent->category->name}}</p>
                        <h3 class="font-bold font-oswald text-2xl text-white uppercase mb-3">{{$relatedevent->title}}</h3>
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</x-guest-layout>

