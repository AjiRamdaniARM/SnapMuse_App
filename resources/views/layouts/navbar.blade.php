        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- navbar desktop --}}
    <nav class="flex justify-around items-center py-10">
        <a href="/">
        <div class="logo flex items-center justify-center">
            <img src="{{asset('assets/image/logo.svg')}}" width="100" alt="logoPinterest" />
            <h1 class="font-bold text-[20px]">SnapMuse</h1>
        </div></a>
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-red-600 p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
        </div>
        @if(Route::has('login'))
        <ul class=" justify-center items-center gap-10 hidden lg:flex">
            <li>
                <a href="/" class="hover:font-bold">
                Galery</a>
            </li>
            <li>
                <a href="/api" class="hover:font-bold">
                ApiPexels</a>
            </li>
            @auth
            <li>
                <a href="{{route('image')}}" class="hover:font-bold" >Dashboard</a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button :href="route('logout')"
                class="bg-red-600 hover:bg-gray-400 transition-colors  px-5 rounded-full py-2 font-bold text-white"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </button>
            </form>
                @else
                <li>
                    <a href="{{route('login')}}" class="hover:font-bold">login</a>
                </li>
                @if(Route::has('register'))
                <li class="btn bg-red-500 hover:bg-gray-400 px-5 rounded-full  py-2 font-bold text-white">
                    <a href="{{route('register')}}">Register</a>
                </li>
                @endif
            @endauth
        </ul>
        @endif
    </nav>
    {{-- akhir navbar desktop --}}

    {{-- navbar ukuran hp --}}
    <div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
                    <img src="{{asset('assets/image/logo.svg')}}" width="100" alt="Logo" />
				</a>
				<button class="navbar-backdrop">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>

				<ul>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-red-600 rounded" href="/">Gellery</a>
					</li>
					<li class="mb-1">
						<a href="/api" class="block p-4 text-sm font-semibold text-gray-400 hover:bg-red-50 hover:text-red-600 rounded">
                            ApiPexels</a>
					</li>
                    @if(Route::has('login'))
                    @auth
                    <li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-red-50 hover:text-red-600 rounded" href="{{route('dashboard')}}">Dashboard</a>
					</li>
                    <li class="mb-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button :href="route('logout')"
                        class="block p-4 text-sm font-semibold text-gray-400 hover:bg-red-50 hover:text-red-600 rounded"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
                    @else
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-red-50 hover:text-red-600 rounded" href="{{route('login')}}">Login</a>
					</li>

					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-red-50 hover:text-red-600 rounded" href="{{route('register')}}">Register</a>
					</li>
                    @endauth
                    @endif

				</ul>

			</div>
			<div class="mt-auto">

				<p class="my-4 py-6 text-xs text-center text-gray-400">
					<span>Copyright ©AjiRamdani 2021</span>
				</p>
			</div>
		</nav>
	</div>
    {{-- akhir navbar --}}

    <script>
      // Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.add('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.add('hidden');
                }
            });
        }
    }

});

    </script>
