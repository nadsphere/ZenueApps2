<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Paket;
use App\User;
use App\Transaction;
use Auth;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $user = Auth::guard('users')->user();
        $id_eo = Auth::guard('users')->user()->id;
        $paket = Paket::where('id_eo', '=', $id_eo)->get();
    
        return view('pages.paket', compact('paket', 'i', 'id_eo', 'user'));
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
        $validator = $this->validate($request, [
            'gambar_paket' => 'required',
            'gambar_paket.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_paket' => 'required|min:5',
            'kategori' => 'required',
            'available'=> 'required'
        ]);
        

        if($request->hasfile('gambar_paket')){
            foreach($request->file('gambar_paket') as $gambar){
                $file = $gambar->getClientOriginalName();
                $gambar->move(public_path().'/img/upload/', $file);  
                $data[] = $file;
            }

            $id_eo = Auth::guard('users')->user()->id;

            $data_paket = [ 
            'id_eo' => $id_eo,
            'gambar_paket'=> implode("|",$data),
            'nama_paket'=> $request->nama_paket,
            'kategori'=> $request->kategori,
            'available'=> $request->available,
            'deskripsi'=> $request->deskripsi,
            'harga_paket'=> $request->harga_paket
        ];

            $paket = new Paket($data_paket);
            $paket->gambar_paket=json_encode($data);
            $paket->save();

            if (!$validator){
                return Redirect::back()->withErrors($validator)->withInput($request->all());
            }else{
                return redirect('/paket');
            }
        };
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
        $post = Paket::find($id);
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

    public function search(Request $request){
        $user = Auth::guard('users')->user();
        $search = $request['paket'];
        $search_paket = Paket::where('nama_paket', 'like', '%'.$search.'%')->get();
        $count_search_paket = $search_paket->count();
        return view('pages.search_paket', compact('search', 'search_paket', 'count_search_paket', 'user'));
    }

    public function search_filter(Request $request){

    }

    public function index_detail($id){
        $user = Auth::guard('users')->user();
        $paket = Paket::where('id',$id)->get();
        $eo_id = $paket[0]->id_eo;
        $nama_eo = User::where('id', $eo_id)->get();

        if ($user == null) {
            return view('pages.paket_details', compact('user', 'paket', 'nama_eo'));
        }else{
            $id_eo = Auth::guard('users')->user()->id;
            return view('pages.paket_details', compact('user', 'id_eo', 'paket', 'nama_eo'));
        }
    }


}