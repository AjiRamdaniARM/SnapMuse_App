@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-10">
            <div class="w-full max-w-10xl rounded  bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                <div class="md:flex items-center -mx-10">
                    <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                        <div class="relative">
                            <a href="{{ route('detailImage.unduh',$dataImage->lokasiFile) }}" target="_blank" class="z-10 absolute px-5 bg-red-500 text-white rounded-full py-2 mb-10 m-5 hover:bg-gray-400 shadow-md">Unduh Gambar</a>
                            <a href="{{ asset('image/'.$dataImage->lokasiFile) }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('image/'.$dataImage->lokasiFile) }}"  class="w-full rounded-xl z-1 relative z-1" id="gambar" alt="{{$dataImage->judulafoto}}"></a>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-10 overflow-y-auto">
                        <div class="mb-10">
                            <div class="flex flex-col items-start">
                                <div class="logo flex items-center justify-center  py-10">
                                    <img src="{{asset('assets/image/logo.svg')}}" width="100" alt="logoPinterest" />
                                    <h1 class="font-bold text-[20px]">SnapMuse</h1>
                                </div>
                                <h1 class="font-bold  text-4xl">{{ $dataImage->judulFoto }}</h1>
                                <p class="text-1xl">{{ $dataImage->deskripsiFoto }}...
                                <a class="font-bold text-red-500" href="https://api.whatsapp.com/send?phone=6289508742700&text=Saya%20melaporkan%20ada%20kontent%20yang%20tidak%20pantas%20dilihat%20dan%20di%20tayangkan%20dengan%20nama%20{{$data->namalengkap}}%20%20dan%20judul%20gambar%20%20{{$dataImage->judulFoto}}">Laporkan Postingan</a>
                                </p>
                            </div>

                        </div>
                        <div class="flex justify-between">
                            <div class="flex gap-3 ">
                                @if($data2)
                                <img class="lg:w-12 lg:h-12 w-10 h-10 object-cover border-2 border-white rounded-full" src="{{asset('profilePoto/'.$data2->potoProfile)}}" alt="profile" id="output">
                                @else
                                <img class="lg:w-12 lg:h-12 w-10 h-10 object-cover border-2  border-white rounded-full" src="{{asset('assets/image/profile.webp')}}" alt="profile" id="output">
                                @endif
                                <div class="grup">
                               <a href="{{ url('/profileUser/'.$data->id)}}">
                                <h1 class="font-bold text-[12px] lg:text-2xl hover:text-red-500">{{$data->namalengkap}}</h1>
                                </a>
                                <h2 class="text-[12px] lg:text-1xl">{{$data->alamat}}</h2></div>
                            </div>
                            <div class="inline-block align-bottom">
                                  <!-- === Menampilkan Tombol Like === -->
                                  <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-white transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0  dark:bg-gray-800">
                                    <div class="px-3 py-2 bg-gray-800 border-b border-gray-800 rounded-t-lg ">
                                        <h3 class="font-semibold text-white ">User Liked</h3>
                                    </div>
                                    <div class="px-3  py-2 ">
                                        @if ($likeGet->count() > 0)

                                        @foreach ($likeGet as $view )
                                            @php
                                                $currentUserLike = $likeView->firstWhere('id', $view->id);
                                                $currentPhotoLike = $photosLike->firstWhere('id', $view->id);
                                            @endphp
                                            @if ($currentUserLike)
                                            <div class="flex items-center py-2"> <!-- Tambahkan div flex item di sini -->
                                                @if ($currentPhotoLike)
                                                    <img class="w-7 h-7 rounded-full" src="{{ asset('profilePoto/' . $currentPhotoLike->potoProfile) }}" alt="User image">
                                                @else
                                                    <img class="w-7 h-7 rounded-full" src="{{ asset('assets/image/profile.webp') }}" alt="Default profile image">
                                                @endif
                                                <p class="ml-2">{{ $currentUserLike->namalengkap }}</p>
                                            </div>
                                        @else
                                            <p>Unknown User</p>
                                        @endif
                                        @endforeach
                                        @else
                                        <p>NO LIKES😵😵</p>
                                        @endif
                                    </div>

                                    <div data-popper-arrow></div>
                                </div>
                                  <form id="likeForm" action="{{ route('like') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="fotoID" value="{{ $dataImage->fotoID }}">
                                    <button type="submit" data-popover-target="popover-default" class="flex justify-center items-center gap-2 transform transition duration-500  hover:scale-105">
                                        <svg viewBox="0 -0.5 21 21" version="1.1" width="30" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#fd7272" class="like-svg" stroke="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>like [#fd7272]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs> </defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview" transform="translate(-259.000000, -760.000000)" fill="#fd7272">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path d="M203,620 L207.200006,620 L207.200006,608 L203,608 L203,620 Z M223.924431,611.355 L222.100579,617.89 C221.799228,619.131 220.638976,620 219.302324,620 L209.300009,620 L209.300009,608.021 L211.104962,601.825 C211.274012,600.775 212.223214,600 213.339366,600 C214.587817,600 215.600019,600.964 215.600019,602.153 L215.600019,608 L221.126177,608 C222.97313,608 224.340232,609.641 223.924431,611.355 L223.924431,611.355 Z" id="like-[#fd7272]"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <svg width="38" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.1 20.5c0 1.5 1.482 2.5 2.64 2.5.806 0 .869-.613.993-1.82.055-.53.121-1.174.267-1.93.386-2.002 1.72-4.56 2.996-5.325V8C15 5.75 14.25 5 11 5H7.227C5.051 5 4.524 6.432 4.328 6.964A15.85 15.85 0 0 1 4.315 7c-.114.306-.358.546-.638.82-.31.306-.664.653-.927 1.18-.311.623-.27 1.177-.233 1.67.023.299.044.575-.017.83-.064.27-.146.475-.225.671-.143.356-.275.686-.275 1.329 0 1.5.748 2.498 2.315 2.498H8.5S8.1 19 8.1 20.5zM18.5 15a1.5 1.5 0 0 0 1.5-1.5v-7a1.5 1.5 0 0 0-3 0v7a1.5 1.5 0 0 0 1.5 1.5z" fill="#fd7272"/></svg>
                                        <p class="like font-bold">{{$like}}</p>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <br>
            <div class="flex flex-wrap justify-between items-center gap-3">
            <h1 class="font-bold text-3xl text-red-500 ">Komentar </h1>
            @guest
            <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 rounded-lg" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p class="text-[13px] lg:text-1xl">Yuk ikut berkomentar dan kasih like di gambarnya dengan Register dan Login</p>
              </div>
            @endguest
            </div>
            <section class="flex-col justify-center py-5 gap-5 antialiased">
                @auth
                    @include('profile.komentar')
                @endauth
                <div class="container w-full overflow-y-auto flex flex-col  h-96">
                @if ($komentar->count() > 0)
                    @foreach ($komentar as $Komentar)
                        <div class="bg-gray-700 rounded-e-xl rounded-es-xl p-5 relative mb-5">
                            @php
                                $currentUser = $users->firstWhere('id', $Komentar->id);
                                $currentPhoto = $photos->firstWhere('id', $Komentar->id);
                            @endphp
                            @if ($currentUser)
                            <div class="user flex justify-start items-start gap-2 mb-2">
                                @if ($currentPhoto )
                                <img class="w-8 h-8 rounded-full" src="{{asset('profilePoto/'.$currentPhoto->potoProfile)}}" alt="Jese image">
                                @else
                                <img class="w-8 h-8 rounded-full" src=" {{asset('assets/image/profile.webp')}}" alt="Jese image">
                                @endif

                                <h1 class="font-bold relative mb-2 text-white">{{$currentUser->namalengkap}}</h1>
                            </div>
                            @else
                                <p class="font-bold relative mb-2 text-white">Unknown User</p>
                            @endif
                            <p class="relative mb-2 text-white">{{ $Komentar->isiKomentar }}</p>
                            <h6 class="font-bold text-gray-400">{{ $Komentar->waktu }}</h6>
                        </div>
                    @endforeach
                @else
                <div class="flex justify-center items-center">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/ac42fc75-af35-4af9-9929-d150c4a34519/RZfsSKaBiv.json" background="##ffffff" speed="1" style="width: 200px;" loop  autoplay direction="1" mode="normal"></lottie-player>
                    <div class="w-80 text-1xl"><span class="text-red-500">Belum ada komentar!</span>
                        @auth
                        Tambahkan satu untuk memulai percakapan.
                        @else
                        Yuk berkomentar dengan melakukan Register dan Login
                        @endauth

                        </div>
                </div>
                @endif
                </div>



                </section>
            </section>

            <section class="py-5 container mx-auto flex flex-col justify-center items-center">
                <h1 class="text-2xl font-bold">Lainnya untuk dijelajahi!!</h1>

        @if ($rekomendasi->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-5">
           @foreach ( $rekomendasi as $rekomend )
           <a href="{{ url('/detailImage/'.$rekomend->fotoID. '/'. $rekomend->id)}}" class="transform transition duration-500 hover:scale-105 hover:shadow-2xl">
           <label for="file" class="relative cursor-pointer ">
            <img class="h-full max-w-full object-cover shadow-lg border-white rounded-lg " src="{{ asset('image/' . $rekomend->lokasiFile) }}" alt="{{$rekomend->judulFoto}}" >
            <span class="absolute inset-0 flex items-center justify-center text-white opacity-0 rounded-lg  hover:opacity-100 transition duration-300 bg-black bg-opacity-50">
                <div class="absolute bottom-0 left-0 w-full flex justify-between rounded-lg bg-gray-800 bg-opacity-75 py-2 px-4 text-white">
                    <p>{{ $rekomend->judulFoto}}</p>
                    <p class="text-sm font-semibold">{{ $rekomend->user->namalengkap }}</p> <!-- Menampilkan nama profil pengguna -->
                </div>
            </span>
        </label>
    </a>

           @endforeach


        </div>
        @else
        <div class="container mx-auto">
           <div class="flex flex-col justify-center items-center">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/919401e3-4f7f-4513-9faa-0b85098a34a8/UjBbG39UTr.json" background="##ffffff" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
               <div class="text  font-semibold text-2xl text-center mb-10 ">
                Image recommendation not available <br> <span class="text-red-500">please login and upload the image</span>
               </div>
           </div>
        </div>
           @endif

            </section>
        </div>
@endsection

<script>
    document.getElementById('openImageLink').addEventListener('click', function(e) {
    e.preventDefault(); // Mencegah tindakan default dari tautan

    // Ambil URL gambar dari atribut src
    var imageUrl = document.getElementById('gambar').src;

    // Buka URL gambar di halaman baru
    window.open(imageUrl);
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#likeForm').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr('action');

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(response) {
                    var likeCount = response.likeCount;
                    $(".like").text(likeCount);
                      // Mengubah warna fill SVG berdasarkan status
                      if (response.isLiked) {
                        $(".like-svg").attr("fill", "#fd7272");
                    } else {
                        $(".like-svg").attr("fill", "#000000");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
