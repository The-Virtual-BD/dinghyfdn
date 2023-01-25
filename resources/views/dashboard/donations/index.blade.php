<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('donations.index')" :active="request()->routeIs('donations.index')">
                {{ __('All Donations') }}
            </x-nav-link>
            <x-nav-link :href="route('donations.create')" :active="request()->routeIs('donations.create')">
                {{ __('New Donation') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-raleway font-bold uppercase text-eve">Donations</h1>
            </div>

            <table id="donationTable" class="display stripe " style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Donar Name</th>
                        <th>Donar Email</th>
                        <th>Donar Phone</th>
                        <th>Donation Ammount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#donationTable').DataTable({
                processing: true,
                serverSide: true,
                    ajax: "{!! route('donations.index') !!}",
                    columns: [
                        {"render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'donar_firstname',
                            name: 'donar_firstname'
                        },
                        {
                            data: 'donar_email',
                            name: 'donar_email'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'donation_ammount',
                            name: 'donation_ammount'
                        },
                        {
                            data: null,
                            render: function (data) {
                                if (data.status == 1){
                                    var statusLabels = '<span  class="bg-green-400 rounded-full text-white text-sm px-2"> Interested </span>';
                                }else if (data.status == 2) {
                                    var statusLabels = '<span  class="bg-orange-300 rounded-full text-gray-800 text-sm px-2"> Contacted </span>';
                                }else {
                                    var statusLabels = '<span  class="bg-eve rounded-full text-white text-sm px-2"> Donated </span>';
                                }

                                return statusLabels;
                            }
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}dashboard/donations/${data.id}" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="ic:baseline-remove-red-eye"></span></a>
                                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="donationDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });


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
