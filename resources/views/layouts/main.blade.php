<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEBSITE-IMAGE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'>
    <script
    type="text/javascript"
    src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- ===  navbar ==  --}}
    @include('layouts.navbar')
    {{-- ===  akhir navbar ==  --}}
    <div class="mx-auto">
        @yield('content')
    </div>

    {{-- === footer === --}}
    @include('layouts.footer')


</body>
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</html>

{{-- === style image card === --}}
<style>
    @keyframes slideIn {
       0% {
           transform: translateX(100%);
       }
       100% {
           transform: translateX(0);
       }
   }

   .animate-slide-in {
       animation: slideIn 0.5s ease-out;
   }
   .image {
       background-repeat: repeat;
       background-size: cover;
       width: 1080px;
   }
</style>


{{-- === menjalankan sound notif === --}}
<script>
   //  ===  Memainkan suara saat notifikasi muncul === //
   document.addEventListener('DOMContentLoaded', function () {
       var notificationSound = document.getElementById('notificationSound');
       if (notificationSound) {
           notificationSound.play();
       }
   });
</script>
