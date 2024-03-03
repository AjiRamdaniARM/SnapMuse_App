@extends('layouts.main')
@section('content')

{{-- === notfikasi saat hapus akun  --}}
@if (session()->has('deleteaccout'))
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
            <p class="text-sm text-gray-600">{{session('deleteaccout')}}</p>
        </div>
    </div>
    </div>
</div>
<audio id="notificationSound">
    <source src="{{ asset('sound/notif.mp3') }}" type="audio/mpeg">
</audio>
@endif
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
<div class="container px-10 mx-auto">
    {{-- === header === --}}
    <div class="banner w-full">
       <div class="svg -z-20 absolute lg:left-[30em] 2xl:left-[50em] -rotate-12">
           <svg width="130" viewBox="0 0 1645 1645" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g filter="url(#filter0_i_108_3)">
               <path d="M0.109375 486.021C0.109375 217.74 217.594 0.254883 485.876 0.254883H1158.48C1426.76 0.254883 1644.24 217.74 1644.24 486.021V1158.62C1644.24 1426.9 1426.76 1644.39 1158.48 1644.39H485.876C217.594 1644.39 0.109375 1426.9 0.109375 1158.62V486.021Z" fill="url(#paint0_linear_108_3)"/>
               </g>
               <path d="M932.36 799.536C932.36 748.566 952.608 699.685 988.648 663.644C1024.69 627.604 1073.57 607.356 1124.54 607.356C1175.51 607.356 1224.39 627.604 1260.43 663.644C1296.47 699.685 1316.72 748.566 1316.72 799.536C1316.72 850.505 1296.47 899.386 1260.43 935.427C1224.39 971.467 1175.51 991.715 1124.54 991.715C1073.57 991.715 1024.69 971.467 988.648 935.427C952.608 899.386 932.36 850.505 932.36 799.536Z" fill="#1ABCFE"/>
               <g filter="url(#filter1_f_108_3)">
               <path d="M963.889 799.546C963.889 756.938 980.815 716.075 1010.94 685.947C1041.07 655.818 1081.93 638.893 1124.54 638.893C1167.15 638.893 1208.01 655.818 1238.14 685.947C1268.27 716.075 1285.19 756.938 1285.19 799.546C1285.19 842.154 1268.27 883.016 1238.14 913.145C1208.01 943.273 1167.15 960.199 1124.54 960.199C1081.93 960.199 1041.07 943.273 1010.94 913.145C980.815 883.016 963.889 842.154 963.889 799.546Z" fill="url(#paint1_linear_108_3)"/>
               </g>
               <g filter="url(#filter2_f_108_3)">
               <path d="M1001.71 799.547C1001.71 766.97 1014.65 735.728 1037.69 712.692C1060.72 689.657 1091.97 676.716 1124.54 676.716C1157.12 676.716 1188.36 689.657 1211.4 712.692C1234.43 735.728 1247.37 766.97 1247.37 799.547C1247.37 832.124 1234.43 863.366 1211.4 886.402C1188.36 909.437 1157.12 922.378 1124.54 922.378C1091.97 922.378 1060.72 909.437 1037.69 886.402C1014.65 863.366 1001.71 832.124 1001.71 799.547Z" stroke="url(#paint2_linear_108_3)" stroke-width="39.9283"/>
               </g>
               <path d="M548 1183.89C548 1132.92 568.247 1084.04 604.288 1048C640.329 1011.96 689.21 991.712 740.179 991.712H932.358V1183.89C932.358 1234.86 912.111 1283.74 876.07 1319.78C840.03 1355.82 791.148 1376.07 740.179 1376.07C689.21 1376.07 640.329 1355.82 604.288 1319.78C568.247 1283.74 548 1234.86 548 1183.89Z" fill="#0ACF83"/>
               <g filter="url(#filter3_f_108_3)">
               <path d="M582.236 1183.89C582.236 1142 598.877 1101.83 628.497 1072.21C658.117 1042.59 698.29 1025.95 740.179 1025.95H898.122V1183.89C898.122 1225.78 881.482 1265.95 851.862 1295.57C822.242 1325.19 782.068 1341.83 740.179 1341.83C698.29 1341.83 658.117 1325.19 628.497 1295.57C598.877 1265.95 582.236 1225.78 582.236 1183.89Z" fill="url(#paint3_linear_108_3)"/>
               </g>
               <g opacity="0.3" filter="url(#filter4_f_108_3)">
               <path d="M596.275 1183.89C596.275 1145.73 611.437 1109.12 638.425 1082.14C665.413 1055.15 702.017 1039.99 740.184 1039.99H884.092V1183.89C884.092 1222.06 868.931 1258.66 841.943 1285.65C814.954 1312.64 778.351 1327.8 740.184 1327.8C702.017 1327.8 665.413 1312.64 638.425 1285.65C611.437 1258.66 596.275 1222.06 596.275 1183.89Z" fill="url(#paint4_linear_108_3)"/>
               </g>
               <g filter="url(#filter5_f_108_3)">
               <path d="M608.254 1183.89C608.254 1148.9 622.154 1115.35 646.895 1090.61C671.637 1065.86 705.194 1051.96 740.184 1051.96H872.114V1183.89C872.114 1218.88 858.214 1252.44 833.472 1277.18C808.731 1301.92 775.174 1315.82 740.184 1315.82C705.194 1315.82 671.637 1301.92 646.895 1277.18C622.154 1252.44 608.254 1218.88 608.254 1183.89Z" stroke="url(#paint5_linear_108_3)" stroke-width="23.957"/>
               </g>
               <path d="M932.36 223V607.358H1124.54C1175.51 607.358 1224.39 587.111 1260.43 551.07C1296.47 515.03 1316.72 466.148 1316.72 415.179C1316.72 364.21 1296.47 315.329 1260.43 279.288C1224.39 243.247 1175.51 223 1124.54 223H932.36Z" fill="#FF7262"/>
               <path d="M548 415.179C548 466.148 568.247 515.03 604.288 551.07C640.329 587.111 689.21 607.358 740.179 607.358H932.358V223H740.179C689.21 223 640.329 243.247 604.288 279.288C568.247 315.329 548 364.21 548 415.179Z" fill="#F24E1E"/>
               <g filter="url(#filter6_f_108_3)">
               <path d="M578.104 415.179C578.104 458.165 595.179 499.39 625.575 529.785C655.97 560.18 697.195 577.256 740.18 577.256H902.257V253.103H740.18C697.195 253.103 655.97 270.178 625.575 300.574C595.179 330.969 578.104 372.194 578.104 415.179Z" fill="url(#paint6_linear_108_3)"/>
               </g>
               <path d="M589.216 415.182C589.216 455.221 605.121 493.62 633.433 521.932C661.745 550.244 700.144 566.149 740.183 566.149H891.15V264.215H740.183C700.144 264.215 661.745 280.12 633.433 308.432C605.121 336.744 589.216 375.143 589.216 415.182Z" fill="url(#paint7_linear_108_3)"/>
               <g filter="url(#filter7_f_108_3)">
               <path d="M643.315 512.05C617.624 486.359 603.191 451.515 603.191 415.182C603.191 378.849 617.624 344.005 643.315 318.314C669.006 292.623 703.85 278.19 740.183 278.19H877.175V552.174H740.183C703.85 552.174 669.006 537.741 643.315 512.05Z" stroke="url(#paint8_linear_108_3)" stroke-width="27.9498"/>
               </g>
               <g filter="url(#filter8_f_108_3)">
               <path d="M1281.57 415.179C1281.57 458.165 1264.5 499.39 1234.1 529.785C1203.71 560.18 1162.48 577.256 1119.5 577.256H957.421V253.103H1119.5C1162.48 253.103 1203.71 270.178 1234.1 300.574C1264.5 330.969 1281.57 372.194 1281.57 415.179Z" fill="url(#paint9_linear_108_3)"/>
               </g>
               <path d="M1270.46 415.182C1270.46 455.221 1254.56 493.62 1226.24 521.932C1197.93 550.244 1159.53 566.149 1119.49 566.149H968.527V264.215H1119.49C1159.53 264.215 1197.93 280.12 1226.24 308.432C1254.56 336.744 1270.46 375.143 1270.46 415.182Z" fill="url(#paint10_linear_108_3)"/>
               <g filter="url(#filter9_f_108_3)">
               <path d="M1216.36 512.05C1242.05 486.359 1256.49 451.515 1256.49 415.182C1256.49 378.849 1242.05 344.005 1216.36 318.314C1190.67 292.623 1155.83 278.19 1119.49 278.19H982.501V552.174H1119.49C1155.83 552.174 1190.67 537.741 1216.36 512.05Z" stroke="url(#paint11_linear_108_3)" stroke-width="27.9498"/>
               </g>
               <path d="M548 799.535C548 850.504 568.247 899.385 604.288 935.426C640.329 971.466 689.21 991.714 740.179 991.714H932.358V607.355H740.179C689.21 607.355 640.329 627.603 604.288 663.643C568.247 699.684 548 748.565 548 799.535V799.535Z" fill="#A259FF"/>
               <g filter="url(#filter10_f_108_3)">
               <path d="M578.104 782.518C578.104 825.504 595.179 866.728 625.575 897.124C655.97 927.519 697.195 944.595 740.18 944.595H902.257V620.441H740.18C697.195 620.441 655.97 637.517 625.575 667.913C595.179 698.308 578.104 739.533 578.104 782.518Z" fill="url(#paint12_linear_108_3)"/>
               </g>
               <path d="M589.216 782.521C589.216 822.56 605.121 860.959 633.433 889.271C661.745 917.583 700.144 933.488 740.183 933.488H891.15V631.554H740.183C700.144 631.554 661.745 647.459 633.433 675.771C605.121 704.083 589.216 742.482 589.216 782.521Z" fill="url(#paint13_linear_108_3)"/>
               <g filter="url(#filter11_f_108_3)">
               <path d="M643.315 879.389C617.624 853.698 603.191 818.854 603.191 782.521C603.191 746.188 617.624 711.344 643.315 685.653C669.006 659.962 703.85 645.529 740.183 645.529H877.175V919.513H740.183C703.85 919.513 669.006 905.08 643.315 879.389Z" stroke="url(#paint14_linear_108_3)" stroke-width="27.9498"/>
               </g>
               <defs>
               <filter id="filter0_i_108_3" x="0.109375" y="0.254883" width="1771.18" height="1808.55" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
               <feOffset dx="127.047" dy="164.413"/>
               <feGaussianBlur stdDeviation="119.573"/>
               <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
               <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 0.876513 0 0 0 0 0.8625 0 0 0 1 0"/>
               <feBlend mode="normal" in2="shape" result="effect1_innerShadow_108_3"/>
               </filter>
               <filter id="filter1_f_108_3" x="903.996" y="579" width="441.091" height="441.091" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="29.9462" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter2_f_108_3" x="969.77" y="644.773" width="309.547" height="309.547" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="5.98924" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter3_f_108_3" x="494.394" y="938.106" width="491.57" height="491.57" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="43.9211" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter4_f_108_3" x="524.405" y="968.114" width="431.559" height="431.559" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="35.9354" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter5_f_108_3" x="576.311" y="1020.02" width="327.746" height="327.746" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="9.98207" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter6_f_108_3" x="522.204" y="197.203" width="435.952" height="435.952" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="27.9498" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter7_f_108_3" x="581.23" y="256.229" width="317.906" height="317.906" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="3.99283" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter8_f_108_3" x="901.521" y="197.203" width="435.952" height="435.952" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="27.9498" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter9_f_108_3" x="960.541" y="256.229" width="317.906" height="317.906" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="3.99283" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter10_f_108_3" x="522.204" y="564.542" width="435.952" height="435.952" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="27.9498" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <filter id="filter11_f_108_3" x="581.23" y="623.568" width="317.906" height="317.906" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
               <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
               <feGaussianBlur stdDeviation="3.99283" result="effect1_foregroundBlur_108_3"/>
               </filter>
               <linearGradient id="paint0_linear_108_3" x1="348.032" y1="77.8912" x2="1175.28" y2="1648.08" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="0.338542" stop-color="#FFEAE8"/>
               <stop offset="0.71875" stop-color="#E8F8FF"/>
               <stop offset="0.979167" stop-color="#D6FFEF"/>
               </linearGradient>
               <linearGradient id="paint1_linear_108_3" x1="985.392" y1="763.822" x2="1163.84" y2="894.092" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint2_linear_108_3" x1="1031.79" y1="717.425" x2="1084.84" y2="769.247" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint3_linear_108_3" x1="655.768" y1="1248.08" x2="849.161" y2="1196.67" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="0.914748" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint4_linear_108_3" x1="581.205" y1="1240.31" x2="707.886" y2="1309.84" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint5_linear_108_3" x1="620.342" y1="1213.13" x2="691.876" y2="1209.8" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint6_linear_108_3" x1="606.041" y1="313.436" x2="794.577" y2="489.403" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint7_linear_108_3" x1="638.166" y1="321.157" x2="690.945" y2="398.936" gradientUnits="userSpaceOnUse">
               <stop stop-color="white" stop-opacity="0.11"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint8_linear_108_3" x1="652.427" y1="298.915" x2="686.285" y2="333.3" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint9_linear_108_3" x1="1253.64" y1="313.436" x2="1065.1" y2="489.403" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint10_linear_108_3" x1="1221.51" y1="321.157" x2="1168.73" y2="398.936" gradientUnits="userSpaceOnUse">
               <stop stop-color="white" stop-opacity="0.11"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint11_linear_108_3" x1="1207.25" y1="298.915" x2="1165.61" y2="324.107" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint12_linear_108_3" x1="606.041" y1="680.775" x2="794.577" y2="856.742" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint13_linear_108_3" x1="638.166" y1="688.496" x2="690.945" y2="766.275" gradientUnits="userSpaceOnUse">
               <stop stop-color="white" stop-opacity="0.11"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               <linearGradient id="paint14_linear_108_3" x1="635.803" y1="709.9" x2="652.467" y2="734.256" gradientUnits="userSpaceOnUse">
               <stop stop-color="white"/>
               <stop offset="1" stop-color="white" stop-opacity="0"/>
               </linearGradient>
               </defs>
           </svg>
       </div>
       <section class="py-8">
           <div class="banner flex lg:flex-row sm:gap-10 flex-col-reverse justify-center items-center gap-x-20">
               <div class="content-text flex flex-col gap-3 py-2">
                  <div class="container bg-[#FEE9DE] text-center w-40 rounded-full py-2 lg:mb-4 md:mb-4 mb-3">
                           <h1 class="text-red-500 font-medium">website image 😍</h1>
                   </div>
                   <h1 class="text-j-banner text-4xl lg:text-5xl 2xl:text-[4em] lg:w-[9em] tracking-normal ">Find Your Inspiration On The SnapMuse <span class="text-red-400"> Website</span></h1>
                   <p class="text-p-banner lg:w-96">Our job is to filling your tummy with delicious food and  with fast and free delivery </p>

                   {{-- === fitur search === --}}
                   <div class="grupsearch lg:flex  lg:items-center gap-4">
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
                   <form id="categoryForm" action="{{ url('/category') }}" method="GET">
                    <select name="category"  class="flex w-full   items-center justify-between rounded-lg lg:py-3 bg-white p-2 ring-1 ring-gray-300" id="category">
                        <option>Select Category</option>
                        @foreach ($category as $kategori )
                        <option value="{{$kategori->categoryName}}">{{$kategori->categoryName}}</option>
                        @endforeach
                    </select>
                </form>
                   </div>
               </div>
               <div class="content-poto lg:py-0 py-2 ">
                   <img src="{{asset('assets/image/gambar1.svg')}}" class=" w-[35em] " alt="kucing">
               </div>
           </div>
       </section>
       <section class="py-5 relative px-4 -z-10  bg-white shadow-lg sm:rounded-3xl rounded-3xl  bg-clip-padding bg-opacity-60 border border-red-200" style="backdrop-filter: blur(20px);">
           <div class="container mx-auto flex flex-wrap justify-center items-center gap-10 lg:gap-28 py-3">
               <div class="post flex flex-col items-center">
                   <p class="font-bold lg:text-[20px] text-[10px]">All Image</p>
                   <h1 class="lg:text-4xl font-bold text-red-400">{{ $column }}</h1>
               </div>
               <div class="post flex flex-col items-center">
                   <p class="font-bold lg:text-[20px] text-[10px]">All User</p>
                   <h1 class="lg:text-4xl font-bold text-red-400">{{ $columnUser }}</h1>
               </div>
               <div class="post flex flex-col items-center">
                   <p class="font-bold lg:text-[20px] text-[10px]">All Category</p>
                   <h1 class="lg:text-4xl font-bold text-red-400">{{ $columnCategory }}</h1>
               </div>
           </div>
       </section>
   </div>
    {{-- === akhir header === --}}

    <section class="py-5 lg:px-20">
       <div class="top">
           <p class="text-red-400 font-medium mb-2">OUR IMAGE</p>
           <h1 class="top-bold text-3xl">Images that Always Make You Fall in Love</h1>
       </div>
       <div class="container py-5">
        @if ($dataImage->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 py-5">
           @foreach ( $dataImage as $images )
           <a href="{{ url('/detailImage/'.$images->fotoID. '/'. $images->id)}}" class="transform transition duration-500 hover:scale-105 hover:shadow-2xl">
           <label for="file" class="relative cursor-pointer ">
            <img class="h-full max-w-full object-cover shadow-lg border-white rounded-lg " src="{{ asset('image/' . $images->lokasiFile) }}" alt="{{$images->judulFoto}}" >
            <span class="absolute inset-0 flex items-center justify-center text-white opacity-0 rounded-lg  hover:opacity-100 transition duration-300 bg-black bg-opacity-50">
                <div class="absolute bottom-0 left-0 w-full flex justify-between rounded-lg bg-gray-800 bg-opacity-75 py-2 px-4 text-white">
                    <p>{{ $images->judulFoto}}</p>
                    <p class="text-sm font-semibold">{{ $images->user->namalengkap }}</p> <!-- Menampilkan nama profil pengguna -->
                </div>
            </span>
        </label>
    </a>
            {{-- <a href="{{ url('/detailImage/'.$images->fotoID. '/'. $images->id)}}" class="block">
                <img class="h-full object-cover max-w-full rounded-lg shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl" src="{{ asset('image/' . $images->lokasiFile) }}" alt="{{$images->judulFoto}}">
            </a> --}}
           @endforeach


        </div>
        @else
        <div class="container mx-auto">
           <div class="flex flex-col justify-center items-center">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/919401e3-4f7f-4513-9faa-0b85098a34a8/UjBbG39UTr.json" background="##ffffff" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
               <div class="text  font-semibold text-2xl text-center mb-10 ">
                   Image not yet available on the server <br> <span class="text-red-500">please login and upload the image</span>
               </div>
           </div>
        </div>
           @endif
       </div>
    </section>
</div>



<script>

document.addEventListener('DOMContentLoaded', function() {
        // Mengambil nilai kategori yang disimpan di sessionStorage saat halaman dimuat
        var selectedCategory = sessionStorage.getItem('selectedCategory');
        if (selectedCategory) {
            document.getElementById('category').value = selectedCategory;
        }

        // Menambahkan event listener untuk mengirim formulir saat nilai kategori berubah
        document.getElementById('category').addEventListener('change', function() {
            var selectedCategory = this.value;
            var form = document.getElementById('categoryForm');
            var url = "{{ url('/search') }}" + "?category=" + selectedCategory;

            // Mengirimkan permintaan menggunakan fetch API
            fetch(url, {
                method: 'GET'
            })
            .then(response => {
                // Menyimpan nilai kategori ke sessionStorage
                sessionStorage.setItem('selectedCategory', selectedCategory);
                // Handle response jika diperlukan
                form.submit();
            })
            .catch(error => {
                // Handle error jika diperlukan
                console.error('Request failed', error);
            });
        });
    });


</script>
@endsection








