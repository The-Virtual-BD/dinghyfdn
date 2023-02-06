<x-guest-layout>
    <div class="p-4 sm:p-0 bg-team-hero bg-cover bg-center bg-no-repeat ">
        <div class="max-w-7xl sm:pt-[150px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-white mt-5 uppercase">Become volunteer</h1>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto py-10 sm:py-18 p-4">
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-7">Terms and condition</h2>
            <div class="">

                <p class="text-left mb-6">The Dinghy Foundation is offering an opportunity for volunteers to make a positive impact on poverty, child development, education for the poor and street children, skill development, health programs, rural development, women empowerment, environment protection, and slum development. The foundation is committed to improving the lives of people and promoting a better world. If you are passionate about making a difference and are interested in volunteering with the Dinghy Foundation, then this is the perfect opportunity for you! Terms and Conditions for Dinghy Foundation Volunteers:</p>


                    <ol class="list-decimal ml-6">
                        <li>Purpose: The purpose of this program is to provide volunteer opportunities for individuals who are passionate about making a positive impact in the lives of others and the environment.</li>
                        <li>Eligibility: All individuals who are at least 18 years of age and have a genuine interest in the mission and values of the Dinghy Foundation are eligible to apply.</li>
                        <li>Time Commitment: Volunteers are required to commit to a minimum of 10 hours per week for a minimum of 3 months. Exceptions may be made for individuals with unique circumstances.</li>
                        <li>Selection Process: The Dinghy Foundation reserves the right to select volunteers based on their qualifications, experience, and motivation.</li>
                        <li>Training: All volunteers will be required to attend a comprehensive training program prior to the start of their volunteer assignment.</li>
                        <li>Confidentiality: All volunteers are required to maintain strict confidentiality regarding all aspects of the Dinghy Foundation and its programs.</li>
                        <li>Health and Safety: The Dinghy Foundation is committed to ensuring the health and safety of its volunteers. All volunteers must sign a waiver and agree to abide by the safety rules and guidelines set by the organization.</li>
                        <li>Expenses: The Dinghy Foundation does not cover any expenses incurred by volunteers. This includes travel, accommodation, and meals.</li>
                        <li>Termination: The Dinghy Foundation reserves the right to terminate the volunteer assignment at any time if the volunteer does not meet the expectations or violates any of the terms and conditions.</li>
                        <li>Liability: The Dinghy Foundation is not responsible for any injuries or damages that may occur during the course of the volunteer assignment.</li>
                    </ol>





                    <p class="text-left mt-6"> By applying to be a volunteer with the Dinghy Foundation, you are agreeing to abide by these terms and conditions.</p>
            </div>
            <div class="mt-4 flex justify-center items-center">

                <x-largee-button onclick="volunteerapply()">Accept and Apply</x-largee-button>
            </div>
        </div>
    </div>


    <div class="fixed w-full h-full bg-adam-trans top-0 sm:p-20 hidden" id="volunteerapply">
        <div class="flex justify-center items-center py-20 sm:py-0 ">
            <div class=" w-11/12 max-w-7xl bg-white p-4 sm:p-6 relative">
                <button
                    class="p-1 w-8 h-8 flex justify-center items-center bg-eve hover:bg-adam text-white absolute right-4 top-4 z-50" onclick="volunteerapply();">
                    <span class="iconify" data-icon="akar-icons:cross"></span>
                </button>

                <form action="{{route('volunteerApplications.store')}}" id="volunteerapplyFrom" enctype="multipart/form-data" method="POST">
                    @csrf

                    <p class="font-bold text-lg font-oswald text-eve mb-4 uppercase">Personal Information</p>
                    <div class="grid grid-cols-1 gap-5 mb-4">
                        <div class="grid grid-cols-1 sm:grid-cols-3 w-full sm:space-x-5">
                            <div class="">
                                <x-input-label class="text-dark mb-2">Full Name </x-input-label>
                                <x-text-input type="text" placeholder="Full Name" name="vafirstname" id="vafirstname" required class="w-full text-dark-light"></x-text-input>
                            </div>

                            <!-- File-->
                            <div class="">
                                <x-input-label for="vaphoto" :value="__('Upload Your Photo ( png, jpg, jpeg | max. 2MB | Must be 256 x 256 )')" />
                                <x-text-input type="file" class="block mt-1 w-full file:mr-5 file:py-3 file:px-4 file:border-0 file:font-raleway  file:text-white file:bg-eve text-eve" id="vaphoto" name="vaphoto"/>
                                <x-input-error :messages="$errors->get('vaphoto')" class="mt-2" />
                            </div>

                            <!-- File-->
                            <div class="">
                                <x-input-label for="vacv" :value="__('Your Resume ( PDF | max. 2MB )')" />
                                <x-text-input type="file" class="block mt-1 w-full file:mr-5 file:py-3 file:px-4 file:border-0 file:font-raleway  file:text-white file:bg-eve text-eve" id="vacv" name="vacv"/>
                                <x-input-error :messages="$errors->get('vacv')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-span-2">
                            <x-input-label class="text-dark mb-2">Email Address </x-input-label>
                            <x-text-input type="email" placeholder="Email Address" name="vaemail" id="vaemail" required class="w-full text-dark-light"></x-text-input>
                        </div>
                        <div class="col-span-2">
                            <x-input-label class="text-dark mb-2">Phone </x-input-label>
                            <x-text-input type="text" placeholder="012345678975" name="vaphone" id="vaphone" required class="w-full text-dark-light"></x-text-input>
                        </div>
                        <div class="col-span-2">
                            <x-input-label class="text-dark mb-2">Address </x-input-label>
                            <x-text-input type="text" placeholder="Address" name="vaaddress" id="vaaddress"  required class="w-full text-dark-light"></x-text-input>
                        </div>
                        <div class="flex space-x-2">
                            <input type="checkbox" name="termsaccept" id="termsaccept" required>
                            <x-input-label class="text-dark mb-2">Yes, I Read term and condition and accept. </x-input-label>
                        </div>
                    </div>
                    <x-largee-button class="w-full flex justify-center items-center" type="submit">Apply Now!</x-largee-button>
                </form>
                <p class="mt-4 text-eve font-raleway uppercase" id="vaappliedsuccess"></p>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $('form#volunteerapplyFrom').submit(function (e) {
                e.preventDefault();
                let subscribed = $('#vaappliedsuccess');
                $.ajax({
                    method: 'POST',
                    url: BASE_URL +'volunteerApplications',
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(response) {
                        if (response.status == "success") {
                            subscribed.html(response.message);
                            $('form#volunteerapplyFrom').trigger("reset");
                            setTimeout(function(){
                                subscribed.html('');
                            }, 5000);
                        } else if (response.status == "error") {
                            subscribed.html(response.message);
                            setTimeout(function(){
                                subscribed.html('');
                            }, 5000);
                        }
                    }
                });
            });
        </script>
    </x-slot>
</x-guest-layout>

