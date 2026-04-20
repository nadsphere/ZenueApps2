<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\User;
use App\Eo;
use App\Paket;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'no_telp' => 'required|min:10|max:15',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'name.min' => 'Nama minimal 4 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'no_telp.required' => 'Nomor telepon harus diisi',
            'no_telp.min' => 'Nomor telepon minimal 10 digit',
            'no_telp.max' => 'Nomor telepon maksimal 15 digit',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => bcrypt($request->password),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login dengan akun baru Anda.');
    }

    public function index()
    {
        $user = Auth::guard('users')->user();        
        $rekomendasi_paket = Paket::inRandomOrder()->take(4)->get();
        return view('pages.index', compact('user', 'rekomendasi_paket'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
        ]);

        $auth = Auth::guard('users')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], true);

        if ($auth){
            return redirect('/');
        }else{
            return redirect('/login')
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Email atau password yang Anda masukkan salah']);
        }
    }

    public function logout(){
        Auth::guard('users')->logout();
        return redirect('/');
    }

    public function showRegisterEo(){
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }
        return view('pages.register_eo');
    }

    public function store_eo(Request $request){
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $request->validate([
            'nama_eo' => 'required|min:3',
            'email' => 'required|email',
            'alamat' => 'required|min:5',
            'kontak' => 'required|min:10',
        ]);

        $user_id = Auth::guard('users')->user()->id;

        // Check if user is already an EO
        $existingEo = Eo::where('user_id', $user_id)->first();
        if ($existingEo) {
            return redirect('/')->with('error', 'Anda sudah terdaftar sebagai Event Organizer');
        }

        Eo::create([
            'user_id' => $user_id,
            'nama_eo' => $request->nama_eo,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'link' => $request->link ?? null,
            'gambar_profil' => null,
        ]);

        User::where('id', $user_id)->update(['is_eo' => 1]);

        return redirect('/paket')->with('success', 'Selamat! Anda sekarang adalah Event Organizer');
    }

    public function showEoProfile(){
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::guard('users')->user();
        $eo = Eo::where('user_id', $user->id)->first();

        if (!$eo) {
            return redirect('/')->with('error', 'Anda bukan Event Organizer');
        }

        return view('pages.eo_profile', compact('user', 'eo'));
    }

    public function updateEoProfile(Request $request){
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $user = Auth::guard('users')->user();
        $eo = Eo::where('user_id', $user->id)->first();

        if (!$eo) {
            return redirect('/')->with('error', 'Anda bukan Event Organizer');
        }

        // Validation rules
        $rules = [
            'nama_eo' => 'required|min:3',
            'email' => 'required|email',
        ];

        // If password change is requested
        if ($request->current_password || $request->new_password) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|min:8|confirmed';
        }

        $request->validate($rules);

        // Check current password if changing password
        if ($request->new_password) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect('/eo_profile')->with('error', 'Password lama tidak cocok');
            }

            // Update password
            $user->password = Hash::make($request->new_password);
            $user->save();
        }

        // Update EO profile
        $eo->update([
            'nama_eo' => $request->nama_eo,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'link_website' => $request->link_website,
            'deskripsi' => $request->deskripsi,
        ]);

        $msg = $request->new_password ? 'Profil dan password berhasil diperbarui!' : 'Profil EO berhasil diperbarui!';
        return redirect('/eo_profile')->with('success', $msg);
    }

    public function updatePassword(Request $request){
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::guard('users')->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect('/eo_profile')->with('error', 'Password lama tidak cocok');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/eo_profile')->with('success', 'Password berhasil diubah!');
    }

    // User Profile Methods
    public function showUserProfile(){
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::guard('users')->user();

        return view('pages.user_profile', compact('user'));
    }

    public function updateUserPassword(Request $request){
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::guard('users')->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect('/user_profile')->with('password_error', 'Password lama tidak cocok');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/user_profile')->with('password_success', 'Password berhasil diubah!');
    }

    /**
     * Show edit user profile page
     */
    public function showEditProfile()
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::guard('users')->user();
        return view('pages.user_editprofile', compact('user'));
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::guard('users')->user();

        // Validation rules
        $rules = [
            'name' => 'required|min:4|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_telp' => 'nullable|min:10|max:15',
        ];

        $messages = [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 4 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
        ];

        // If password change is requested
        if ($request->current_password || $request->new_password) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|min:8|confirmed';
            $messages['current_password.required'] = 'Password lama harus diisi';
            $messages['new_password.required'] = 'Password baru harus diisi';
            $messages['new_password.min'] = 'Password baru minimal 8 karakter';
            $messages['new_password.confirmed'] = 'Konfirmasi password tidak cocok';
        }

        $request->validate($rules, $messages);

        // Check current password if changing password
        if ($request->new_password) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect('/edit_user')
                    ->withInput($request->except(['current_password', 'new_password', 'new_password_confirmation']))
                    ->with('error', 'Password lama tidak cocok');
            }

            // Update password
            $user->password = Hash::make($request->new_password);
        }

        // Update profile
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->save();

        $msg = $request->new_password ? 'Profil dan password berhasil diperbarui!' : 'Profil berhasil diperbarui!';
        return redirect('/edit_user')->with('success', $msg);
    }
}
