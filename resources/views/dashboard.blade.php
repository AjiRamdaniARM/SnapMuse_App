<x-app-layout>
    {{-- === notfikasi saat login  --}}
@if (session()->has('login'))
<div class="z-10 fixed right-0  bottom-0 mr-5 mb-5 sm:mr-6 sm:mb-6">
    <div class="notification animate-slide-in transition-all duration-500 ease-in-out p-4 bg-white rounded-lg shadow-xl mx-auto max-w-sm relative m-10">
        <div class="absolute -top-1 right-0">
        <span class="relative flex h-5 w-5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-5 w-5 bg-red-500"></span>
          </span>
        </div>
        <div class="flex items-center">
        <span class="text-xs font-semibold uppercase m-1 py-1 mr-3 text-gray-500 absolute bottom-0 right-0"><?php
            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('G:i:s');
            echo "$timestamp";
            ?></span>
        <img class="h-12 w-12 rounded-full" alt="John Doe's avatar"
            src="{{asset('assets/image/maskot.jpg')}}" />
        <div class="relative ml-5 mb-2">
            <h4 class="text-lg font-semibold leading-tight text-gray-900">There is a notification !!!</h4>
            <p class="text-sm text-gray-600">{{session('login')}}</p>
        </div>
    </div>
    </div>
</div>
<audio id="notificationSound">
    <source src="{{ asset('sound/notif.mp3') }}" type="audio/mpeg">
</audio>
@endif

    {{-- === notfikasi saat register  --}}
    @if (session()->has('register'))
    <div class="z-10 fixed right-0  bottom-0 mr-5 mb-5 sm:mr-6 sm:mb-6">
        <div class="notification animate-slide-in transition-all duration-500 ease-in-out p-4 bg-white rounded-lg shadow-xl mx-auto max-w-sm relative m-10">
            <div class="absolute -top-1 right-0">
            <span class="relative flex h-5 w-5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-5 w-5 bg-red-500"></span>
              </span>
            </div>
            <div class="flex items-center">
            <span class="text-xs font-semibold uppercase m-1 py-1 mr-3 text-gray-500 absolute bottom-0 right-0"><?php
                $tz = 'Asia/Jakarta';
                $dt = new DateTime("now", new DateTimeZone($tz));
                $timestamp = $dt->format('G:i:s');
                echo " $timestamp";
                ?></span>
            <img class="h-12 w-12 rounded-full" alt="John Doe's avatar"
                src="{{asset('assets/image/maskot.jpg')}}" />
            <div class="relative ml-5 mb-2">
                <h4 class="text-lg font-semibold leading-tight text-gray-900">There is a notification !!!</h4>
                <p class="text-sm text-gray-600">{{session('register')}}</p>
            </div>
        </div>
        </div>
    </div>
    <audio id="notificationSound">
        <source src="{{ asset('sound/notif.mp3') }}" type="audio/mpeg">
    </audio>
    @endif

    <div class="container px-10 mx-auto">

        <section class="py-10">
            <div class="banner flex flex-wrap justify-center items-center gap-x-44">
                <div class="content-text flex flex-col gap-3">
                    <h1 class="text-4xl w-80 " style="font-family: 'Ubuntu', sans-serif;"><span class="text-red-500">Upload your best</span>  images on our platform and showcase your work.</h1>
                    <p>upload your coolest picture and get the most likes </p>
                    <div class="grup-button">
                        <button onclick="window.location.href='/upload'" class="bg-red-500 hover:bg-red-300 delay-75 text-white font-semibold px-10 py-3 rounded-full" >Upload Image</button>
                    </div>
                </div>
                <div class="content-poto lg:py-0 py-2">
                    <img src="{{asset('assets/image/astronot.png')}}" class="w-96" alt="astronot">
                </div>
            </div>
        </section>
        <section class="container body mx-auto flex flex-col justify-center items-center">
            <div class="header">
                <div class="grup-button flex jusify-center-items-center gap-10">
                    <a href="{{ route('image') }}" class="bg-red-500 text-white px-5 py-2 rounded-lg font-semibold">Image</a>
                    <a href="/akun">Profile</a>
                </div>
            </div>
            <div class="mx-auto py-10">
                @yield('data')
            </div>
        </section>

    </div>
</x-app-layout>


