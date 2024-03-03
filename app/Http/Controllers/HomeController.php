<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Foto;
use App\Models\potoProfile;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $user = User::all();
        $category = category::all();
        $dataImage = Foto::latest()->get()->shuffle();
         // === menghitung data dari model == //
        $column = count($dataImage);
        $columnUser = count($user);
        $columnCategory = count($category);
        return view ('home', compact('dataImage','category', 'column', 'columnUser','columnCategory'));
    }

    public function search(Request $request) {
        $user = User::all();
        $category = category::all();
        $dataImage = Foto::all();
         // === menghitung data dari model == //
        $column = count($dataImage);
        $columnUser = count($user);
        $columnCategory = count($category);
        // === mencari data image sesuai category dan judulFoto === //
        $query = $request->input('search');
        if ($query) {
            $dataImage = Foto::where('judulFoto', 'like', '%' . $query . '%')
                             ->orWhere('categoryName', 'like', '%' . $query . '%')
                             ->get();
        }
        // === return data === //
        return view('home',['dataImage' => $dataImage],compact('dataImage','category', 'column', 'columnUser','columnCategory'));
    }

    public function category(Request $request) {
        $user = User::all();
        $category = category::all();
        $dataImage = Foto::all();
        $profilePhotos = PotoProfile::all();
         // === menghitung data dari model == //
        $column = count($dataImage);
        $columnUser = count($user);
        $columnCategory = count($category);
        // $query = $request->input('search');
        // $dataImage = Foto::where('judulFoto', 'like', '%' . $query . '%')->get();
        $categoryName = $request->input('category');
        $dataImage = Foto::where('categoryName', $categoryName)->get();
        // Lakukan pencarian di model Anda dan simpan hasilnya dalam $results
        return view('home',['dataImage' => $dataImage],compact('dataImage','category', 'column', 'columnUser','columnCategory'));
    }

}
