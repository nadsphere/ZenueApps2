<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Auth;
use App\User;
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
}
