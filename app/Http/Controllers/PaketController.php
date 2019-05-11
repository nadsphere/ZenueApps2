<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
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
        }
        else{
            // return 0;
            $request->session()->flash('failed-input-catalog', 'Mohon Upload Foto Paket Anda.');
        }

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
        $paket = DB::table('pakets')->where('id',$id)->first();
        return view ('edits', compact('pakets'));
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
        //ngubah foto
        $post = Post::find($id);
        //edit upload
        if($request->hasfile('gambar_paket')){
            $file = $request->gambar_paket;
            $location = public_path('img/upload/');
            $image_name = time(). '.'.$file->getCientOriginalExtension();
            $location = public_path('img/upload/',$image_name);
            Image::make($file)->resize(200,200)->save($location);
            $post->image = $image_name;
            $update = $file->getClientOriginalName();

            $paket = [ 
                'gambar_paket'=> 'image',
                'nama_paket'=> $request->nama_paket,
                'kategori'=> $request->kategori,
                'available'=> $request->available,
                'deskripsi'=> $request->deskripsi,
                'harga_paket'=> $request->harga_paket
            ];
        } else{
            // foto tidak diubah
            $paket = [ 
                'nama_paket'=> $request->nama_paket,
                'kategori'=> $request->kategori,
                'available'=> $request->available,
                'deskripsi'=> $request->deskripsi,
                'harga_paket'=> $request->harga_paket
            ];
        }
        //paket
        
        $update = DB::table('pakets')->where('id', $id)
                                    ->update($paket);
        //validasi updet
        if($update){
            return redirect('paket');
        } else{
            echo 404;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pakets')->where('id', $id)
                            ->delete();
        return redirect('/paket');

    }
}
