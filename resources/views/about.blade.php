@extends('layouts.main')
@section('content')
<div class="container mx-auto px-5 mb-10">
<img src="{{asset('assets/image/about.svg')}}" class="relative mb-10" alt="TeamSnapMuse">
<h2 class="text-base text-center font-bold text-red-600">
    We have the best equipment
</h2>
<h1 class="text-j-banner text-4xl text-center lg:text-5xl  2xl:text-[4em] tracking-normal ">groups that create<br> SnapMuse web  <span class="text-red-400"> applications</span></h1>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
            <div class="mb-8">
                <img class="object-center object-cover rounded-full  h-36 w-36" src="{{asset('assets/image/logo.svg')}}" alt="photo">
            </div>
            <div class="text-center">
                <p class="text-xl text-gray-700 font-bold mb-2">Aji Ramdani</p>
                <p class="text-base text-gray-400 font-normal">Full Stack Developer</p>
            </div>
        </div>
        <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
            <div class="mb-8">
                <img class="object-center object-cover rounded-full h-36 w-36" src="{{asset('assets/image/logo.svg')}}" alt="photo">
            </div>
            <div class="text-center">
                <p class="text-xl text-gray-700 font-bold mb-2">Nausa Putri Kinana</p>
                <p class="text-base text-gray-400 font-normal">Moderator</p>
            </div>
        </div>
        <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
            <div class="mb-8">
                <img class="object-center object-cover rounded-full h-36 w-36" src="{{asset('assets/image/logo.svg')}}" alt="photo">
            </div>
            <div class="text-center">
                <p class="text-xl text-gray-700 font-bold mb-2">Ardi Setiawan</p>
                <p class="text-base text-gray-400 font-normal">Discuss Laravel</p>
            </div>
        </div>
        <div class="w-full bg-white mx-au rounded-lg p-12 flex flex-col justify-center items-center">
            <div class="mb-8">
                <img class="object-center object-cover rounded-full h-36 w-36" src="{{asset('assets/image/logo.svg')}}" alt="photo">
            </div>
            <div class="text-center">
                <p class="text-xl text-gray-700 font-bold mb-2">Faisal</p>
                <p class="text-base text-gray-400 font-normal">Discuss Tailwind Css</p>
            </div>
        </div>
        <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
            <div class="mb-8">
                <img class="object-center object-cover rounded-full h-36 w-36" src="{{asset('assets/image/logo.svg')}}" alt="photo">
            </div>
            <div class="text-center">
                <p class="text-xl text-gray-700 font-bold mb-2">Endas</p>
                <p class="text-base text-gray-400 font-normal">Operator</p>
            </div>
        </div>

    </div>
</section>


</div>

@endsection
