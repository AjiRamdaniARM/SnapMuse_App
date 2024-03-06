<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;



Route::get('/about', function() {
return view('about');

});
Route::get('/api', function() {
return view('apipexels');
});
Route::get('/',[HomeController::class, 'home'])->name('home');
Route::get ('/search',[HomeController::class, 'search'])->name('search');
Route::get ('/category',[HomeController::class, 'category'])->name('category');


// === Dashboard == //
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// === Detail Image == //
Route::get('/detailImage/{fotoID}/{id}',[DetailController::class, 'index'])->name('detail');
Route::get('/profileUser/{id}',[DetailController::class, 'profileUser'])->name('det');
Route::get('detailImage/{lokasiFile}', [DetailController::class, 'unduh'])->name('detailImage.unduh');


// === akses admin === //
Route::get('/admin',[AdminController::class, 'admin'])->name('admin');

// === AUTH LOGIN & REGISTER ===
Route::middleware('auth')->group(function () {
    // === Route like & Komentar == //
    Route::post('/detailImage/{fotoID}/{id}',[DetailController::class, 'komentar']);
    Route::post('/like', [DetailController::class, 'like'])->name('like');
    // === Route image & upload == //
    Route::get('/dataImage',[ImageController::class, 'index'])->name('image');
    Route::get('/upload', [UploadController::class, 'index'])->name('upload');
    Route::post('/upload', [UploadController::class, 'store']);
    Route::post('/akun', [UploadController::class, 'potoProfile'])->name('profilePoto');
    Route::delete('/akun/{profileId}', [UploadController::class, 'deletePotoProfile'])->name('deletePotoProfile.delete');
    Route::delete('dataImage/{fotoID}', [ImageController::class, 'delete'])->name('dataImage.delete');
    Route::get('detailImageEdit/{fotoID}/{id}', [ImageController::class, 'edit'])->name('edit');
    Route::post('dataImage/{fotoID}', [ImageController::class, 'update'])->name('dataImage.update');
    // === Route profile == //
    Route::post('/editUser', [ProfileController::class, 'editUser'])->name('user.editUser');

    Route::get('/akun', [ProfileController::class, 'akun'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// === Route Dari file auth == //
require __DIR__.'/auth.php';
