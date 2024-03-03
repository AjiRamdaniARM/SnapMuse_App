@extends('layouts.main')
@section('content')
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative">
            <div class="relative">
                @if($photoProfile)
                        <img class="w-96 h-96 border-4 border-white rounded-full" src="{{asset('profilePoto/'.$photoProfile->potoProfile)}}" alt="profile" id="output">
                        <form  action="{{ route('deletePotoProfile.delete',$photoProfile->profileId)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium relative  m-10 ml-32 rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Delete PotoProfile
                        </button>
                        </form>
            @else
                        <img class="w-40 h-40 border-4 border-white rounded-full" src="{{asset('assets/image/profile.webp')}}" alt="profile" id="output">
            @endif
            
            </div>
         
        
        </div>
        
    </div>
    
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
                    <img class="w-40 h-40 object-cover  border-4 border-white rounded-full" src="{{asset('profilePoto/'.$photoProfile->potoProfile)}}" alt="profile" id="output">
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
                    <img class="w-40 h-40 border-4 border-white rounded-full" src="{{asset('assets/image/profile.webp')}}" alt="profile" id="output">
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

    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="w-full flex flex-col 2xl:w-1/3">
            <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                <ul class="mt-2 text-gray-700">
                    <li class="flex border-y py-2">
                        <span class="font-bold w-24">Full name:</span>
                        <span class="text-gray-700">{{$user->namalengkap}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Email:</span>
                        <span class="text-gray-700">{{$user->email}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Location:</span>
                        <span class="text-gray-700">{{$user->alamat}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Date Account:</span>
                        <span class="text-gray-700">{{$user->created_at}}</span>
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
        function uploadImage() {
            var image = document.getElementById("output");
            var formData = new FormData();
            var fileInput = event.target;
            var fileInput = document.getElementById('file');
            var userIdInput = document.getElementById('id');

            image.src = URL.createObjectURL( fileInput.files[0]);
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


