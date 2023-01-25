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
                    <tbody class="[&>*:nth-child(even)]:bg-adam-light text-xs sm:text-base">
                        @forelse ($surveys as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->number}}</td>
                            <td>{{$item->subject}}</td>
                            <td class="hidden sm:block">{{$item->supervisor}}</td>
                            <td>{{ date('M d, Y', strtotime($item->publish_date)) }}</td>
                            <td class="uppercase text-eve text-center cursor-pointer hover:font-bold">
                                <a href="{{$item->link}}" target="_blank" class="" >view</a>
                            </td>
                            <td class="uppercase text-eve text-center cursor-pointer hover:font-bold">
                                <a href="/{{$item->file}}" class="" >download</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No Survey Yet.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <x-slot name="script">
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>

            $(document).ready(function () {
                $('#table-skalaton').removeClass('hidden');

                $('#surveyTable').on('init.dt',function() {
                    $('#table-skalaton').addClass('hidden');
                    $("#table-div").removeClass('invisible').show();
                });

                setTimeout(function(){
                    $('#surveyTable').DataTable({
                        paging: true,
                        ordering: false,
                        info: false,
                    });
                }, 1000);
            });
        </script>
    </x-slot>
</x-guest-layout>
