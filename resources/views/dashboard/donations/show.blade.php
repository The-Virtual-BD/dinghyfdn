<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('donations.index')" :active="request()->routeIs('donations.index')">
                {{ __('All Donations') }}
            </x-nav-link>
        </div>
    </x-slot>


    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-end items-center">
                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="donationDelete({{$donation->id}});"><span class="iconify" data-icon="bi:trash-fill"></span></button>
            </div>
            <div class="flex gap-5">
                <div class="">
                    <p class="font-bold font-oswald text-xl text-eve uppercase mb-4">Donar Information</p>
                    <p><span class="font-bold">First Name:</span>  <span class="font-raleway ">{{$donation->donar_firstname}}</span></p>
                    <p><span class="font-bold">Last Name: </span> <span class="font-raleway ">{{$donation->donar_lasttname}}</span></p>
                    <p><span class="font-bold">Email:</span>  <span class="font-raleway ">{{$donation->donar_email}}</span></p>
                    <p><span class="font-bold">Phone:</span>  <span class="font-raleway ">{{$donation->phone}}</span></p>
                    <p><span class="font-bold">Address:</span>  <span class="font-raleway ">{{$donation->address}}</span></p>
                </div>
                <div class="">
                    <p class="font-bold font-oswald text-xl text-eve uppercase mb-4">Donation Information</p>
                    <p><span class="font-bold">Donation Ammount:</span>  <span class="font-raleway text-eve">{{$donation->donation_ammount}}</span></p>
                    <p><span class="font-bold">Actual Ammount:</span>  <span class="font-raleway ">{{$donation->actual_donation_ammount}}</span></p>
                    <p><span class="font-bold">Donation Method:</span>  <span class="font-raleway ">{{$donation->donation_method}}</span></p>
                    <p><span class="font-bold">Transaction Number:</span>  <span class="font-raleway ">{{$donation->donation_transaction_number}}</span></p>
                </div>
                <div class="">
                    <p class="font-bold font-oswald text-xl text-eve uppercase mb-4">Donated In</p>
                    @if ($donation->project)

                    <p><span class="font-bold">Project Name:</span>  <span class="font-raleway ">{{$donation->project->title}}</span></p>
                    <p><span class="font-bold">Target Fund:</span>  <span class="font-raleway ">{{$donation->project->target_fund}}</span></p>
                    <p><span class="font-bold">Raised Fund:</span>  <span class="font-raleway ">{{$donation->project->raised_fund}}</span></p>
                    @endif
                    @if (!$donation->project)
                    <p><span class="font-bold"></span> Dinghy Foundation</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 pt-0">
        <div class="p-6 bg-white rounded-md">
            <form action="{{route('donations.update', $donation->id)}}" method="post" class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @csrf
                @method("PATCH")

                <!-- Actual Ammount -->
                <div class="">
                    <x-input-label for="actual_donation_ammount" :value="__('Actual Ammount')" />
                    <x-text-input id="actual_donation_ammount" class="block mt-1 w-full" type="number" name="actual_donation_ammount" value="{{$donation->actual_donation_ammount ? $donation->actual_donation_ammount : 0 }}"  />
                    <x-input-error :messages="$errors->get('actual_donation_ammount')" class="mt-2" />
                </div>

                <!-- Transuction Number -->
                <div class="">
                    <x-input-label for="donation_transaction_number" :value="__('Transaction Number')" />
                    <x-text-input id="donation_transaction_number" class="block mt-1 w-full" type="text" name="donation_transaction_number" value="{{$donation->donation_transaction_number ? $donation->donation_transaction_number : '' }}" />
                    <x-input-error :messages="$errors->get('donation_transaction_number')" class="mt-2" />
                </div>


                <!-- Status -->
                <div class="">
                    <x-input-label for="status" :value="__('Donation Status')" />
                    <select name="status" id="status" class="block mt-1 w-full">
                        <option value="1" @if ($donation->status == 1 ) selected @endif>Interested</option>
                        <option value="2" @if ($donation->status == 2 ) selected @endif>Contacted</option>
                        <option value="3" @if ($donation->status == 3 ) selected @endif>Donated</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end sm:col-span-3">
                    <x-primary-button class="ml-4">
                        {{ __('Update Information') }}
                    </x-primary-button>
                </div>


            </form>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function donationDelete(donationID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Donation ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'dashboard/donations/'+donationID,
                            success: function(response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    datatablelist.draw();
                                } else if (response.status == "error") {
                                    Swal.fire('This item is not deletable!', response.message, 'error');
                                    datatablelist.draw();
                                }
                            }
                        });
                    }
                });
            }
        </script>
    </x-slot>
</x-app-layout>
