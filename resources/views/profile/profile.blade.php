@extends('layouts.main')
@section('content')

{{-- === modal pop up photo profile === --}}
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative">
            <div class="relative">
                @if($photoProfile)
                        <img class="w-96 h-96 border-4 border-white rounded-full" src="{{asset('profilePoto/'.$photoProfile->potoProfile)}}" alt="profile" >
                        <form  action="{{ route('deletePotoProfile.delete',$photoProfile->profileId)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium relative  m-10 ml-32 rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Delete PotoProfile
                        </button>
                        </form>
            @else
                        <img class="w-40 h-40 border-4 border-white rounded-full" src="{{asset('assets/image/profile.webp')}}" alt="profile" >
            @endif
            </div>
        </div>
    </div>
{{-- === akhir modal pop up photo profile === --}}

{{-- === notfikasi saat edit Profile  --}}
@if (session()->has('akunUp'))
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
            <p class="text-sm text-gray-600">{{session('akunUp')}}</p>
        </div>
    </div>
    </div>
</div>
<audio id="notificationSound">
    <source src="{{ asset('sound/notif.mp3') }}" type="audio/mpeg">
</audio>
@endif

<div class="container px-10 mx-auto">
    <div class="bg-white rounded-lg shadow-xl pb-8">
        <div class="w-full h-[250px]">
            <img src="https://wallpaperaccess.com/full/4910984.gif" class="w-full h-full object-cover rounded-tl-lg rounded-tr-lg">
        </div>
        <div class="flex flex-col items-center -mt-20">
            {{-- === form input and edit imageProfile === --}}
        @if($photoProfile)
            <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" >
                <label for="file" class="relative cursor-pointer">
                    <img id="output" class="w-40 h-40 object-cover   border-4 border-white rounded-full" src="{{asset('profilePoto/'.$photoProfile->potoProfile)}}" alt="profile">
                    <span class="absolute inset-0 flex items-center justify-center text-white opacity-0  rounded-full hover:opacity-100 transition duration-300 bg-black bg-opacity-50">
                       View Profile
                    </span>
                </label>
                </a>

        @else
            <form id="imageForm" enctype="multipart/form-data">
                @csrf
                <input type="text" id="id"  name="id" value="{{$user->id}}" hidden>
                <label for="file" class="relative cursor-pointer">
                    <input id="file" name="potoProfile"  class="opacity-0 w-40 h-40 absolute inset-0 " type="file" name="potoProfile" onchange="uploadImage(event)"/>
                    <img class="w-40 h-40 border-4 border-white rounded-full" id="output" src="{{asset('assets/image/profile.webp')}}" alt="profile" >
                    <span class="absolute inset-0 flex items-center justify-center text-white opacity-0  rounded-full hover:opacity-100 transition duration-300 bg-black bg-opacity-50">
                        Upload Image
                    </span>
                </label>
            </form>
        @endif
         {{-- === form input and edit imageProfile === --}}
            <div class="flex items-center space-x-2 mt-2">
                <p class="text-2xl">{{$user->namalengkap}}</p>
                <span class="bg-blue-500 rounded-full p-1" title="Verified">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                    </svg>
                </span>
            </div>
            <p class="text-sm text-gray-500">{{$user->alamat}}</p>
            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$jmlhData}}</span><span class="text-sm text-blueGray-400">Image</span>
                </div>
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$jumlahlike}}</span><span class="text-sm text-blueGray-400">Like</span>
                </div>
                <div class="lg:mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$jumlahkomen}}</span><span class="text-sm text-blueGray-400">Comment</span>
                </div>
              </div>
        </div>

        {{-- === button delete account === --}}
        <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
            <div class="flex items-center space-x-4 mt-2">
                <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                >{{ __('Delete Account') }}</x-danger-button>
                <x-danger-button
                onclick="window.location.href='{{ url('/profileUser/'.$user->id)}}'"
                >
                    <span>View Accout</span>
                </x-danger-button>
            </div>
        </div>
    </div>

    {{-- === personal info === --}}
    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="w-full flex flex-col 2xl:w-1/3">
            <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                <h4 class="text-xl text-gray-900 font-bold">Edit User Account</h4>

                <ul class="mt-2 text-gray-700">
                    <form  method="POST" action="{{ route('user.editUser') }}">
                        @csrf
                    <li class="flex border-y py-2">
                        <span class="font-bold w-24">Full name:</span>
                        <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none w-full focus:ring-red-500" name="namalengkap"  type="text" id="namalengkap" value="{{$user->namalengkap}}" required >
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Email:</span>
                        <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none w-full focus:ring-red-500" name="email"  type="email" id="email" value="{{$user->email}}" required >
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Location:</span>
                        <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none w-full focus:ring-red-500" name="alamat"  type="text" id="alamat" value="{{$user->alamat}}" required >
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Date Account:</span>
                        <span class="text-gray-700">{{$user->created_at}}</span>
                    </li>
                    <li class="flex border-b py-2">

                            <button type="submit" class="font-bold bg-red-500 text-white rounded-full px-10 py-4">Edit Profile</button>

                    </li>
                    </form>
                    <li class="flex border-b py-2">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>
@endsection

{{-- === SISTEM JS  === --}}
<script>

        function uploadImage(event) {
            var formData = new FormData();
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
            var fileInput = event.target;
            var fileInput = document.getElementById('file');
            var userIdInput = document.getElementById('id');


            formData.append('potoProfile', fileInput.files[0]);
            formData.append('id', userIdInput.value);
            formData.append('_token', '{{ csrf_token() }}');

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: '{{ route("profilePoto") }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Tambahkan logika error di sini jika diperlukan
                }
            });
        }
</script>


<script>
    //  ===  Memainkan suara saat notifikasi muncul === //
    document.addEventListener('DOMContentLoaded', function () {
        var notificationSound = document.getElementById('notificationSound');
        if (notificationSound) {
            notificationSound.play();
        }
    });
 </script>
