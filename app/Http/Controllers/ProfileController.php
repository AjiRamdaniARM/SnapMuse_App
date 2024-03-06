<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Foto;
use App\Models\Komentarfoto;
use App\Models\Likefoto;
use App\Models\potoProfile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function dashboard(Request $request): View
    {
        return view('dashboard', [
            'user' => $request->user(),
        ]);
    }


    public function akun(Request $request): View
    {
        $user_id = Auth::id();
        $photoProfile = potoProfile::where('id', $user_id)->first();
        // === Dapatkan data dari database berdasarkan ID pengguna yang sedang login === //
        $data = User::where('id', $user_id)->get();
        $dataImage = Foto::where('id', $user_id)->get();
        $imageID = $dataImage->pluck('fotoID');
        $jmlhData = count($dataImage);
        $jumlahlike = Likefoto::whereIn('fotoID', $imageID)->count();
        $jumlahkomen = Komentarfoto::whereIn('fotoID', $imageID)->count();
        return view('profile.profile', [
            'user' => $request->user(),
        ], compact('dataImage', 'data','jmlhData', 'jumlahlike','jumlahkomen', 'photoProfile' ));
    }

    public function editUser(Request $request) {
        $request->validate([
            'namalengkap' => ['required'],
            'email' => ['required'],
            'alamat' => ['required'],

        ]);
        $user_id = Auth::id();
        $data = [
            'namalengkap' => $request->namalengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ];

        User::where('id',$user_id)->update($data);
        return redirect('/akun')->with('akunUp','Successfully edited the profile 👌👌');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $user_id = $user->id;

        Auth::logout();

        $user->delete();
        $data = Foto::where('id', $user_id)->first();


        if ($data) {
            $filePath = public_path('image') . '/' . $data->lokasiFile;

            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $data->delete();
        }

        $userProfile = potoProfile::where('id', $user_id)->first();
        if ($userProfile) {
            $filePath = public_path('profilePoto') . '/' . $userProfile->potoProfile;

            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $userProfile->delete();
        }
        // File::delete(public_path('image').'/'.$data->lokasiFile);
        Foto::whereIn('id', $user)->delete();
        potoProfile::whereIn('id', $user)->delete();
        Komentarfoto::whereIn('id', $user)->delete();
        Likefoto::whereIn('id', $user)->delete();


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('deleteaccout', 'your account has been deleted on our server!!');
    }
}
