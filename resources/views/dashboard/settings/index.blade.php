<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.index')">
                {{ __('All Settings') }}
            </x-nav-link>
            <x-nav-link :href="route('settings.create')" :active="request()->routeIs('settings.create')">
                {{ __('New Setting') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6 relative">

        <x-auth-session-status :status=" Session::get('message')"></x-auth-session-status>
        
        <div class="p-6 bg-white rounded-md w-96 mb-4 flex justify-between items-center">
            <h2 class="font-raleway font-bold uppercase text-eve">Donation</h2>

            @php
                $donation = $settings->where('property','donation')->first();
            @endphp
            <form method="POST" action="{{ route('settings.update', $donation->id) }}" class="flex justify-end items-center" id="donationstatusform">
                @csrf
                @method("PATCH")
                <!-- Value -->
                <div class="">
                    <x-text-input id="value" class="block mt-1 w-full" type="hidden" name="value" />
                    <input type="hidden" id="value" name="value" value="{{$donation->value}}" required >
                </div>
                <div class="pointer-events-auto h-6 w-10 rounded-full p-1  transition duration-200 ease-in-out @if ($donation->value == 'yes')  bg-eve @else bg-slate-900/10 @endif" id="donationToggle">
                    <div class="h-4 w-4 rounded-full bg-white shadow-sm ring-1 ring-slate-700/10 transition duration-200 ease-in-out @if ($donation->value == 'yes') translate-x-4 @endif"></div>
                </div>
            </form>
        </div>
        <h2 class="font-raleway font-bold uppercase text-eve mb-4 text-lg">All Default email Text</h2>
        <div class="p-6 bg-white rounded-md mb-4 grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="">
                <h2 class="font-raleway font-bold uppercase text-eve">Newsletter Email</h2>
                @php
                    $newslettertxt = $settings->where('property','newslettertxt')->first();
                @endphp
                <form method="POST" action="{{ route('settings.update', $newslettertxt->id) }}" class="mt-2" id="">
                    @csrf
                    @method("PATCH")
                    <textarea name="value" id="value" rows="3" class="w-full rounded-md border border-eve">{{$newslettertxt->value}}</textarea>
                    <div class="flex justify-end mt-2">
                        <x-primary-button>Update</x-primary-button>
                    </div>
                </form>
            </div>
            <div class="">
                <h2 class="font-raleway font-bold uppercase text-eve">Donation Email</h2>
                @php
                    $donationtxt = $settings->where('property','donationtxt')->first();
                @endphp
                <form method="POST" action="{{ route('settings.update', $donationtxt->id) }}" class="mt-2" id="">
                    @csrf
                    @method("PATCH")
                    <textarea name="value" id="value" rows="3" class="w-full rounded-md border border-eve">{{$donationtxt->value}}</textarea>
                    <div class="flex justify-end mt-2">
                        <x-primary-button>Update</x-primary-button>
                    </div>
                </form>
            </div>
            <div class="">
                <h2 class="font-raleway font-bold uppercase text-eve">Contact Email</h2>
                @php
                    $contactxt = $settings->where('property','contactxt')->first();
                @endphp
                <form method="POST" action="{{ route('settings.update', $contactxt->id) }}" class="mt-2" id="">
                    @csrf
                    @method("PATCH")
                    <textarea name="value" id="value" rows="3" class="w-full rounded-md border border-eve">{{$contactxt->value}}</textarea>
                    <div class="flex justify-end mt-2">
                        <x-primary-button>Update</x-primary-button>
                    </div>
                </form>
            </div>
            <div class="">
                <h2 class="font-raleway font-bold uppercase text-eve">Vulenteer Email</h2>
                @php
                    $vapptxt = $settings->where('property','vapptxt')->first();
                @endphp
                <form method="POST" action="{{ route('settings.update', $vapptxt->id) }}" class="mt-2" id="">
                    @csrf
                    @method("PATCH")
                    <textarea name="value" id="value" rows="3" class="w-full rounded-md border border-eve">{{$vapptxt->value}}</textarea>
                    <div class="flex justify-end mt-2">
                        <x-primary-button>Update</x-primary-button>
                    </div>
                </form>
            </div>
            <div class="">
                <h2 class="font-raleway font-bold uppercase text-eve">Job Email</h2>
                @php
                    $japptxt = $settings->where('property','japptxt')->first();
                @endphp
                <form method="POST" action="{{ route('settings.update', $japptxt->id) }}" class="mt-2" id="">
                    @csrf
                    @method("PATCH")
                    <textarea name="value" id="value" rows="3" class="w-full rounded-md border border-eve">{{$japptxt->value}}</textarea>
                    <div class="flex justify-end mt-2">
                        <x-primary-button>Update</x-primary-button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <x-slot name="script">
        <script>
            $(document).ready(function () {
                $('#donationToggle').click(function (e) {
                    e.preventDefault();
                    $('form#donationstatusform').submit();
                });
            });
        </script>
    </x-slot>
</x-app-layout>
