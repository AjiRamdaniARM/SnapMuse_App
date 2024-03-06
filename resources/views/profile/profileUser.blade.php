@extends('layouts.main')
@section('content')

{{-- === modal pop up profile === --}}
    <div id="popup-modal" tabindex="-1" class="hidden transition delay-75 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative">
            <div class="relative">
                <div class="p-4 md:p-5 text-center">
                   @if($photoProfile)
              <a data-modal-target="popup-modal" data-modal-toggle="popup-modal">
              <img class="w-20 h-20 md:w-96 md:h-96 object-cover rounded-full border-2 border-pink-600 p-1" src="{{asset('profilePoto/'.$photoProfile->potoProfile)}}" alt="profile">
            </a>
          @else
            <a data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                <img class="w-20 h-20 md:w-96 md:h-96 object-cover rounded-full border-2 border-pink-600 p-1" src="{{asset('assets/image/profile.webp')}}" alt="profile">
            </a>
          @endif
                </div>
            </div>
        </div>
    </div>

{{-- === modal pop up profile === --}}

<div class="container mx-auto">
    <main class="bg-gray-100 bg-opacity-25">
        <div class="lg:w-8/12 lg:mx-auto mb-8">
          <header class="flex flex-wrap items-center p-4 md:py-8">
            <div class="md:w-3/12 md:ml-16">
              <!-- profile image -->
              @if($photoProfile)
              <a data-modal-target="popup-modal" data-modal-toggle="popup-modal">
              <img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full border-2 border-pink-600 p-1" src="{{asset('profilePoto/'.$photoProfile->potoProfile)}}" alt="profile">
            </a>
          @else
            <a data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                <img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full border-2 border-pink-600 p-1" src="{{asset('assets/image/profile.webp')}}" alt="profile">
            </a>
          @endif
            </div>

            <!-- profile meta -->
            <div class="w-8/12 md:w-7/12 ml-4">
              <div class="md:flex md:flex-wrap md:items-center mb-4">
                <h2 class="text-3xl inline-block font-light md:mr-2 mb-2 sm:mb-0">
                  {{$data->namalengkap}}
                </h2>

                <!-- badge -->
             <img src="{{asset('assets/image/icons8-verified.gif')}}" width="30" alt="verified">
              </div>

              <!-- post, following, followers list for medium screens -->
              <ul class="hidden md:flex space-x-8 mb-4">
                <li>
                  <span class="font-semibold">{{$jmlhData}}</span>
                  posts
                </li>

                <li>
                  <span class="font-semibold">{{$jumlahlike}}</span>
                  Like
                </li>
                <li>
                  <span class="font-semibold">{{$jumlahkomen}}</span>
                  Komentar
                </li>
              </ul>

              <!-- user meta form medium screens -->
              <div class="hidden md:block">
                <h1 class="font-semibold">{{'@'.$data->username}}</h1>
                <span class="bioclass">{{$data->alamat}}</span>
                <p>Welcome to {{$data->namalengkap}}Hallo saya sebagai photo greper{{$data->namalengkap}}. Thank you for visiting!🖖🖖</p>
                <span><strong>www.SnaptMuse.com</strong></span>
              </div>

            </div>

            <!-- user meta form small screens -->
            <div class="md:hidden text-sm my-2">
              <h1 class="font-semibold">ByteWebster</h1>
                <span class="bioclass">Internet company</span>
                <p>ByteWebster is a web development and coding blog website. Where we provide professional web projects🌍</p>
                <span><strong>www.bytewebster.com</strong></span>
            </div>

          </header>

          <!-- posts -->
          <div class="px-px md:px-3">

            <!-- user following for mobile only -->
            <ul class="flex md:hidden justify-around space-x-8 border-t
                      text-center p-2 text-gray-600 leading-snug text-sm">
              <li>
                <span class="font-semibold text-gray-800 block">{{$jmlhData}}</span>
                posts
              </li>

              <li>
                <span class="font-semibold text-gray-800 block">{{$jumlahlike}}</span>
                Like
              </li>
              <li>
                <span class="font-semibold text-gray-800 block">{{$jumlahkomen}}</span>
                Komentar
              </li>
            </ul>
            <br>
            <br>
            <!-- insta freatures -->
            <ul class="flex items-center justify-around md:justify-center space-x-12
                          uppercase tracking-widest font-semibold text-xs text-gray-600
                          border-t">
              <!-- posts tab is active -->
              <li class="md:border-t md:border-gray-700 md:-mt-px md:text-gray-700">
                <a class="inline-block p-3" href="#">
                  <i class="fas fa-th-large text-xl md:text-xs"></i>
                  <span class="hidden md:inline">post</span>
                </a>
              </li>
            </ul>
            <!-- flexbox grid -->
            <div class="flex flex-wrap -mx-px md:-mx-3">

            @foreach ($dataImage as $image )
              <div class="w-1/3 p-px md:px-3">
                <!-- post 1-->
                <a href="{{ url('/detailImage/'.$image->fotoID. '/'. $image->id)}}">
                  <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
                    <!-- post images-->
                        <img class="w-full rounded-md h-full absolute left-0 top-0 object-cover" src="{{ asset('image/'.$image->lokasiFile) }}" alt="image">
                    <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute
                                      left-0 top-0 hidden">
                      <div class="flex justify-center items-center
                                          space-x-4 h-full">
                        <span class="p-2">
                          {{$image->judulFoto}}
                        </span>
                      </div>
                    </div>


                  </article>
                </a>
              </div>
            @endforeach


                  </article>
                </a>
              </div>
            </div>
          </div>
        </div>
      </main>
</div>
@endsection
