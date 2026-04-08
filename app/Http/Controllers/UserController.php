<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

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
            'no_telp' => 'required|min:11',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => bcrypt($request->password),
            'is_eo' => 0,
            'is_renter' => 0,
        ]);

        return redirect('/');
    }

    public function index()
    {
        $user = Auth::guard('users')->user();        
        $rekomendasi_paket = Paket::inRandomOrder()->take(4)->get();
        return view('pages.index', compact('user', 'rekomendasi_paket'));
    }

    public function login(Request $request)
    {
        $auth = Auth::guard('users')->attempt([
            'no_telp' => $request->input('no_telp'),
            'password' => $request->input('password')
        ], true);
        
        if ($auth){
            return redirect('/');
        }else{
            $url = URL::to('/');

            return Redirect::to($url)
            ->with('error','Username or Password is incorrect');
        }
    }

    public function logout(){
        Auth::guard('users')->logout();
        return redirect('/');
    }

    public function store_eo(Request $request){
        $user_id = Auth::guard('users')->user()->id;

        Eo::create([
            'user_id' => $user_id,
            'nama_eo' => $request['namaeo'],
            'email' => $request['emaileo'],
            'alamat' => $request['alamateo'],
            'kontak' => $request['kontakeo'],
            'link' => $request['linkeo'],
            'gambar_profil' => $request['gambar_profil_eo'],
        ]);

        User::where('id', $user_id)->update(['is_eo' => 1]);

        $user = Auth::guard('users')->user();
        $rekomendasi_paket = Paket::inRandomOrder()->take(4)->get();
        return redirect('/')->with(compact('user', 'rekomendasi_paket'));
    }
}
