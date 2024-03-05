<x-guest-layout>


    <div class="container mx-auto py-10">
        <div class="flex flex-wrap justify-center items-center gap-20">
        {{-- image --}}
        <div class="grup">
            <div class="image-register p-48 px-40 lg:p-64 rounded-xl" aria-label="CyberPunk"></div>
        </div>
        {{-- akhir image --}}

        <div class="form py-20">
            <h1 class="font-bold text-3xl lg:text-5xl text-center lg:text-start login lg:px-0 px-10 py-5" >Register Akun</h1><br>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                {{-- colummn1 --}}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <x-input-label for="username" :value="__('Username')" />
                      <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" placeholder="cth: robotosnap " required autofocus autocomplete="username" />
                      <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>


                    <div class="w-full md:w-1/2 px-3">
                      <x-input-label for="namalengkap" :value="__('Full Name')" />
                      <x-text-input id="namalengkap" class="block mt-1 w-full" type="text" name="namalengkap" :value="old('namalengkap')" placeholder="cth: Roboto Snap " required autofocus autocomplete="namalengkap" />
                      <x-input-error :messages="$errors->get('namalengkap')" class="mt-2" />
                  </div>
                </div>

                {{-- column2 --}}
                <div class="flex flex-wrap -mx-3 mb-3">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>


                      <div class="w-full md:w-1/2 px-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="cth: roboto@gmail.com " required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      </div>

                </div>

                <div class="flex flex-wrap -mx-3 mb-3">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                      </div>

                      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-input-label for="namalengkap" :value="__('Home Address')" />
                        <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" placeholder="cth: Sukabumi,Jawa Barat" required autofocus autocomplete="alamat" />
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>

                </div>


                <br>

                  <div class="button w-full ">
                    <x-primary-button>
                        {{ __('Register') }}
                    </x-primary-button>
                </div>

                <div class="flex justify-between items-center  py-5">
                    <div class="Remember flex justify-center items-center gap-2 text-[12px] ">
                        <input type="checkbox" class="rounded-lg" name="remember" id="remember">
                        <div>Remember Me</div>
                    </div>
                    <div class="text-center text-[12px] lg:text-[13px]"> Have an account? &nbsp; <a href="/login" class="text-blue-500 font-bold">Login</a></div>
                </div>

            </form>
        </div>

    </div>
    </div>

</x-guest-layout>




