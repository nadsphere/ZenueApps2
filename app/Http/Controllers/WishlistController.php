<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
use App\Paket;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $user = Auth::guard('users')->user();

        $favorites = Favorite::with(['paket.eo', 'paket.ratings'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $favoritesPaginated = Favorite::with(['paket.eo', 'paket.ratings'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $pakets = $favoritesPaginated->pluck('paket');

        $userFavorites = $pakets->pluck('id');

        return view('pages.wishlist', compact('pakets', 'favorites', 'favoritesPaginated', 'userFavorites'));
    }

    public function toggle(Request $request, $paketId)
    {
        if (!Auth::guard('users')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::guard('users')->user();

        $existing = Favorite::where('user_id', $user->id)
            ->where('paket_id', $paketId)
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['added' => false]);
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'paket_id' => $paketId,
            ]);
            return response()->json(['added' => true]);
        }
    }

    public function remove(Request $request, $id)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $user = Auth::guard('users')->user();

        $favorite = Favorite::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
        }

        return redirect('/wishlist')->with('success', 'Paket berhasil dihapus dari wishlist.');
    }
}
