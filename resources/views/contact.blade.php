<x-guest-layout>
    <div class="p-4 sm:p-0 bg-team-hero bg-cover bg-center bg-no-repeat ">
        <div class="max-w-7xl sm:pt-[150px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-white mt-5 uppercase">Contact Us</h1>
        </div>
    </div>

    <div class="bg-eve min-h-[700px]">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4 grid grid-cols-1 sm:grid-cols-4 gap-5">
            <div class="">
                <div
                    class="flex gap-5 mb-8 flex-col sm:flex-row items-center sm:items-start justify-center sm:justify-start">
                    <span class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-eve text-xl">
                        <span class="iconify" data-icon="material-symbols:location-on-rounded"></span>
                    </span>
                    <div class="text-center sm:text-left">

                        <p class="font-bold text-white uppercase font-oswald text-3xl">Visit Us:</p>
                        <p class="font-raleway text-white text-xl">Home #315 <br> Road #3, Phase #2 <br> Sonadanga R/A <br> Khulna - 9100</p>
                    </div>
                </div>
                <div
                    class="flex gap-5 mb-8 flex-col sm:flex-row items-center sm:items-start justify-center sm:justify-start">
                    <span class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-eve text-xl">
                        <span class="iconify" data-icon="mdi:email"></span>
                    </span>
                    <div class="text-center sm:text-left">
                        <p class="font-bold text-white uppercase font-oswald text-3xl">Mail Us:</p>
                        <p class="font-raleway text-white text-xl">contact@dinghyfdn.org</p>
                    </div>
                </div>
                <div
                    class="flex gap-5 mb-8 flex-col sm:flex-row items-center sm:items-start justify-center sm:justify-start">
                    <span class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-eve text-xl">
                        <span class="iconify" data-icon="material-symbols:phone-android-outline"></span>
                    </span>
                    <div class="text-center sm:text-left">
                        <p class="font-bold text-white uppercase font-oswald text-3xl">Phone</p>
                        <p class="font-raleway text-white text-xl">+880 1902 624 501</p>
                    </div>
                </div>
            </div>

            <div class="col-span-3">
                <iframe class="w-full h-[420px]" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=khulna&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                    scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>

        </div>
    </div>

    <div class="max-w-7xl mx-auto py-10 sm:py-15 px-4 bg-adam-light sm:-mt-[100px]">
        <div class="flex flex-col items-center">
            <h2 class="text-center font-oswald font-bold text-5xl uppercase text-eve mb-5">Send Us Message</h2>
            <p class="text-center w-full sm:w-1/2 font-raleway text-lg">If you have any concern, please let us know. Our team will response to you as soon as possible. Thank you for your kind interest on Dinghy Foundation.</p>
        </div>
        <form id="contactusfrom" class="mt-6 sm:px-20 sm:py-6">
            <div class="grid sm:grid-cols-2 gap-5 mb-4">
                <div class="">
                    <x-input-label class="text-dark mb-2">First Name </x-input-label>
                    <x-text-input type="text" placeholder="First Name" required class="w-full text-dark-light"
                        name="cffirstname" id="cffirstname">
                    </x-text-input>
                </div>

                <div class="">
                    <x-input-label class="text-dark mb-2">Last Name</x-input-label>
                    <x-text-input type="text" placeholder="Last Name" required class="w-full text-dark-light"
                        name="cflastname" id="cflastname">
                    </x-text-input>
                </div>
                <div class="">
                    <x-input-label class="text-dark mb-2">Email Address </x-input-label>
                    <x-text-input type="email" placeholder="Email Address" required class="w-full text-dark-light"
                        name="cfemail" id="cfemail">
                    </x-text-input>
                </div>
                <div class="">
                    <x-input-label class="text-dark mb-2">Phone </x-input-label>
                    <x-text-input type="text" placeholder="(+1) --- ---" required class="w-full text-dark-light"
                        name="cfphone" id="cfphone">
                    </x-text-input>
                </div>
                <div class="col-span-2">
                    <x-input-label class="text-dark mb-2">Message </x-input-label>
                    <textarea rows="5" class="border-dark focus:border-dark w-full" name="cfmessage" id="cfmessage"></textarea>
                </div>
            </div>
            <x-largee-button class="w-full flex justify-center items-center" type="submit">send message
            </x-largee-button>
            <p id="contmsg" class="mt-4 font-raleway text-eve"></p>
        </form>

    </div>



    {{-- Mission --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4  owl-carousel">
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
        </div>
    </div>


    <x-slot name="script">
        <script>
            // Contuctus
            $('form#contactusfrom').submit(function(e) {
                e.preventDefault();
                var name = $('#cffirstname').val() + $('#cflastname').val();
                var email = $('#cfemail').val();
                var phone = $('#cfphone').val();
                var message = $('#cfmessage').val();

                $.ajax({
                    method: 'POST',
                    url: BASE_URL + 'contactUs/send',
                    data: {
                        name,
                        phone,
                        email,
                        message
                    },
                    success: function(response) {
                        console.log(response.message);
                        if (response.status == "success") {
                            $('#contmsg').html(response.message);
                            $('form#contactusfrom').trigger("reset");
                            setTimeout(function(){
                                $('#contmsg').html('');
                            }, 5000);
                        } else if (response.status == "error") {
                            $('#contmsg').html(response.message);
                            setTimeout(function(){
                                $('#contmsg').html('');
                            }, 5000);
                        }
                    }
                });
            });
        </script>
    </x-slot>



</x-guest-layout>
