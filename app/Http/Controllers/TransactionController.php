<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Paket;
use App\Transaction;

class TransactionController extends Controller
{
    public function index_paket($idpaket){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            $user_nama = $user->name;
            $paket = Paket::find($idpaket);
            return view('pages.form_ambilpaket', compact('user','user_nama','paket'));
        }else{
            return view('pages.index');
        }
    }
    public function store_transactions(Request $request){
        $transaction = new Transaction();
        $paket = Paket::where('nama_paket',$request->nama_paket)->first();
        $transaction->id_paket = $paket->id;

        $transaction->email = $request['email'];
        $transaction->no_telp = $request['no_telp'];
        $transaction->status_pembayaran = 0;
        $transaction->tanggal_acara = $request['tanggalacara'];
        $transaction->save();
        return view('pages.dashboard_layout');
    }
}
