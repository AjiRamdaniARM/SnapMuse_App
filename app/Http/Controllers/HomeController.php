<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $user = User::all();
        $category = category::all();
        $dataImage = Foto::all();
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
        $query = $request->input('search');
        $dataImage = Foto::where('judulFoto', 'like', '%' . $query . '%')->get();
        // Lakukan pencarian di model Anda dan simpan hasilnya dalam $results
        return view('home',['dataImage' => $dataImage],compact('dataImage','category', 'column', 'columnUser','columnCategory'));
    }

}
