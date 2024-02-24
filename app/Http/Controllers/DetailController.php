<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Komentarfoto;
use App\Models\Likefoto;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{

    // === view detail image dan kirim data === //
    public function index($fotoID, $id , Request $request): View
    {
        $user_id = Auth::id();
        $dataUser = User::where('id', $user_id)->get();
        $data = User::where('id', $id)->first();
        $dataImage = Foto::where('fotoID', $fotoID)->first();
        $komentar = Komentarfoto::where('fotoID', $fotoID)->get();
        $userIds = $komentar->pluck('id')->toArray();
        $users = User::whereIn('id', $userIds)->get();
        $like =  Likefoto::where('fotoID', $fotoID)->count();;
        return view('detailImage',['user' => $request->user()],compact('dataImage', 'data', 'komentar', 'dataUser', 'users', 'like'));
    }
    public function profileUser($id) {
        $data = User::where('id', $id)->first();
        $dataImage = Foto::where('id', $id)->get();
        $like = Likefoto::where('id', $id)->get();
        $imageID = $dataImage->pluck('fotoID');
        $komentar = Komentarfoto::where('id', $id)->get()->count();
        // === jumlah === //
        $jmlhData = count($dataImage);
        $jumlahlike = Likefoto::whereIn('fotoID', $imageID)->count();
        $jumlahkomen = Komentarfoto::whereIn('fotoID', $imageID)->count();
        return view('profile.profileUser', compact('dataImage','data', 'jumlahkomen','jmlhData', 'jumlahlike'));
    }

    // === validasi komentar foto === //
    public function komentar(Request $request){

        $request->validate([
            'fotoID' => ['required'],
            'id' => ['required'],
            'isiKomentar' => ['required'],
        ]);

        $data = [
            'fotoID' => $request->fotoID,
            'id' => $request->id,
            'isiKomentar' => $request->isiKomentar,
            'waktu' => date('d F Y, l.')
        ];

        Komentarfoto::create($data);
        return back()->with('success', 'Employee Addedd!');
    }

    // === validasi like dan unlike === //
    public function like(Request $request): RedirectResponse
    {

        $user_id = Auth::id();
        $fotoID = $request->input('fotoID');

        $like = Likefoto::where('fotoID', $fotoID)->where('id', $user_id)->first();

        if (!$like) {

            Likefoto::create([
                'fotoID' => $fotoID,
                'id' => $user_id,
            ]);

        }else{
            $fotoID = $request->input('fotoID');
            $user_id = Auth::id();
            Likefoto::where('fotoID', $fotoID)->where('id', $user_id)->delete();
        };

        return back();
    }

    // === Fitur Unduh Gambar  === //

    public function unduh( $lokasiFile)
    {
        $imagePath = public_path('image/' . $lokasiFile);
        return response()->download($imagePath);

    }



}
