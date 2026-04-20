<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Eo;
use App\User;
use App\Transaction;
use App\Rating;
use App\Favorite;
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
        if(Auth::guard('users')->check())
        {
            $user = Auth::guard('users')->user();
            $eo = Eo::where('user_id', $user->id)->first();

            // If user is not an EO, redirect to home or show message
            if (!$eo) {
                return redirect('/')->with('error', 'Anda bukan Event Organizer');
            }

            $id_eo = $eo->id;

            // Get packages created by this EO
            $paket = Paket::where('id_eo', $id_eo)->get();

            // Get transactions for packages created by this EO
            $paketIds = $paket->pluck('id')->toArray();
            $transactions = Transaction::whereIn('id_paket', $paketIds)
                ->with(['user', 'paket'])
                ->orderBy('created_at', 'desc')
                ->get();

            return view('pages.paket', compact('transactions', 'paket', 'id_eo', 'user', 'eo'));
        }
        else{
            return redirect('/login');
        }
    }

    /**
     * Display EO Dashboard with statistics
     */
    public function dashboard(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $user = Auth::guard('users')->user();
        $eo = Eo::where('user_id', $user->id)->first();

        // If user is not an EO, redirect to home
        if (!$eo) {
            return redirect('/')->with('error', 'Anda bukan Event Organizer');
        }

        $id_eo = $eo->id;

        // Get packages created by this EO
        $paket = Paket::where('id_eo', $id_eo)->get();
        $paketIds = $paket->pluck('id')->toArray();

        // Get all transactions for this EO's packages
        $transactions = Transaction::whereIn('id_paket', $paketIds)
            ->with(['user', 'paket'])
            ->get();

        // Calculate statistics
        $stats = [
            'total_orders' => $transactions->count(),
            'total_paket' => $paket->count(),
            'pending' => $transactions->where('status_pembayaran', 0)->count(),
            'completed' => $transactions->where('status_pembayaran', 2)->count(),
            'revenue' => $transactions->where('status_pembayaran', 2)->sum(function($trans) {
                return $trans->paket->harga_paket ?? 0;
            }),
        ];

        // Pagination per page
        $perPage = $request->get('per_page', 20);

        // Get paginated orders
        $paginatedOrders = Transaction::whereIn('id_paket', $paketIds)
            ->with(['user', 'paket'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'orders_page');

        // Get paginated packages
        $paginatedPakets = Paket::where('id_eo', $id_eo)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'pakets_page');

        return view('pages.dashboard', compact(
            'stats',
            'paginatedOrders',
            'paginatedPakets',
            'user',
            'eo',
            'perPage'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $request->validate([
            'nama_paket' => 'required',
            'kategori' => 'required',
            'available' => 'required',
            'harga_paket' => 'required|numeric',
        ]);

        $user = Auth::guard('users')->user();
        $eo = Eo::where('user_id', $user->id)->first();

        if (!$eo) {
            return redirect('/manage_paket')->with('error', 'Anda belum terdaftar sebagai Event Organizer');
        }

        $data = [];
        if($request->hasfile('gambar_paket')){
            foreach($request->file('gambar_paket') as $gambar){
                $file = $gambar->getClientOriginalName();
                $gambar->move(public_path().'/img/upload/', $file);
                $data[] = $file;
            }
        }

        Paket::create([
            'id_eo' => $eo->id,
            'gambar_paket' => json_encode($data),
            'nama_paket' => $request->nama_paket,
            'kategori' => $request->kategori,
            'available' => $request->available,
            'deskripsi' => $request->deskripsi,
            'harga_paket' => $request->harga_paket
        ]);

        return redirect('/manage_paket')->with('success', 'Paket berhasil ditambahkan!');
    }
        


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('edits', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $id = $request->input('id');
        $post = Paket::find($id);

        if($request->hasfile('gambar_paket')){
            $file = $request->gambar_paket;
            $image_name = time(). '.'.$file->getClientOriginalExtension();
            $file->move(public_path('img/upload/'), $image_name);
            $post->gambar_paket = $image_name;
        }

        $post->nama_paket = $request->nama_paket;
        $post->kategori = $request->kategori;
        $post->available = $request->available;
        $post->deskripsi = $request->deskripsi;
        $post->harga_paket = $request->harga_paket;
        $post->save();

        return redirect('/manage_paket')->with('success', 'Paket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::find($id);
        if ($paket) {
            $paket->delete();
        }
        return redirect('/manage_paket')->with('success', 'Paket berhasil dihapus!');

    }

    public function search(Request $request){
        $search = $request['paket'];
        $search_paket = Paket::where('nama_paket', 'like', '%'.$search.'%')->get();
        $count_search_paket = $search_paket->count();
        return view('pages.search_paket', compact('search', 'search_paket', 'count_search_paket'));
    }

    public function index_detail($id){
        $paket = Paket::with(['eo', 'ratings.user'])->findOrFail($id);
        $eo = $paket->eo;

        // Get related packages (same category, exclude current)
        $relatedPakets = Paket::with(['eo', 'ratings'])
            ->where('kategori', $paket->kategori)
            ->where('id', '!=', $paket->id)
            ->where('available', 'tersedia')
            ->inRandomOrder()
            ->take(4)
            ->get();

        // Check if current user has favorited this paket
        $isFavorited = false;
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            $isFavorited = Favorite::where('user_id', $user->id)
                ->where('paket_id', $paket->id)
                ->exists();
        }

        return view('pages.paket_details', compact('paket', 'eo', 'relatedPakets', 'isFavorited'));
    }

    /**
     * Manage packages page
     */
    public function manage_paket(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $user = Auth::guard('users')->user();
        $eo = Eo::where('user_id', $user->id)->first();

        if (!$eo) {
            return redirect('/')->with('error', 'Anda bukan Event Organizer');
        }

        // Get per_page from request, default to 20
        $perPage = $request->get('per_page', 20);
        $validPerPage = in_array($perPage, [20, 40, 80, 100]) ? $perPage : 20;

        $pakets = Paket::where('id_eo', $eo->id)
            ->orderBy('created_at', 'desc')
            ->paginate($validPerPage);

        return view('pages.manage_paket', compact('pakets', 'user', 'eo'));
    }

    /**
     * Browse all packages (public page for regular users)
     */
    public function browse(Request $request)
    {
        $query = Paket::with(['eo', 'ratings'])
            ->where(function($q) {
                $q->where('available', 'tersedia')
                  ->orWhere('available', 'available');
            });

        // Category filter
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_paket', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%')
                  ->orWhereHas('eo', function($q) use ($search) {
                      $q->where('nama_eo', 'like', '%' . $search . '%');
                  });
            });
        }

        // Sort
        $sort = $request->get('sort', 'terbaru');
        switch ($sort) {
            case 'harga_asc':
                $query->orderBy('harga_paket', 'asc');
                break;
            case 'harga_desc':
                $query->orderBy('harga_paket', 'desc');
                break;
            case 'rating':
                $query->withAvg('ratings', 'rating')->orderBy('ratings_avg_rating', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $pakets = $query->paginate(12);

        // If AJAX request, return partial view only
        if ($request->ajax() || $request->wantsJson()) {
            $html = view('pages.includes.package_grid', ['pakets' => $pakets])->render();
            $pagination = $pakets->appends($request->except('page'))->links('pagination::bootstrap-4')->toHtml();
            return response()->json([
                'html' => $html,
                'pagination' => $pagination,
                'total' => $pakets->total(),
                'perPage' => $pakets->perPage(),
            ]);
        }

        // Get categories for filter
        $categories = Paket::select('kategori')
            ->distinct()
            ->whereNotNull('kategori')
            ->pluck('kategori');

        // Get current user rating if logged in
        $userRatings = [];
        $userFavorites = collect();
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            $userRatings = Rating::where('user_id', $user->id)
                ->whereIn('paket_id', $pakets->pluck('id'))
                ->pluck('rating', 'paket_id')
                ->toArray();
            $userFavorites = Favorite::where('user_id', $user->id)
                ->whereIn('paket_id', $pakets->pluck('id'))
                ->pluck('paket_id');
        }

        return view('pages.browse_paket', compact('pakets', 'categories', 'userRatings', 'userFavorites'));
    }

    /**
     * Store a rating for a package
     */
    public function storeRating(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|max:500',
        ]);

        $user = Auth::guard('users')->user();
        $paket = Paket::find($request->paket_id);

        // Create or update rating
        Rating::updateOrCreate(
            [
                'user_id' => $user->id,
                'paket_id' => $request->paket_id,
            ],
            [
                'rating' => $request->rating,
                'review' => $request->review,
                'eo_id' => $paket->id_eo,
            ]
        );

        return redirect()->back()->with('success', 'Rating berhasil disimpan!');
    }
}