<footer x-data="{ open: false }" class="">
    <div class="bg-adam-light py-20">
        <!-- Primary Footer Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-5 sm:gap-5">
            <div class="sm:col-span-2 mb-8 sm:mb-0">
                <!-- Logo -->
                <div class="shrink-0 flex items-center mb-4 justify-center sm:justify-start">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                <p class="mb-4 text-center sm:text-left">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum".</p>
                <div class="flex space-x-2 justify-center sm:justify-start" >
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-600"><span class="iconify" data-icon="ic:baseline-facebook"></span></a>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-400"><span class="iconify" data-icon="mdi:twitter"></span></a>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-blue-800"><span class="iconify" data-icon="ri:linkedin-fill"></span></a>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-red-500"><span class="iconify" data-icon="ri:youtube-fill"></span></a>
                    <a href="" target="_blank" class="w-[32px] h-[32px] flex justify-center items-center text-white bg-pink-600"><span class="iconify" data-icon="iconoir:instagram"></span></a>
                </div>
            </div>

            <div class="col-span-1 sm:col-span-2 grid grid-cols-2 gap-5 mb-8 sm:mb-0">
                <div class="">
                    <p class="font-oswald font-bold text-xl text-eve mb-4 text-center sm:text-left">Quick Link</p>
                    <div class="flex flex-col">
                        {{-- <x-footer-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Donate') }}
                        </x-footer-link> --}}
                        <x-footer-link :href="route('volunteer')" :active="request()->routeIs('volunteer')">
                            {{ __('Become Volunteer') }}
                        </x-footer-link>
                        <x-footer-link :href="route('contact')" :active="request()->routeIs('contact')">
                            {{ __('Careers') }}
                        </x-footer-link>
                        <x-footer-link :href="route('contact')" :active="request()->routeIs('contact')">
                            {{ __('Site Maps') }}
                        </x-footer-link>
                    </div>
                </div>
                <div class="">
                    <p class="font-oswald font-bold text-xl text-eve mb-4 text-center sm:text-left">Learn More</p>
                    <div class="flex flex-col">
                        <x-footer-link :href="route('projects')" :active="request()->routeIs('projects')">
                            {{ __('Projects') }}
                        </x-footer-link>
                        <x-footer-link :href="route('events')" :active="request()->routeIs('events')">
                            {{ __('Events') }}
                        </x-footer-link>
                        <x-footer-link :href="route('gallery')" :active="request()->routeIs('gallery')">
                            {{ __('Gallery') }}
                        </x-footer-link>
                        <x-footer-link :href="route('research')" :active="request()->routeIs('research')">
                            {{ __('Our Research') }}
                        </x-footer-link>
                    </div>
                </div>
            </div>

            <div class="">
                <p class="font-oswald font-bold text-xl text-eve mb-4 text-center sm:text-left">Newsletter</p>
                <form id="subscriptionForm">
                <x-text-input id="email" class="block mt-1 w-full font-raleway text-base bg-adam-light" type="email" name="email" :value="old('email')" required placeholder="Email Address"/>
                <x-largee-button class="mt-2 w-full justify-center" type="submit">
                    {{ __('Subscribe now!') }}
                </x-largee-button>
                </form>
                <p id="subscriptionsuccess" class="text-eve font-raleway text-base mt-2"></p>
            </div>

        </div>
    </div>
    <div class="bg-eve py-4 text-center text-white font-raleway font-bold text-sm">
        <p>© 2023. All rights reserved.  Powered <a href="https://www.thevirtualbd.com" target="_blank">The Virtual BD</a></p>
    </div>

</footer>
