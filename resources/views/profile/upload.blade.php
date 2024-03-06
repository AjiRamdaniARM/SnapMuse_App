<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPLOAD IMAGE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

{{-- === navbar desktop === --}}
<nav class="flex justify-around items-center py-10">
    <a href="/">
    <div class="logo flex items-center justify-center gap-5">
        <img src="{{asset('assets/image/logo.svg')}}" width="100" alt="logoPinterest" />
        <h1 class="font-bold text-[15px]">SnapMuse</h1>
    </div></a>

    <ul class=" justify-center items-center gap-10  lg:flex">
        <li>
            <a href="/dataImage" class="text-red-500 font-bold flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                  </svg>

            <div>Kembali</div></a>
        </li>
    </ul>
</nav>
    </nav>
</div>
{{-- akhir navbar --}}
<div class="bg-red-100 lg:w-[50em] w-[20em] mx-auto border border-red-400 text-red-700 px-8 py-3 rounded relative" role="alert">
    <strong class="font-bold">Warning!</strong>
    <span class="block sm:inline">It is forbidden to upload images that are strange and not worth showing</span>
  </div>
{{-- content --}}
<div class="relative min-h-screen flex flex-wrap gap-10  justify-center  py-12 px-4 sm:px-6 lg:px-8  bg-no-repeat bg-cover items-start">
    {{-- card upload image --}}
	<div class="sm:max-w-lg w-full p-10 shadow-md border-2  border-red-500 bg-white rounded-xl z-10">
		<div class="text-center">
			<h2 class="mt-5 text-3xl font-bold text-gray-900">
				File Upload!
			</h2>
			<p class="mt-2 text-sm text-gray-400">Upload gambar kamu di sini.</p>
		</div>
        <form action="{{ route('upload')}}" method="POST"  enctype="multipart/form-data">
            @csrf
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Title Image</label>
                        <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500" name="judulFoto" type="text" id="judulFoto" required >
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Description Image</label>
                        <textarea class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500" name="deskripsiFoto" required></textarea>

                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Category Image</label>
                        <select name="categoryID" class="rounded-lg border-gray-300" required>
                            @foreach($dataCategory as $record)
                            <option value="{{$record->categoryName }}">{{$record->categoryName}}</option>
                            @endforeach
                        </select>
                        <input type="text" value="{{$user->id}}" name="id" hidden>
                        <div class="grid grid-cols-1 space-y-2">
                            <label class="text-sm font-bold text-gray-500 tracking-wide">Insert Image</label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                                     <div class="h-full w-full text-center flex flex-col items-center justify-center ">
                                        <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                        <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                                        </div>
                                        <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> </p>
                                        <input type="file" name="lokasiFile" id="imageInput" required>
                                    </div>
                                </label>
                            </div>
                        </div>
                    <div>
                        <button type="submit"  class="my-5 w-full flex justify-center bg-red-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none focus:shadow-outline hover:bg-red-600 shadow-lg cursor-pointer transition ease-in duration-300">
                        Upload
                    </button>
                    </div>
        </form>
	</div>
</div>

<div class="flex flex-col gap-5">
        <div class="max-w-xs container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <div class="px-3 w-full">
                    <div class="bg-gray-300 p-[100px] ">
                        @if ($errors->has('lokasiFile'))
                        <h1 class="text-red-500">{{ $errors->first('lokasiFile') }}</h1>
                    @else
                        <h1 class="w-68">Format File (JPG, JPEG, PNG & SVG)</h1>
                        <p class="w-72">Size Image (max: 2MB)</p>
                    @endif

                    </div>
                </div>

          <div>
            <div class="flex justify-center items-center px-4 py-2 gap-2">
                <span class="text-white text-[9px]  font-bold rounded-lg bg-red-500 inline-block  py-1.5 px-4 cursor-pointer">Category Image</span>
                <span class="text-white text-xs flex font-bold rounded-lg bg-red-500 hover:bg-red-700 gap-2 py-1.5 px-4 cursor-pointer">
                    <svg width="10" viewBox="0 0 24 24" fill="none"  " stroke="#ffff " xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Edit
                </span>
                    <button type="submit">
                        <span class="text-white text-xs font-bold gap-1 rounded-lg flex bg-red-500  ml-4 py-1.5 px-4 cursor-pointer">
                        <svg fill="#ffff" class="hover:fill-slate-400 hover:stroke-slate-400" width="10"" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#ffff ">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                        <g id="SVGRepo_iconCarrier">
                        <path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z"/>
                        </g>
                        </svg>
                        Delete
                        </span>
                    </button>
            </div>
            @if ($errors->has('judulFoto'))
            <h1 class="text-2xl mt-2 ml-4 font-bold text-red-500 cursor-pointer hover:text-gray-900  transition duration-100">{{ $errors->first('judulFoto') }}</h1>
            @else
            <h1 class="text-2xl mt-2 ml-4 font-bold text-gray-800 cursor-pointer hover:text-gray-900 transition duration-100">judul foto ( max 50 )</h1>
            @endif
            <div class="p-4">
                @if ($errors->has('deskripsiFoto'))
                <p  class="select-all mt-1 mb-2 text-red-500">
                    {{ $errors->first('deskripsiFoto') }}
                </p>
                @else
                <p class="select-all mt-1 mb-2 text-gray-700">
                    deskripsi foto ( max 255 )
                </p>
                @endif
            </div>

          </div>
            <div class="p-6 pt-3">
                    <div
                    class="block w-full select-none rounded-lg bg-gray-900 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button">
                    Detail Image
            </div>
        </div>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/346b73c4-54bd-42b4-96bb-b7721628c0a3/RCQjaZUlqC.json" background="##FFFFFF" speed="1" style="width: 300px; height: 300px" loop  autoplay direction="1" mode="normal"></lottie-player></div>

<script>
      var inputElement = document.getElementById('imageInput');

// Menambahkan event listener untuk "change" event
inputElement.addEventListener('change', function() {
    // Memeriksa apakah file telah dipilih
    if (inputElement.files.length > 0) {
        // Menampilkan alert jika file telah dipilih
        alert('It is forbidden to upload images that are strange and not worth showing' + inputElement.files[0].name);
    }
});
</script>

</body>
</html>
