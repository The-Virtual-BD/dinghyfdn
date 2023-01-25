<x-guest-layout>
    <div class="p-4 sm:p-0 bg-team-hero bg-cover bg-center bg-no-repeat ">
        <div class="max-w-7xl sm:pt-[150px] sm:pb-[90px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center font-bold font-oswald text-3xl sm:text-5xl text-white mt-5 uppercase">ABOUT US</h1>
        </div>
    </div>

    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-10 sm:py-15 px-4 grid grid-cols-1 sm:grid-cols-4 gap-5">
            <div class="">
                <img src="{{asset('img/about-2.jpg')}}" alt="">
            </div>

            <div class="col-span-3">
                <p class="text-center text-base text-eve font-raleway font-light mb-3">WHO WE ARE</p>
                <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">This is our story</h2>
                <p class="mb-6">“Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.

                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.”</p>
                <p class="font-raleway font-bold text-xl">Mehedi Hassan</p>
                <p>Founder & CEO</p>
            </div>

        </div>
    </div>


    {{-- Mission --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4">
            <p class="text-center text-base text-eve font-raleway font-light mb-3">What Now?</p>
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">Support our mission</h2>
            <div class="flex justify-center mb-7">
                <p class="sm:w-[768px] text-center">Right now, Dinghy foundation is working tirelessly around the clock to reach every child caught up in this unprecedented children's emergency. Your support is vital in enabling the survival of these children and in ensuring they have the chance to develop, thrive and reach their full potential.</p>
            </div>
            <div class="flex justify-center items-center">
                <a href=""><x-largee-button>become a volunteer</x-largee-button></a>
            </div>
        </div>
    </div>


    {{-- Mission --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4 grid grid-cols-2 sm:grid-cols-5 gap-4">
            <div class="border border-eve h-24 flex justify-center items-center p-4">
                <img src="{{asset('img/logos/logoipsum-256.svg')}}" alt="">
            </div>
            <div class="border border-eve h-24 flex justify-center items-center p-4">
                <img src="{{asset('img/logos/logoipsum-263.svg')}}" alt="">
            </div>
            <div class="border border-eve h-24 flex justify-center items-center p-4">
                <img src="{{asset('img/logos/logoipsum-257.svg')}}" alt="">
            </div>
            <div class="border border-eve h-24 flex justify-center items-center p-4">
                <img src="{{asset('img/logos/logoipsum-264.svg')}}" alt="">
            </div>
            <div class="border border-eve h-24 flex justify-center items-center p-4">
                <img src="{{asset('img/logos/logoipsum-288.svg')}}" alt="">
            </div>

        </div>
    </div>



</x-guest-layout>

