<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.index')">
                {{ __('All Galleries') }}
            </x-nav-link>
            <x-nav-link :href="route('galleries.create')" :active="request()->routeIs('galleries.create')">
                {{ __('Add New Gallery') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">

                <h1 class="font-raleway font-bold uppercase text-eve">Galleries</h1>
                <a href="{{route('galleries.create')}}" class="text-eve font-oswald uppercase flex items-center justify-start hover:text-adam"><span class="iconify text-2xl" data-icon="material-symbols:add-box-rounded"></span> Add Gallery</a>
            </div>

            <table id="galleryTable" class="display stripe" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Topic</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#galleryTable').DataTable({
                processing: true,
                serverSide: true,
                    ajax: "{!! route('galleries.index') !!}",
                    columns: [
                        {"render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'topic',
                            name: 'topic'
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}dashboard/galleries/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="ic:baseline-remove-red-eye"></span></a>
                                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="galleryDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });


            function galleryDelete(galleryID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Gallery and Its Images?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'dashboard/galleries/'+galleryID,
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
