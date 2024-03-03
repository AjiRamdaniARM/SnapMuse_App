<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Foto;
use App\Models\Komentarfoto;
use App\Models\potoProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function index(Request $request) {
        $dataCategory = category::all();
        return view('profile.upload',['user' => $request->user(),], compact('dataCategory'));
    }

        public function store(Request $request) {

          $request->validate([
            'judulFoto' => ['required', 'max:50' , 'min:3'],
            'deskripsiFoto' => ['required', 'max:255' , 'min:3'],
            'categoryID' => ['required'],
            'id' => ['required'],
            'lokasiFile' => ['required', 'mimes:jpg,jpeg,png,svg,gif', 'max:2048'],
        ]);

        $foto_file = $request->file('lokasiFile');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') ."." . $foto_ekstensi;
        $foto_file->move(public_path('image'), $foto_nama);

        $data = [
            'judulFoto' => $request->judulFoto,
            'deskripsiFoto' => $request->deskripsiFoto,
            'categoryName' => $request->categoryID,
            'id' => $request->id,
            'lokasiFile' => $foto_nama,
        ];

         Foto::create($data);
          return redirect('/dataImage')->with('success', 'Image successfully uploaded 👌😍');
    }

    public function update(Request $request, $id) {
    $request->validate([
        'judulFoto' => ['required', 'min:3', 'max:50'],
        'deskripsiFoto' => ['required', 'max:255' , 'min:3'],
        'categoryID' => ['required'],
    ]);

    $foto = Foto::findOrFail($id); // Cari foto berdasarkan ID


    // Update data foto
    $foto->judulFoto = $request->judulFoto;
    $foto->deskripsiFoto = $request->deskripsiFoto;
    $foto->categoryName = $request->categoryID;
    // Tidak perlu memperbarui 'id' jika 'id' adalah kunci utama yang tidak berubah

    // Simpan perubahan
    $foto->save();
    return redirect('/dataImage')->with('success', 'Foto berhasil diperbarui');
    }

    public function potoProfile(Request $request) {
 // Validasi data
 $request->validate([
    'id' => 'required',
    'potoProfile' => 'required|mimes:jpeg,png,jpg,svg|max:2048', // Validasi gambar dengan maksimum 2MB
]);

if ($request->hasFile('potoProfile')) {
    // Simpan gambar ke direktori public
    $image = $request->file('potoProfile');
    $imageName = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('profilePoto'), $imageName); // Simpan gambar di folder public/profilePoto

    // Simpan data ke database
    $potoProfile = new potoProfile();
    $potoProfile->id = $request->id;
    $potoProfile->potoProfile = $imageName;
    $potoProfile->save();

    // Berhasil menyimpan, kembalikan respons JSON
    return response()->json(['success' => 'Image uploaded successfully']);
} else {
    // Gagal menyimpan karena tidak ada gambar diunggah
    return response()->json(['error' => 'No image uploaded'], 422);
}
    }

    public function deletePotoProfile($profileId){
        $data = potoProfile::where('profileId',$profileId)->first();
        File::delete(public_path('profilePoto').'/'.$data->	potoProfile);
        potoProfile::whereIn('profileId', $data)->delete();
        return back()->with('deleteProfile', 'Image successfully deleted 😁');
    }



}

