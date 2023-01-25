<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('researches.index')" :active="request()->routeIs('researches.index')">
                {{ __('All Researches') }}
            </x-nav-link>
            <x-nav-link :href="route('casestudies.index')" :active="request()->routeIs('casestudies.index')">
                {{ __('Case Studies') }}
            </x-nav-link>
            <x-nav-link :href="route('surveys.index')" :active="request()->routeIs('surveys.index')">
                {{ __('Surveys') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">

                <h1 class="font-raleway font-bold uppercase text-eve">Surveys</h1>
                <a href="{{route('surveys.create')}}" class="text-eve font-oswald uppercase flex items-center justify-start hover:text-adam"><span class="iconify text-2xl" data-icon="material-symbols:add-box-rounded"></span> Add Surveys</a>
            </div>

            <table id="researchTable" class="display stripe" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Number</th>
                        <th>Subject</th>
                        <th>Supervisors</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#researchTable').DataTable({
                processing: true,
                serverSide: true,
                    ajax: "{!! route('surveys.index') !!}",
                    columns: [
                        {"render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'number',
                            name: 'number'
                        },
                        {
                            data: 'subject',
                            name: 'subject'
                        },
                        {
                            data: 'supervisor',
                            name: 'supervisor'
                        },
                        {
                            data: 'publish_date',
                            name: 'publish_date'
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}dashboard/surveys/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="survey(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button><a href="${BASE_URL}${data.file}" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="ic:baseline-file-download"></span></a><a href="${data.link}" target="_blank" class="bg-eve rounded-md text-white py-2 px-2 mx-1 hover:bg-eve" ><span class="iconify" data-icon="ic:baseline-insert-link"></span></a></div>`;
                            }
                        }
                    ]
                });


            function survey(surveyID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Survey ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'dashboard/surveys/'+surveyID,
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
