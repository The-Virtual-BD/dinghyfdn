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
                <p class="mb-6">Bangladesh is a nation that is still developing economically, and our nation is home to a sizable population. The greatest number of people are living on property, and the primary reason for this is that they do not develop skills and do not engage in entrepreneurial activity. This is the main reason why the Dinghy Foundation tries to help people develop the habits of someone who wants to become an entrepreneur. I have faith in research because I do not believe that innovation can occur without it. I'm always doing research and development to figure out what the most important and risky parts of a problem are and how to solve it by taking the right steps. Find the problem, do some study on it, come up with a solution, and then put it into action.</p>
                <p class="font-raleway font-bold text-xl">Mehedi Hassan</p>
                <p>Founder & Social Worker</p>
            </div>

        </div>
    </div>

    {{-- Mission --}}
    <div class="bg-adam-light">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4">
            <p class="text-center text-base text-eve font-raleway font-light mb-3">Know More</p>
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">About us</h2>
            <div class="flex justify-center mb-7">
                <p class="text-justify sm:text-center">On November 24, 2018, the Dinghy foundation began their journey by organizing a program for 59 pupils. It was founded with "Better Life, Better World" as its motto. <br><br>

                    We concentrated mostly on poverty in Bangladesh, Child Development, Education for Poor & Street Children, Skill Development, Health Programs, Rural Development Programs, Women Empowerment, Environment Protection, Slum Development, etc. We think that everyone deserves a life that is worthy, meaningful, and dignified. <br><br> Bangladesh, despite having the eighth largest population in the world and one of the world's largest economies, continues to struggle with issues such as abject poverty, many social evils, educational backwardness, environmental degradation, and health, etc. To overcome these obstacles to the nation's development, we serve our nation. <br><br> We believe the following quote by HPM Sheikh Hasina: "Let us use our resources to achieve universal sustainable development rather than spending them on arms races." <br><br>  Dinghy Foundation has put forth all of its efforts towards realizing this vision by providing free meals and tutoring for the poor and underprivileged, running skill development and placement-driven programs for young people, providing free health screenings and counseling for those struggling with social issues, planting trees and raising awareness about environmental concerns, and much more!</p>
            </div>
        </div>
    </div>




    {{-- Mission --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4">
            <p class="text-center text-base text-eve font-raleway font-light mb-3">Our Goals</p>
            <h2 class="font-oswald font-bold text-4xl sm:text-5xl mb-6 text-center uppercase sm:mb-14">Mission and Vision</h2>
            <div class="flex justify-center mb-7">
                <p class="text-justify sm:text-center">Creating a beautiful and better society by supplying and ensuring fundamental needs to every impoverished individual and becoming an association and execution partner of Schools, NGOs, Corporates, and Government organizations in Bangladesh for advancement projects. <br><br> Imagining Bangladesh as a nation and society that is devoid of poverty, educated, and free of child labor, where inequality no longer exists and everyone receives essential rights such as Education, Good Food, Good Health, and Shelter, and where the women of the society are empowered and self-reliant.
                    In nutshell to work towards crafting a better Bangladesh which ensures basic health, education, empowerment, and equality to every citizen.</p>
            </div>
            <div class="flex justify-center items-center">
                <a href="{{route('volunteer')}}"><x-largee-button>become a volunteer</x-largee-button></a>
            </div>
        </div>
    </div>




    {{-- Mission --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-10 sm:py-20 px-4 grid grid-cols-2 sm:grid-cols-5 gap-4">
            <div class="h-24 flex justify-center items-center">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="h-24 flex justify-center items-center">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="h-24 flex justify-center items-center">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="h-24 flex justify-center items-center">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>
            <div class="h-24 flex justify-center items-center">
                <img src="{{ asset('img/logos/needdonor.png') }}" alt="">
            </div>

        </div>
    </div>



</x-guest-layout>

