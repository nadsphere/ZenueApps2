<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Auth;
use App\User;
use App\Eo;
use Redirect;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User();

        $validator = $request->validate([
            'role' => 'required',
            'name'=>'required|min:4',
            'email'=>'required|email|unique:users',
            'no_telp' => 'required|min:11',
            'password' => 'required|min:8',
        ],
        [
            'role.required' => 'This field cannot be empty',
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 4 characters.',
            'email.required' => 'Email is required',
            'email.unique' => 'This email has been registered',
            'no_telp' => 'No Telp must be at least 11 characters.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);

        
        if($request->role == 'eo'){
            
            $user->is_eo = 1;  
            $user->is_renter = 0;  
            
        } 
        elseif ($request->role == 'renter')   {
            
            $user->is_eo = 0;  
            $user->is_renter = 1; 
        }   
        
        
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
        return view('pages.index', compact('user'));
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
            return Redirect::back();
        }
    }

    public function logout(){
        Auth::guard('users')->logout();
        return redirect('/');
    }

    public function store_eo(Request $request){
        //return 1;
        $eo = new Eo();
        $user = new User();
        // $validate_eo = $request->validate([
        //     'nama_eo' => 'required|min:6',
        //     'email' => 'required|email|unique:users',
        //     'alamat' => 'required|min:10',
        //     'kontak' => 'required|min:11',
        //     'link' => '',
        //     'password' => 'required|min:8'
        // ],
        // [   
        //     'nama_eo.required' => 'Name is required',
        //     'nama_eo.min' => 'Name must be at least 6 characters.',
        //     'email.required' => 'Email is required',
        //     'email.unique' => 'This email has been registered',
        //     'alamat.required' => 'Alamat must be at least 10 characters',
        //     'kontak.required' => 'No Telp must be at least 11 characters.',
        //     'password.min' => 'Password must be at least 8 characters.'
        // ]);
        
        $eo->nama_eo = $request['namaeo'];
        $eo->email = $request['emaileo'];
        $eo->alamat = $request['alamateo'];
        $eo->kontak = $request['kontakeo'];
        $eo->link = $request['linkeo'];
        $eo->gambar_profil = $request['gambar_profil_eo'];
        $user->email = $request['emaileo'];
        $user->password = bcrypt($request['passwordeo']);
        
        $eo->save();
        $user->save();
        
        // if ($register){
        //     return 1;
        // }else{
        //     return 0;
        // }
    }
}