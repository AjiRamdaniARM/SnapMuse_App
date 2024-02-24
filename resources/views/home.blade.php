@extends('layouts.main')
@section('content')

{{-- === notfikasi saat logout  --}}
@if (session()->has('logout'))
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
            <p class="text-sm text-gray-600">{{session('logout')}}</p>
        </div>
    </div>
    </div>
</div>
<audio id="notificationSound">
    <source src="{{ asset('sound/notif.mp3') }}" type="audio/mpeg">
</audio>
@endif
{{-- === akhir notifikasi === --}}


<div class="container mx-auto px-10">
     {{-- === header === --}}
    <div class="banner w-full">
        <section class="py-10">
            <div class="banner flex lg:flex-row sm:gap-10 flex-col-reverse justify-center items-center gap-x-20">
                <div class="content-text flex flex-col gap-3">
                    <h1 class="text-4xl w-80 " style="font-family: 'Ubuntu', sans-serif;"><span class="text-red-500">Website Gallery,</span>  Browse the images you love on our website</h1>
                    <p>client comfort is our responsibility </p>
                    {{-- === fitur search === --}}
                    <div class="grupsearch">
                        <form class="py-2"  action="{{ url('/search') }}" method="GET">
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="text" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border rounded-lg  focus:ring-red-500 focus:border-red-500 bg-gray-700 border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" name="search" placeholder="Search Image..." required>
                                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Search</button>
                            </div>
                        </form>


                    {{-- === fitur search === --}}

                    </div>
                </div>
                <div class="content-poto lg:py-0 py-2 ">
                    <img src="{{asset('assets/image/gambar1.svg')}}" class="w-[30em]" alt="astronot">
                </div>
            </div>
        </section>
    </div>
     {{-- === akhir header === --}}

     {{-- === menghitung data === --}}
    <div class="container mx-auto py-5">
        <div class="flex  justify-center items-center lg:gap-10 gap-5">
            <div class="count-image text-center">
                <h1 class="font-bold lg:text-3xl text-2xl">{{ $column }}K</h1>
                <p class="text-[10px] text-gray-400">All Image</p>
            </div>
            <hr class="h-10 w-[2px] bg-gray-500">
            <div class="count-image text-center">
                <h1 class="font-bold lg:text-3xl text-2xl">{{ $columnUser }}K</h1>
                <p class="text-[10px] text-gray-400">Active User</p>
            </div>
            <hr class="h-10 w-[2px] bg-gray-500">
            <div class="count-image text-center">
                <h1 class="font-bold lg:text-3xl text-2xl">{{ $columnCategory }}K</h1>
                <p class="text-[10px] text-gray-400">Active Category</p>
            </div>
        </div>
    </div>
 {{-- === akhir menghitung data === --}}

    <div class="container py-3 mx-auto ">
        <div class="content">
        <div class="head flex justify-around items-center">
            <h1 class="font-bold lg:text-2xl text-[13px]  uppercase" style="font-family: 'Ubuntu', sans-serif;"><span class="text-red-500">Explore</span> Top Image</h1>
            <select name="categori" class="rounded-full  transform transition duration-500 hover:scale-105 hover:border-red-500 hover:font-semibold hover:transition  select-none" id="categori" >
                <option selected>Select Category</option>
                @foreach ($category as $kategori )
                <option value="{{$kategori->categoryName}}">{{$kategori->categoryName}}</option>
                @endforeach
                {{-- === Looping Data Category akhir === --}}
            </select>
        </div>

        {{-- === data image === --}}
        @if ($dataImage->count() > 0)
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:px-10 px-4  py-5">
    @foreach ( $dataImage as $images )
    <div>
        {{-- <a href="{{ route('detail', ['fotoID' => $images->fotoID]) }}"> --}}
            <a href="{{ url('/detailImage/'.$images->fotoID. '/'. $images->id)}}">
        <img class="object-cover  w-[1080px] rounded-lg shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl" src="{{ asset('image/' . $images->lokasiFile) }}"  alt="{{$images->judulFoto}}"></a>
    </div>
    @endforeach


</div>
@else
<div class="container mx-auto">
    <div class="flex flex-col justify-center items-center">
        <div class="image ">
            <img class="w-96" src="{{asset('assets/image/503-Error-Service-Unavailable-v1.svg')}}">
        </div>
        <div class="text  font-semibold text-2xl text-center mb-10 ">
            Image not yet available on the server <br> <span class="text-red-500">please login and upload the image</span>
        </div>
    </div>
</div>
    @endif

    </div>
    </div>
</div>
@endsection





