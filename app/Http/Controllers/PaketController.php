<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = DB::table('pakets')->get();
        return view('pages.paket', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('gambar_paket')){
            $file = $request->gambar_paket;
            $image_name = $file->getClientOriginalName();
            $file->move('img/upload/',$image_name);
            // Image::make($file->getRealPath())->resize(100, 200)->save($image_name);
        }
        else{
            // return 0;
            $request->session()->flash('failed-input-catalog', 'Mohon Upload Foto Paket Anda.');
        }
        // $request->file('idea_image')->move('publicPages\images');
        // $filename = $request->file('idea_image')->getClientOriginalName();
        $paket = [ 
            'gambar_paket'=> $image_name,
            'nama_paket'=> $request->nama_paket,
            'kategori'=> $request->kategori,
            'available'=> $request->available,
            'deskripsi'=> $request->deskripsi,
            'harga_paket'=> $request->harga_paket
        ];
        DB::table('pakets')->insert($paket);
        return redirect('/paket');
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
