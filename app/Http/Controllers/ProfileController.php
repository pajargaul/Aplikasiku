<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tb_Barangsewa;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'string',
            'nomer_telepon' => 'string',
        ]);

        $up = DB::table('users')
        ->where('email', Auth::user()->email)
        ->update([
            'name' => $request->input('name'),
            'alamat' => $request->input('alamat'),
            'nomer_telepon' => $request->input('nomer_telepon'),
        ]);

        if ($up) {
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
         } else {
             // Jika variabel $barangSewa tidak berhasil dibuat
             return redirect()->back()->with('status', 'Gagal menyimpan. Silakan coba lagi.');
         }
    }

    public function uploadpotouser(Request $request){
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,JPG|max:2048',
        ]);

        if (Auth::user()->foto) {
            Storage::delete('public/fotouser/' . Auth::user()->foto);
        }

        $fotoFile = $request->file('foto');
        $namaFileUnik = Str::uuid() . '_' . time() . '_' . $fotoFile->getClientOriginalName();
        $fotoPath = $fotoFile->storeAs('public/fotouser', $namaFileUnik);

        $up = DB::table('users')
        ->where('email', Auth::user()->email)
        ->update([
            'foto' => $namaFileUnik,
        ]);

        if ($up) {
            $fotoPath;
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
         } else {
             return redirect()->back()->with('status', 'Gagal menyimpan. Silakan coba lagi.');
         }
    }

    public function deletepotouser(Request $request)
    {
        $userId = $request->user()->id;
        $user = User::findOrFail($userId);
        if ($user->foto) {
            Storage::delete('public/fotouser/' . $user->foto);
        }
        $user->foto = null;
        $user->save();
        return redirect()->route('profile.edit')->with('status', 'Foto profil dihapus.');
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

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function userabout(){
        return view('profile.about');
    }

    public function usernews(){
        $baseUrl = 'https://newsapi.org/v2/top-headlines?country=id&apiKey=1371b0a67af24ce096f57c0418708c31';
        $Url = 'https://newsapi.org/v2/everything?domains=detik.com&apiKey=1371b0a67af24ce096f57c0418708c31';
    
        // Ambil respons dari kedua URL
        $response1 = Http::get($baseUrl);
        $response2 = Http::get($Url);
    
        // Periksa jika keduanya berhasil
        if ($response1->successful() && $response2->successful()) {
            // Ambil data dari JSON respons
            $data1 = $response1->json();
            $data2 = $response2->json();
    
            // Gabungkan data dari kedua respons
            $articles['articles'] = array_merge($data2['articles'], $data1['articles']);
        } else {
            // Jika salah satu atau kedua panggilan gagal, atur $articles menjadi null atau array kosong sesuai kebutuhan
            $articles['articles'] = [];
        }
    
        // Kirim data ke view
        return view('profile.berita', compact('articles'));
    }

    public function userproduk(){
        $barangSewa = Tb_Barangsewa::all();
        return view('profile.produk', compact('barangSewa'));
    }

    public function comingsonn(){
        return view('profile.comingsonn');
    }
}
