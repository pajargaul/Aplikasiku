<?php

namespace App\Http\Controllers;

use App\Models\Nelayan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin_login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function Dashboard(){
        $dataNelayan = Nelayan::all();
        return view('admin.index', compact('dataNelayan'));
    }
    public function Login(Request $request){
    $check= $request->all();
    if (Auth::guard('admin')->attempt(['email'=> $check['email'], 'password'=>  $check['password']])) {
        return redirect()->route('admin.dashboard')->with('erors', 'admin login succesfully');
    }else{
        return back()->with('erors', 'invalid email or password');
    }
    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('status', 'admin logout succesfully');
    }


    public function adminsetting()
    {
        return view('admin.setting');
    }

    public function updatename(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email', 
        ]);
    
        $loggedInUser = Auth::guard('admin')->user();
    
        if ($request->input('email') === $loggedInUser->email) {
    
            DB::table('admins')
                ->where('email', $loggedInUser->email)
                ->update([
                    'name' => $request->input('name'),
                ]);
    
            return redirect()->route('admin.setting')->with('status', 'Nama Berhasil Diperbaharui');
        } else {
            return redirect()->route('admin.setting')->with('status', 'Gagal');
        }
    }
    
    public function newpassword(Request $request){
        $request->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
    
        $user = Auth::guard('admin')->user();
    
        // Periksa apakah password saat ini cocok dengan password yang disimpan
        if (Hash::check($request->input('current_password'), $user->password)) {
            // Password saat ini benar, lanjutkan dengan memperbarui password
            $newPassword = Hash::make($request->input('new_password'));
    
            DB::table('admins')
                ->where('email', $user->email)
                ->update(['password' => $newPassword]);
    
            return redirect()->route('login_form')->with('st', 'Password Berhasil Diperbaharui');
        } else {
            // Password saat ini salah, kembalikan dengan pesan kesalahan
            return redirect()->route('admin.setting')->with('st', 'Password saat ini salah');
        }
    }

    public function admintambahdatanelayan(){
        return view('admin.tambahdatanelayan');
    }

    public function storetambahnelayan(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:nelayans,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        Nelayan::create([
            'nama' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->back()->with('st', 'Akun Nelayan berhasil didaftarkan!');
    }

    public function viewdatanelayan(){
        $dataNelayan = Nelayan::all();
        return view('admin.viewdatanelayan', compact('dataNelayan'));
    }
}
