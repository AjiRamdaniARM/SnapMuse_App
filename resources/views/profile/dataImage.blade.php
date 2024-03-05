@extends('Dashboard')
@section('data')


{{-- === notfikasi saat berhasil  --}}
@if (session()->has('success'))
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
            <p class="text-sm text-gray-600">{{session('success')}}</p>
        </div>
    </div>
    </div>
</div>
<audio id="notificationSound">
    <source src="{{ asset('sound/notif.mp3') }}" type="audio/mpeg">
</audio>
@endif

@if (session()->has('delete'))
<div class="z-10 fixed right-0  bottom-0 mr-5 mb-5 sm:mr-6 sm:mb-6">
    <div class="notification animate-slide-in p-4 bg-white rounded-lg shadow-xl mx-auto max-w-sm relative m-10">
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
            <p class="text-sm text-gray-600">{{session('delete')}}</p>
        </div>
    </div>
    </div>
</div>
<audio id="notificationSound">
    <source src="{{ asset('sound/notif.mp3') }}" type="audio/mpeg">
</audio>
@endif

@if (session()->has('update'))
<div class="z-10 fixed right-0  bottom-0 mr-5 mb-5 sm:mr-6 sm:mb-6">
    <div class="notification animate-slide-in p-4 bg-white rounded-lg shadow-xl mx-auto max-w-sm relative m-10">
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
            <p class="text-sm text-gray-600">{{session('update')}}</p>
        </div>
    </div>
    </div>
</div>
<audio id="notificationSound">
    <source src="{{ asset('sound/notif.mp3') }}" type="audio/mpeg">
</audio>
@endif

{{-- === akhir notfikasi saat berhasil  --}}
<div class="container mx-auto px-10 flex flex-wrap justify-center items-start gap-5">
@if ($dataImage->count() > 0)
  @foreach($dataImage as $image)
  <div id="default-modal-{{$image->fotoID}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <img class="w-full cursor-pointer image rounded-xl   object-cover" src="{{ asset('image/' . $image->lokasiFile) }}" alt="{{$image->judulFoto}}" />
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal-{{$image->fotoID}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>

    <div class="max-w-xs container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl">

            <div class="px-3 w-full">
                <img class="w-full cursor-pointer image rounded-xl  h-64 object-cover" src="{{ asset('image/' . $image->lokasiFile) }}" alt="{{$image->judulFoto}}" />
                <button data-modal-target="default-modal-{{$image->fotoID}}" data-modal-toggle="default-modal-{{$image->fotoID}}">
                    <div class="absolute inset-0 shadow-md w-full h-64 container mx-auto text-center py-32 font-bold  text-white opacity-0 transition-opacity duration-300 hover:opacity-100">
                        View Image
                    </div>
                </button>
            </div>

      <div>
        <div class="flex justify-center items-center gap-2">
            <span class="text-white text-xs font-bold rounded-lg bg-red-500 inline-block  py-1.5 px-4 cursor-pointer">{{$image->categoryName}}</span>
            <a href="{{ url('detailImageEdit/'.$image->fotoID. '/'. $image->id) }}">
            <span class="text-white text-xs flex font-bold rounded-lg bg-red-500 hover:bg-red-700 gap-2 py-1.5 px-4 cursor-pointer">
                <svg width="10" viewBox="0 0 24 24" fill="none"  " stroke="#ffff " xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Edit
            </span>
            </a>

            <form  action="{{ route('dataImage.delete', $image->fotoID) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <span class="text-white text-xs font-bold gap-1 rounded-lg flex bg-red-500  ml-4 py-1.5 px-4 cursor-pointer">
                    <svg fill="#ffff" class="hover:fill-slate-400 hover:stroke-slate-400" width="10"" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#ffff ">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                    <path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z"/>
                    </g>
                    </svg>
                    Delete
                    </span>
                </button>

            </form>
        </div>
        <h1 class="text-2xl mt-2 ml-4 font-bold text-gray-800 cursor-pointer hover:text-gray-900 transition duration-100">{{substr($image->judulFoto, 0, 50)}}</h1>
        <div class="p-4">
            <p id="deskripsi-foto-{{ $image->fotoID }}" class="select-all mt-1 mb-2 text-gray-700">
                {{ substr($image->deskripsiFoto, 0, 50) }}...
            </p>
        </div>

      </div>
        <div class="p-6 pt-3">
            <a href="{{ url('/detailImage/'.$image->fotoID. '/'. $image->id)}}">
                <div
                class="block w-full select-none rounded-lg bg-gray-900 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button">
                Detail Image
                </div>
            </a>
        </div>
    </div>

  @endforeach
  @else
    <div class="flex  justify-center items-center">
        <img class="w-96 lg:w-[30em]" src="{{asset('assets/image/503-Error-Service-Unavailable-v1.svg')}}">
       <div class="font-semibold mb-10 lg:text-3xl">
        Image is not on the server <br><span class="text-red-500"> upload the picturer</span>
       </div>
    </div>
    @endif
</div>


@endsection



