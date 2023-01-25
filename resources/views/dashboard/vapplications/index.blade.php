<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('volunteerApplications.index')" :active="request()->routeIs('volunteerApplications.index')">
                {{ __('Valunteeer Applications') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-raleway font-bold uppercase text-eve">Valunteer Applications</h1>
            </div>

            <table id="vapplicationTable" class="display stripe" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#vapplicationTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('volunteerApplications.index') !!}",
                columns: [{
                        "render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: null,
                        render: function(data) {
                            if (data.status == 1) {
                                var statusLabels = `<a href="" class="text-red-400">Pending</a>`;
                            } else if (data.status == 2) {
                                var statusLabels = `<a href="" class="text-green-400">Accepted</a>`;
                            } else {
                                var statusLabels = `<a href="" class="text-red-400">Declined</a>`;
                            }
                            return statusLabels;
                        }
                    },
                    {
                        data: null,
                        render: function(data) {
                            return `<div class="flex">
                                    <a href="${BASE_URL}dashboard/volunteerApplications/${data.id}" class="bg-blue-500 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" >
                                        <span class="iconify" data-icon="ic:baseline-remove-red-eye"></span>
                                        </a>

                                </div>`;
                        }
                    }
                ]
            });


            function vappdelete(applicationID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Application ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL + 'dashboard/volunteerApplications/' + applicationID,
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
