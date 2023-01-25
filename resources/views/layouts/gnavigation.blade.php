<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 font-raleway">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-0 lg:px-8">
        <div class="flex justify-between py-4">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
                        {{ __('Projects') }}
                    </x-nav-link>
                    <x-nav-link :href="route('team')" :active="request()->routeIs('team')">
                        {{ __('Meet team') }}
                    </x-nav-link>

                    <!-- Reserch Dropdown -->
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <x-nav-link :active="request()->routeIs('research')">
                                        {{ __('Research') }}
                                    </x-nav-link>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('research')" :active="request()->routeIs('research')" class="px-4 py-2">
                                    {{ __('Research') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('case')" :active="request()->routeIs('case')" class="px-4 py-2">
                                    {{ __('Case Studies') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('survey')" :active="request()->routeIs('survey')" class="px-4 py-2">
                                    {{ __('Surveys') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <x-nav-link :href="route('events')" :active="request()->routeIs('events')">
                        {{ __('Events') }}
                    </x-nav-link>
                    <x-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')">
                        {{ __('Gallery') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="scds">
                <div class="flex h-full justify-center items-center">
                    <button class="inline-flex items-center p-1 sm:px-5 sm:py-4 bg-eve font-bold text-sm text-white font-raleway uppercase tracking-widest hover:bg-white border border-eve hover:border hover:border-eve hover:text-eve focus:outline-none transition ease-in-out duration-300" onclick="openDonateFrom(100);">
                        Donate <span class="hidden sm:block">Now!</span>
                    </button>
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-eve hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-eve transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 grid grid-cols-3 gap-4">
            <x-nav-link class="justify-center" :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link class="justify-center" :href="route('projects')" :active="request()->routeIs('projects')">
                {{ __('Projects') }}
            </x-nav-link>
            <!-- Reserch Dropdown -->
            <div class=" sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <x-nav-link :active="request()->routeIs('research')">
                                {{ __('Research') }}
                            </x-nav-link>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('research')" :active="request()->routeIs('research')" class="px-4 py-2">
                            {{ __('Research') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('case')" :active="request()->routeIs('case')" class="px-4 py-2">
                            {{ __('Case Studies') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('survey')" :active="request()->routeIs('survey')" class="px-4 py-2">
                            {{ __('Surveys') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            <x-nav-link class="justify-center" :href="route('gallery')" :active="request()->routeIs('gallery')">
                {{ __('Gallery') }}
            </x-nav-link>
            <x-nav-link class="justify-center" :href="route('events')" :active="request()->routeIs('events')">
                {{ __('Events') }}
            </x-nav-link>
            <x-nav-link class="justify-center" :href="route('team')" :active="request()->routeIs('team')">
                {{ __('Meet team') }}
            </x-nav-link>

            <x-nav-link class="justify-center" :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-nav-link>
            <x-nav-link class="justify-center" :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact') }}
            </x-nav-link>
        </div>
    </div>
</nav>
