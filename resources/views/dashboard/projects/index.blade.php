<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                {{ __('All Projects') }}
            </x-nav-link>
            <x-nav-link :href="route('projects.create')" :active="request()->routeIs('projects.create')">
                {{ __('New Project') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-raleway font-bold uppercase text-eve">Projects</h1>
            </div>

            <table id="projectTable" class="display stripe" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Target</th>
                        <th>Raised</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#projectTable').DataTable({
                processing: true,
                serverSide: true,
                    ajax: "{!! route('projects.index') !!}",
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
                            data: 'target_fund',
                            name: 'target_fund'
                        },
                        {
                            data: 'raised_fund',
                            name: 'raised_fund'
                        },
                        {
                            data: null,
                            render: function (data) {
                                if (data.status == 'active'){
                                    var statusLabels = `<a href="${BASE_URL}dashboard/projects/${data.id}"><span class="iconify text-4xl text-green-500" data-icon="ic:round-toggle-on"></span></a>`;
                                }else{
                                    var statusLabels = `<a href="${BASE_URL}dashboard/projects/${data.id}"><span class="iconify text-4xl text-eve" data-icon="ic:round-toggle-off"></span></a>`;
                                }
                                return statusLabels;
                            }
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}dashboard/projects/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="projectDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });


            function projectDelete(projectID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Project ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'dashboard/projects/'+projectID,
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
