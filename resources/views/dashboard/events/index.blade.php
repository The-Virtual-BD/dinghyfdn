<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                {{ __('All Events') }}
            </x-nav-link>
            <x-nav-link :href="route('events.create')" :active="request()->routeIs('events.create')">
                {{ __('New Event') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-raleway font-bold uppercase text-eve">Events</h1>
            </div>

            <table id="eventTable" class="display stripe" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>Start Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#eventTable').DataTable({
                processing: true,
                serverSide: true,
                    ajax: "{!! route('events.index') !!}",
                    columns: [
                        {"render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'date_one',
                            name: 'date_one'
                        },
                        {
                            data: 'time_one',
                            name: 'time_one'
                        },
                        {
                            data: null,
                            render: function (data) {
                                if (data.status == '1'){
                                    var statusLabels = `<a href="${BASE_URL}dashboard/events/${data.id}"><span class="iconify text-4xl text-eve" data-icon="ic:round-toggle-on"></span></a>`;
                                }else if (data.status == '2'){
                                    var statusLabels = `<a href="${BASE_URL}dashboard/events/${data.id}"><span class="iconify text-4xl text-green-500" data-icon="ic:round-toggle-off"></span></a>`;
                                }else {
                                    var statusLabels = `<span class="iconify text-4xl text-violet-500" data-icon="ic:round-toggle-off"></span>`;
                                }
                                return statusLabels;
                            }
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}dashboard/events/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="eventDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });


            function eventDelete(eventID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Event ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'dashboard/events/'+eventID,
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
