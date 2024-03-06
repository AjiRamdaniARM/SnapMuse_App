<x-guest-layout>
    <!-- Session Status -->
        <div class="container mx-auto py-20">
            <div class="flex flex-wrap justify-center items-center text-start gap-10 lg:gap-20">
                <div class="grup">
                    <div class="image-login p-48 px-40 lg:p-64 rounded-xl" aria-label="CyberPunk"></div>
                </div>
                <div class="form">
                    <h1 class="font-bold text-4xl lg:text-5xl text-start login py-5" >login</h1>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="flex flex-col gap-5">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" p class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            {{-- PASS --}}
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                {{-- END PASS --}}

                            <div class="button w-full">
                                <x-primary-button>
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="Remember flex justify-center items-center gap-2 text-[12px] ">
                                    <input type="checkbox" class="rounded-lg" name="remember" id="remember_me">
                                    <div>{{ __('Remember me') }}</div>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-end text-[12px] text-blue-500">Forgot Password ?</a>
                                @endauth
                            </div>
                            <div class="text-center text-[13px] ">Don't have account? &nbsp; <a href="/register" class="text-blue-500 font-bold">Registrasi</a></div>
                            <br />
                        </div>

                    </form>
                </div>
            </div>
        </div>







        {{-- <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div> --}}
    </form>
</x-guest-layout>
