<?php

namespace App\Http\Controllers;

use App\Models\potoProfile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin () {
        $userAll = User::all();
        $image = $userAll->pluck('id');
        return view('admin.layout', compact('userAll'));
    }
}
