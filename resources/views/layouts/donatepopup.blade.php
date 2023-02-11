<div class="bg-adam-trans w-full h-full fixed top-0 bottom-0 right-0 left-0 z-[100]  justify-center items-center hidden " id="donationPopup">
    <div class="p-10 w-11/12 max-w-2xl bg-white relative pt-14 max-h-[90vh] overflow-y-scroll sm:overflow-hidden">
        <button
            class="p-1 w-8 h-8 flex justify-center items-center bg-eve hover:bg-adam text-white absolute right-4 top-4 z-50" onclick="closeDonateFrom();">
            <span class="iconify" data-icon="akar-icons:cross"></span>
        </button>
        <form id="donationPopupFrom">
            @csrf
            <div class="flex justify-center sm:justify-end items-center w-full mb-4">
                <label for="dammount" class="px-4 py-2 bg-eve text-white border border-eve">$</label>
                <input type="text" name="dammount" id="dammount" value="100"
                    class="grow px-8 py-2 border-dark border-l-white w-24 font-bold onlynumber" readonly>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-6 gap-4 mb-4">
                <span class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve" onclick="dfromset(10)">$10</span>
                <span class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve" onclick="dfromset(20)">$20</span>
                <span class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve" onclick="dfromset(50)">$50</span>
                <span class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve" onclick="dfromset(100)">$100</span>
                <span class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve" onclick="dfromset(200)">$200</span>
                <span class="px-8 py-2 border border-dark flex justify-center items-center five cursor-pointer hover:border-eve hover:text-white hover:bg-eve" onclick="toggleReadOnly();">Custom</span>
            </div>
            <p class="font-bold text-lg font-oswald text-eve mb-4 uppercase">Select Payment Method</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 mb-4">
                <div class="flex items-center">
                    <input id="test_method" name="pmethod" type="radio"
                        class="h-4 w-4 border-eve text-eve focus:ring-eve" checked="true" value="test">
                    <label for="test_method" class="ml-3 block text-sm font-medium text-dark" >Online Transaction</label>
                </div>
                <div class="flex items-center">
                    <input id="offline_method" name="pmethod" type="radio"
                        class="h-4 w-4 border-eve text-eve focus:ring-eve" value="offline">
                    <label for="offline_method" class="ml-3 block text-sm font-medium text-dark" >Bank Transfer</label>
                </div>
                <div class="flex items-center">
                    <input id="ccard_method" name="pmethod" type="radio"
                        class="h-4 w-4 border-eve text-eve focus:ring-eve" value="creditcard">
                    <label for="ccard_method" class="ml-3 block text-sm font-medium text-dark" >Other</label>
                </div>
            </div>


            <p class="font-bold text-lg font-oswald text-eve mb-4 uppercase">Donate In</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 mb-4">
                <div class="flex items-center">
                    <input id="din_dinghy" name="donation_type" type="radio"
                        class="h-4 w-4 border-eve text-eve focus:ring-eve" value="1" checked="true">
                    <label for="din_dinghy" class="ml-3 block text-sm font-medium text-dark" >Dinghy Foundation</label>
                </div>
                <div class="flex items-center">
                    <input id="din_project" name="donation_type" type="radio"
                        class="h-4 w-4 border-eve text-eve focus:ring-eve" value="2">
                    <label for="din_project" class="ml-3 block text-sm font-medium text-dark" >Specific Project</label>
                </div>
            </div>
            <div class="mb-4" id="projectselection">
                <x-input-label class="text-dark mb-2 ">Select Project</x-input-label>
                <select name="project" id="project" class="w-full text-dark">
                </select>
            </div>


            <p class="font-bold text-lg font-oswald text-eve mb-4 uppercase">Personal Information</p>
            <div class="grid grid-cols-1 gap-5 mb-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 w-full sm:space-x-5">
                    <div class="">
                        <x-input-label class="text-dark mb-2">First Name </x-input-label>
                        <x-text-input type="text" placeholder="First Name" name="dofirstname" id="dofirstname" required class="w-full text-dark-light"></x-text-input>
                    </div>

                    <div class="">
                        <x-input-label class="text-dark mb-2">Last Name</x-input-label>
                        <x-text-input type="text" placeholder="Last Name" name="dolastname" id="dolastname" required class="w-full text-dark-light"></x-text-input>
                    </div>
                </div>
                <div class="col-span-2">
                    <x-input-label class="text-dark mb-2">Email Address </x-input-label>
                    <x-text-input type="email" placeholder="Email Address" name="doemail" id="doemail" required class="w-full text-dark-light"></x-text-input>
                </div>
                <div class="col-span-2">
                    <x-input-label class="text-dark mb-2">Phone </x-input-label>
                    <x-text-input type="text" placeholder="012345678975" name="dophone" id="dophone" required class="w-full text-dark-light"></x-text-input>
                </div>
                <div class="col-span-2">
                    <x-input-label class="text-dark mb-2">Address </x-input-label>
                    <x-text-input type="text" placeholder="Address" name="doaddress" id="doaddress"  required class="w-full text-dark-light"></x-text-input>
                </div>
            </div>
            <x-largee-button class="w-full flex justify-center items-center" type="submit">Donate Now!</x-largee-button>
        </form>
        <p id="donatesuccess" class=" text-eve font-raleway text-xl mt-2"></p>
    </div>
</div>
