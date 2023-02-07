<x-guest-layout>
    <div class="p-4 sm:p-0 bg-home-hero bg-cover bg-center bg-no-repeat bg-gray-900/40 bg-blend-overlay">
        <div class="max-w-7xl sm:pt-[250px] sm:pb-[120px] mx-auto px-4 sm:px-6 lg:px-8">
            <p class="pl-4 border-l-4 border-eve text-lg font-raleway italic text-white">Bangladesh</p>
            <h1 class="invisible">Dinghy Foundation</h1>
            <h2 class="font-bold font-oswald text-3xl sm:text-5xl text-white mt-5">In nutshell to work towards crafting a
                better Bangladesh which ensures basic health, education, empowerment, and equality to every citizen.
            </h2>
        </div>
    </div>
    <div class="bg-wwo bg-cover bg-no-repeat bg-center bg-blend-overlay">
        <div class="max-w-7xl mx-auto py-10 sm:py-28 grid grid-cols-1 sm:grid-cols-2 gap-5 p-4">
            <div class="flex justify-between gap-2">
                <div class="relative">
                    <img src="{{ asset('img/wwo.jpg') }}" alt="We Are World WIde Organization">
                    <div class="bg-eve w-14 h-14 rounded-full flex justify-center items-center absolute top-1/3 sm:top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
                        onclick=" videopopup();">
                        <span class="iconify text-white text-4xl" data-icon="material-symbols:play-arrow"></span>
                    </div>
                </div>
                <div class="sm:pr-20 pt-0 sm:pt-10 text-right">
                    <div class="mb-4 sm:mb-7">
                        <p class="font-oswald font-bold text-3xl sm:text-5xl mb-1">19</p>
                        <p class="italic font-raleway text-base sm:text-lg mb-3 sm:mb-5">Volunteers In 2022</p>
                        <div class="flex justify-end">
                            <hr class="border-b border-eve w-16 sm:w-32">
                        </div>
                    </div>
                    <div class="mb-4 sm:mb-7">
                        <p class="font-oswald font-bold text-3xl sm:text-5xl mb-1">198</p>
                        <p class="italic font-raleway text-base sm:text-lg mb-3 sm:mb-5">People We Helped from 2018</p>
                        <div class="flex justify-end">
                            <hr class="border-b border-eve w-16 sm:w-32">
                        </div>
                    </div>
                    <div class="">
                        <p class="font-oswald font-bold text-3xl sm:text-5xl mb-1">$ 0M</p>
                        <p class="italic font-raleway text-base sm:text-lg mb-3 sm:mb-5">Funds We Collected</p>
                    </div>
                </div>

            </div>
            <div class="">
                <p class="font-raleway italic text-base sm:text-lg text-center sm:text-left mb-6">We work for better
                    <strong>world</strong>
                </p>
                <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center sm:text-left">We Are World Wide
                    <br> Organization
                </h2>
                <p class="font-faleway text-base sm:text-lg mb-12 text-justify sm:text-left">On November 24, 2018, the
                    Dinghy foundation began their journey by organizing a program for 59 pupils. It was founded with
                    "Better Life, Better World" as its motto. <br> <br>We concentrated mostly on poverty in Bangladesh,
                    Child Development, Education for Poor & Street Children, Skill Development, Health Programs, Rural
                    Development Programs, Women Empowerment, Environment Protection, Slum Development, etc. We think
                    that everyone deserves a life that is worthy, meaningful, and dignified.
                </p>
                <a href="{{ route('about') }}" class="flex justify-center sm:justify-start">
                    <x-largee-button>{{ __('Foundation info') }}</x-largee-button>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-adam-light">
        <div class="max-w-7xl mx-auto py-10 sm:py-15 px-4">
            <p class="text-center text-base text-eve font-raleway font-light mb-3">We work to protect world</p>
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">Current projects
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @forelse ($projects as $project)
                    {{-- Project --}}
                    <a href="{{ route('project', $project->id) }}">
                        <div class="px-8 pb-8 pt-[125px] sm:pt-[242px] relative bg-adam bg-blend-overlay"
                            style="background-image: url('{{ $project->cover }}')">
                            <p class="bg-eve px-4 py-1 inline-block text-white uppercase absolute top-8 left-0 z-50">
                                {{ $project->category->name }}</p>
                            <h3 class="font-bold font-oswald text-2xl text-white uppercase mb-3">{{ $project->title }}
                            </h3>
                            <div class="scds fundmeter">
                                <input type="hidden" name="raised" value="{{ $project->raised_fund }}">
                                <input type="hidden" name="target" value="{{ $project->target_fund }}">
                                <div class="flex justify-between">
                                    <p><span
                                            class="text-lg font-raleway font-bold text-eve raised">${{ $project->raised_fund }}</span><br><span
                                            class="text-white">Goal raised</span></p>
                                    <p><span
                                            class="text-lg font-raleway font-bold text-eve target">${{ $project->target_fund }}</span><br><span
                                            class="text-white">Donation goal</span></p>
                                </div>
                                <div class="w-full bg-white">
                                    <div class="h-5 bg-orange-500 collected"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                @endforelse
            </div>
        </div>
    </div>


    {{-- Events and conference --}}
    <div class="bg-eve">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4 grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="">
                <h2 class="text-white font-oswald font-bold text-5xl mb-7">Multiple Event <br> & Conference</h2>
                <p class="text-white font-raleway font-light text-base mb-7">Focusing on research and development, we
                    conduct surveys on specific problems in an effort to identify root causes and the best ways to
                    address them in the society.</p>
                <a href="{{ route('events') }}">
                    <x-largew-button>view all events</x-largew-button>
                </a>
            </div>
            <div class="sm:col-span-2 space-y-4">
                @forelse ($events as $event)
                    {{-- Event --}}
                    <div class="bg-white w-full flex justify-between relative group">
                        <div class="min-w-[180px] h-auto bg-no-repeat bg-cover bg-center hidden sm:block" style="background-image: url('{{asset($event->thumbnail)}}')">

                        </div>
                        <a href="{{ route('eventsdetails', $event->id) }}"
                            class="hidden group-hover:block absolute top-1/2 -translate-y-1/2 left-[50px] z-50">
                            <x-smalle-button class="">View</x-smalle-button>
                        </a>
                        {{-- <img src="{{ asset($event->thumbnail) }}" alt="" srcset="" class="h-auto aspect-square w-full  hidden sm:block"> --}}
                        <div class="flex flex-col justify-center p-4">
                            <h3 class="text-dark font-raleway font-bold text-2xl mb-4">{{ $event->title }}</h3>
                            <p class="font-raleway font-light text-sm">
                                {{ date('d-M, Y', strtotime($event->date_one)) }} @if ($event->date_two)
                                    - {{ date('d-M, Y', strtotime($event->date_two)) }}
                                @endif
                            </p>
                            <p class="font-raleway font-light text-sm">@
                                {{ date('H:i A', strtotime($event->time_one)) }} @if ($event->time_two)
                                    - {{ date('H:i A', strtotime($event->time_two)) }}
                                @endif
                            </p>
                        </div>
                        <div
                            class="flex flex-col justify-center px-4 py-4 sm:py-0 before:content-[''] before:h-20 before:w-[1px] before:bg-eve relative before:absolute before:top-1/4 before:left-0 before:-tranlate-y-1/2 pr-20">
                            <p class="font-raleway font-bold font-base mb-4">Events Location:</p>
                            <p class="font-raleway font-light text-sm">
                                {{ $event->address_line_one }}<br>{{ $event->address_line_two }}<br>{{ $event->address_line_three }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="font-raleway font-bold font-base mb-4">No Event</p>
                @endforelse
            </div>
        </div>
    </div>



    {{-- Donation --}}
    <div class="bg-adam-light scds fundmeter">
        <input type="hidden" name="raised" value="{{ $masterraised->value }}">
        <input type="hidden" name="target" value="{{ $mastertarget->value }}">

        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4 grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="bg-adam p-10">
                <h2 class="text-white font-oswald font-bold text-5xl mb-7 text-center sm:text-left uppercase">we need
                    donation</h2>
                <p class="text-white font-raleway font-light text-base mb-7 text-center sm:text-left">Help us to get
                    raised for completing our projects successfully.</p>
                <div class="">
                    <div class="flex justify-between">
                        <p><span class="text-lg font-raleway font-bold text-eve">${{ $masterraised->value }}</span><br><span class="text-white">Goal raised</span></p>
                        <p><span class="text-lg font-raleway font-bold text-eve">${{ $mastertarget->value }}</span><br><span
                                class="text-white">Donation goal</span></p>
                    </div>
                    <div class="w-full bg-white">
                        <div class="h-5 bg-orange-500 collected"></div>
                    </div>
                </div>
            </div>
            <div class="sm:col-span-2 bg-white px-20 py-10">
                <div class="flex justify-between sm:items-center flex-col sm:flex-row">
                    <div class="">
                        <p class="font-raleway font-base mb-1 text-center sm:text-left">Please select</p>
                        <h3 class="uppercase font-oswald font-bold text-4xl text-dark mb-1 text-center sm:text-left">
                            amount to donate</h3>
                        <p class="font-raleway font-base mb-1 text-center sm:text-left">All donations are tax
                            deductable.</p>
                    </div>
                    <form action="" method="post" id="indexDonate" class="">
                        <div class="flex justify-center sm:justify-end items-center">
                            <label for="dammount" class="px-4 py-2 bg-eve text-white border border-eve">$</label>
                            <input type="text" name="dammount" id="dammount" value="100"
                                class="px-8 py-2 border-dark border-l-white w-24 font-bold">
                        </div>
                    </form>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-6 gap-4 my-4">
                    <span
                        class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve"
                        onclick="idfromset(10);">$10</span>
                    <span
                        class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve"
                        onclick="idfromset(20);">$20</span>
                    <span
                        class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve"
                        onclick="idfromset(50);">$50</span>
                    <span
                        class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve"
                        onclick="idfromset(100);">$100</span>
                    <span
                        class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve"
                        onclick="idfromset(200);">$200</span>
                    <span
                        class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve"
                        onclick="toggleiReadOnly();">Custom</span>
                </div>
                <x-largee-button class="w-full flex justify-center items-center mt-6"
                    onclick="openDonateFrom(document.querySelector('#indexDonate #dammount').value);">Donate Now!
                </x-largee-button>
            </div>
        </div>
    </div>


    {{-- Mission --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4">
            <p class="text-center text-base text-eve font-raleway font-light mb-3">What Now?</p>
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">Support our
                mission</h2>
            <div class="flex justify-center mb-7">
                <p class="sm:w-[768px] text-center">Creating a beautiful and better society by supplying and ensuring
                    fundamental needs to every impoverished individual and becoming an association and execution partner
                    of Schools, NGOs, Corporates, and Government organizations in Bangladesh for advancement projects.
                </p>
            </div>
            <div class="flex justify-center items-center">
                <a href="{{route('volunteer')}}">
                    <x-largee-button>become a volunteer</x-largee-button>
                </a>
            </div>
        </div>
    </div>

    {{-- Activities --}}
    <div class="bg-adam-light">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4">
            <p class="text-center text-base text-eve font-raleway font-light mb-3">Our Album</p>
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">Discover our
                activities</h2>

            <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 mb-4">
                @forelse ($gallery->media as $media)
                    <img src="{{ $media->original_url }}" alt="" srcset=""
                        class="@if ($loop->index >= 6) col-span-2 @else  col-span-1 @endif">
                @empty
                @endforelse
            </div>
            <div class="flex justify-center items-center mt-4">
                <a href="{{ route('gallery') }}">
                    <x-largee-button>view all gallery</x-largee-button>
                </a>
            </div>
        </div>
        <form>
            <input type="hidden" name="sitedonationstatus" value="{{ $donation->value }}">
        </form>
    </div>

    {{-- Mission --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4  owl-carousel">
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            localStorage.setItem('donationstatus', $('input[name="sitedonationstatus"]').val());
        </script>
    </x-slot>



</x-guest-layout>
