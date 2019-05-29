<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

use Auth;
use Redirect;
use App\User;
use App\Eo;
use App\Paket;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User();

        $validator = $request->validate([
            'name'=>'required|min:4',
            'email'=>'required|email|unique:users',
            'no_telp' => 'required|min:11',
            'password' => 'required|min:8',
        ],
        [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 4 characters.',
            'email.required' => 'Email is required',
            'email.unique' => 'This email has been registered',
            'no_telp' => 'No Telp must be at least 11 characters.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);
        
        $user->is_eo=0;
        $user->is_renter=0;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->no_telp = $request['no_telp'];
        $user->password = bcrypt($request['password']);
        
        $user->save();
        
        if (!$validator){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }else{
            $user = Auth::guard('users')->user();
            return view('pages.index', compact('user'));
        }
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
        $usereo = new Eo();

        // $validator = $request->validate([
        //     'name'=>'required|min:4',
        //     'email'=>'required|email|unique:users',
        //     'no_telp' => 'required|min:11',
        //     'password' => 'required|min:8',
        // ],
        // [
        //     'name.required' => 'Name is required',
        //     'name.min' => 'Name must be at least 4 characters.',
        //     'email.required' => 'Email is required',
        //     'email.unique' => 'This email has been registered',
        //     'no_telp' => 'No Telp must be at least 11 characters.',
        //     'password.min' => 'Password must be at least 8 characters.',
        // ]);
        $user_id = Auth::guard('users')->user()->id;

        $usereo->user_id = $user_id;
        $usereo->nama_eo = $request['namaeo'];
        $usereo->email = $request['emaileo'];
        $usereo->alamat = $request['alamateo'];
        $usereo->kontak = $request['kontakeo'];
        $usereo->link = $request['linkeo'];
        $usereo->gambar_profil = $request['gambar_profil_eo'];

        $usereo->save();

        $update_eo = $this->update_eo($user_id);
        $rekomendasi_paket = Paket::inRandomOrder()->take(4)->get();
        return redirect ('/', compact('user', 'rekomendasi_paket'));
    }

    public function update_eo($id){
        $update_status = User::where('id', $id)->update(['is_eo' => 1]);
    }
}
