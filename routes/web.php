<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Models\category;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    // === dapatkan data dari model ==  //
    $user = User::all();
    $category = category::all();
    $dataImage = Foto::all();
     // === menghitung data dari model == //
    $column = count($dataImage);
    $columnUser = count($user);
    $columnCategory = count($category);
    return view('home',compact('dataImage','category', 'column', 'columnUser','columnCategory'));
});

// === Dashboard == //
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// === Detail Image == //
Route::get('/detailImage/{fotoID}/{id}',[DetailController::class, 'index'])->name('detail');


// === AUTH LOGIN & REGISTER ===
Route::middleware('auth')->group(function () {
    // === Route like & Komentar == //
    Route::post('/detailImage/{fotoID}/{id}',[DetailController::class, 'komentar']);
    Route::post('/like', [DetailController::class, 'like'])->name('like');
    // === Route image & upload == //
    Route::get('/dataImage', [ImageController::class, 'index'])->name('image');
    Route::get('/upload', [UploadController::class, 'index'])->name('upload');
    Route::post('/upload', [UploadController::class, 'store']);
    // === Route profile == //
    Route::get('/akun', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// === Route Dari file auth == //
require __DIR__.'/auth.php';
