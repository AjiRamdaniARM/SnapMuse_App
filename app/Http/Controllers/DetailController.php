<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Komentarfoto;
use App\Models\Likefoto;
use App\Models\potoProfile;
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
        $data2 = potoProfile::where('id', $id)->first();
        $dataImage = Foto::where('fotoID', $fotoID)->first();
        $dataImagee = Foto::where('fotoID', $fotoID)->get();
        $rekomendasiGet = $dataImagee->pluck('categoryName')->toArray();
        $rekomendasi = Foto::whereIn('categoryName', $rekomendasiGet)->get()->shuffle();

        $komentar = Komentarfoto::where('fotoID', $fotoID)->orderBy('created_at', 'desc')->get();
        $userIds = $komentar->pluck('id')->toArray();
        $users = User::whereIn('id', $userIds)->get();
        $photos = potoProfile::whereIn('id', $userIds)->get();

        $likeGet = Likefoto::where('fotoID', $fotoID)->get();
        $userFoto = $likeGet->pluck('id')->toArray();
        $likeView = User::whereIn('id', $userFoto)->get();
        $photosLike = potoProfile::whereIn('id', $userFoto)->get();

        $like =  Likefoto::where('fotoID', $fotoID)->count();
        return view('detailImage',['user' => $request->user()],compact('dataImage', 'data', 'komentar', 'dataUser', 'users', 'like','likeView' , 'rekomendasi', 'photos', 'data2' , 'likeGet', 'photosLike'));
    }
    public function profileUser($id) {
        $data = User::where('id', $id)->first();
        $dataImage = Foto::where('id', $id)->get();
        $photoProfile = potoProfile::where('id', $id)->first();
        $like = Likefoto::where('id', $id)->get();
        $imageID = $dataImage->pluck('fotoID');
        $komentar = Komentarfoto::where('id', $id)->get()->count();
        // === jumlah === //
        $jmlhData = count($dataImage);
        $jumlahlike = Likefoto::whereIn('fotoID', $imageID)->count();
        $jumlahkomen = Komentarfoto::whereIn('fotoID', $imageID)->count();
        return view('profile.profileUser', compact('dataImage','photoProfile','data', 'jumlahkomen','jmlhData', 'jumlahlike'));
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
    public function like(Request $request)
    {

            // Mendapatkan user ID yang sedang login
    $user_id = Auth::id();

    // Mendapatkan fotoID dari permintaan
    $fotoID = $request->input('fotoID');

    // Mencari apakah user ini sudah melakukan like pada foto tersebut
    $like = Likefoto::where('fotoID', $fotoID)->where('id', $user_id)->first();

    // Jika user belum melakukan like, maka tambahkan like
    if (!$like) {
        Likefoto::create([
            'fotoID' => $fotoID,
            'id' => $user_id,
        ]);
    } else {
        // Jika user telah melakukan like, hapus like
        Likefoto::where('fotoID', $fotoID)->where('id', $user_id)->delete();
    }

    // Setelah menangani like, Anda bisa merespon dengan jumlah like yang baru
    $likeCount = Likefoto::where('fotoID', $fotoID)->count();

    // Kembalikan respons dalam bentuk JSON dengan jumlah "like" yang baru
    return response()->json(['likeCount' => $likeCount]);

    }

    // === Fitur Unduh Gambar  === //

    public function unduh( $lokasiFile)
    {
        $imagePath = public_path('image/' . $lokasiFile);
        return response()->download($imagePath);

    }



}
