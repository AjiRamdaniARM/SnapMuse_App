@extends('layouts.main')
@section('content')
<div class="container mx-auto px-5">
    <div class="container flex justify-center items-center py-10">
        <img src="{{asset('assets/image/logo.svg')}}" alt="Logo" class="lg:w-[12em] w-[8em]">
        <h1 class="text-j-banner text-4xl text-center lg:text-[14em] 2xl:text-[4em] tracking-normal lg:px-10 px-5">X</h1>
        <h1 class="text-j-banner text-2xl text-center lg:text-5xl 2xl:text-[4em] tracking-normal ">API  <span class="text-red-500">PEXEL</span></h1>
    </div>

    <div class="container py-10">

<form class="flex items-center max-w-sm mx-auto" id="form">
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
            </svg>
        </div>
        <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Search branch name..." required  />
    </div>
    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>

    </div>


<div class="grid grid-cols-2 md:grid-cols-3 gap-4 px-10 py-5">
</div>
</div>

<script>
    $(document).ready(function() {
    var api_key = "GvroUQ6GKaol94RfNUnvKcG1aMsQsKkMWYU2VXM8ob1JPgPLgVKfdglG"
    $("#form").submit(function (event){
        event.preventDefault()
        var search = $("#search").val()
        imagesearch(search); // Memanggil fungsi imagesearch dengan parameter search
    });
    function imagesearch(search) { // Memperbaiki fungsi imagesearch agar menerima parameter search
        $.ajax({
            method: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", api_key);
            },
            url: "https://api.pexels.com/v1/search?query=" + search + "&per_page=15&page=1",
            success: function(data){
                var results = data.photos;
            var html = '';
            for (var i = 0; i < results.length; i++) {
                var photo = results[i];
                    html += '<div class="">' +
                '<img class="h-full object-cover max-w-full rounded-lg shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl" src="' + photo.src.medium + '" alt="' + photo.photographer + '">' +
                    '</div>';
}
            $(".grid").html(html);
            },
            error: function(error){
                console.log(error);
            }
        });
    }
});
</script>

@endsection
