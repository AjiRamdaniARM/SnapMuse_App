<div class="max-w-xs container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl">
    <div>
      <span class="text-white text-xs font-bold rounded-lg bg-red-500 inline-block mt-4 ml-4 py-1.5 px-4 cursor-pointer">kategori image</span>
      @if ($errors->has('lokasiFile'))
      <h1 class="text-2xl mt-2 ml-4 font-bold text-red-500 cursor-pointer  transition duration-100">{{ $errors->first('judulFoto') }}</h1>
      @else
      <h1 class="text-2xl mt-2 ml-4 font-bold text-gray-800 cursor-pointer hover:text-gray-900 transition duration-100">judul foto ( max 50 )</h1>
      @endif

      @if ($errors->has('deskripsiFoto'))
      <p class="ml-4 mt-1 mb-2 text-gray-700 hover:underline cursor-pointer">{{$message}}</p>
      @endif
        <p class="ml-4 mt-1 mb-2 text-gray-700 hover:underline cursor-pointer">deskripsi foto ( max 255 )</p>
    </div>
    <div class="z-10 absolute  mb-10 m-2  px-2 bg-red-500 text-white rounded-full py-2 text-[10px] ">( PNG, JPG/JPEG , SVG )</div>
    <img src="{{ asset('image/' . $dataImage->lokasiFile) }}"  alt="{{$dataImage->judulFoto}}">
    {{-- <div class="bg-gray-300 image p-[100px] " ></div> --}}
    <div class="flex p-4 justify-between">
      <div class="flex items-center space-x-2">
        <svg fill="#ff0000" width="20"" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#ff0000 ">
            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
            <g id="SVGRepo_iconCarrier">
            <path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z"/>
            </g>
            </svg>
            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
      </div>
      <div class="flex space-x-2">
        <span class="font-bold">{{$user->username}}</span>
      </div>
    </div>
  </div>