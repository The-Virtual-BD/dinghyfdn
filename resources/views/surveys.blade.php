<x-guest-layout>

    <x-slot name="headstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{asset('css/datatable.css')}}">

    </x-slot>

    <div class="p-4 sm:p-0 bg-adam-light">
        <div class="max-w-7xl sm:pt-[90px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-adam mt-5 uppercase">our survey</h1>
        </div>
    </div>
    <div class="">
        <div class="sm:max-w-7xl max-w-full overflow-scroll sm:overflow-hidden mx-auto py-10 sm:py-20 p-4 ">
            <div class="animate-pulse w-full hidden transition ease-in-out duration-150" id="table-skalaton">
                <div class="flex justify-between">
                    <div class="h-8 w-64 bg-adam-light rounded"></div>
                    <div class="h-8 w-64 bg-adam-light rounded"></div>
                </div>
                <div class="w-full my-4 h-64 bg-adam-light rounded"></div>
                <div class="flex justify-end">
                    <div class="h-8 w-64 bg-adam-light rounded"></div>
                </div>
            </div>

            <div class="invisible transition ease-in-out duration-150" id="table-div">
                <table id="surveyTable" class="display overflow-scroll" style="width:100%">
                    <thead class="bg-adam-light font-raleway font-bold text-base uppercase">
                        <p class="-mb-[35px] font-raleway font-bold text-xl hidden sm:block uppercase">our survey</p>
                        <tr class=" text-xs sm:text-base">
                            <th class="text-center">sl</th>
                            <th class="text-center">Number</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center hidden sm:block">Supervisor</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">View</th>
                            <th class="text-center">download</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <x-slot name="script">
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            var surveyTable = null;

            $('#table-skalaton').removeClass('hidden');
            $('#surveyTable').on('init.dt',function() {
                $('#table-skalaton').addClass('hidden');
                $("#table-div").removeClass('invisible').show();
            });

            surveyTable = $('#surveyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('survey') !!}",
                columns: [{
                        "render": function(data, type, full, meta) {
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
                            return `<div class="flex justify-center"><a href="${data.link}" target="_blank" class="hover:text-eve" >View</a></div>`;
                        }
                    },
                    {
                        data: null,
                        render: function(data) {
                            return `<div class="flex justify-center"><a href="${BASE_URL}${data.file}" class="hover:text-eve" >Download</a></div>`;
                        }
                    }
                ]
            });
        </script>
    </x-slot>
</x-guest-layout>
