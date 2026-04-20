<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Paket;
use App\Transaction;
use App\User;
use App\Eo;
use App\Notification;

class TransactionController extends Controller
{
    public function index_paket($idpaket){
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::guard('users')->user();
        $user_nama = $user->name;
        $paket = Paket::find($idpaket);

        if (!$paket) {
            return redirect('/')->with('error', 'Paket tidak ditemukan');
        }

        return view('pages.form_ambilpaket', compact('user','user_nama','paket'));
    }

    public function storeBooking(Request $request){
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'email' => 'required|email',
            'no_telp' => 'required|min:10',
            'tanggal_acara' => 'required|date|after_or_equal:today',
        ]);

        $paket = Paket::find($request->id_paket);
        if (!$paket) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan');
        }

        $user = Auth::guard('users')->user();

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'id_paket' => $paket->id,
            'kode_booking' => 'EO-' . mt_rand(100000, 999999),
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'status_pembayaran' => 0,
            'tanggal_acara' => $request->tanggal_acara,
        ]);

        // Notify the EO about the new booking
        $eo = Eo::find($paket->id_eo);
        if ($eo) {
            Notification::create([
                'user_id' => $eo->user_id,
                'type' => 'booking_created',
                'title' => 'Pesanan Baru!',
                'message' => 'Paket "' . $paket->nama_paket . '" telah dipesan oleh ' . $user->name . '. Kode booking: ' . $transaction->kode_booking,
                'link' => '/transact_detail/' . $transaction->id,
                'reference_id' => $transaction->id,
                'is_read' => false,
            ]);
        }

        return redirect('/booking')->with('success', 'Pemesanan berhasil! Kode booking: ' . $transaction->kode_booking);
    }

    public function store_transactions(Request $request){
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $request->validate([
            'email' => 'required|email',
            'no_telp' => 'required|min:10',
            'nama_paket' => 'required',
            'tanggalacara' => 'required|date|after:today',
        ]);

        $paket = Paket::where('nama_paket', $request->nama_paket)->first();

        if (!$paket) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan');
        }

        $user = Auth::guard('users')->user();

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'id_paket' => $paket->id,
            'kode_booking' => 'EO-' . mt_rand(100000, 999999),
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'status_pembayaran' => 0,
            'tanggal_acara' => $request->tanggalacara,
        ]);

        // Notify the EO about the new booking
        $eo = Eo::find($paket->id_eo);
        if ($eo) {
            Notification::create([
                'user_id' => $eo->user_id,
                'type' => 'booking_created',
                'title' => 'Pesanan Baru!',
                'message' => 'Paket "' . $paket->nama_paket . '" telah dipesan oleh ' . $user->name . '. Kode booking: ' . $transaction->kode_booking,
                'link' => '/transact_detail/' . $transaction->id,
                'reference_id' => $transaction->id,
                'is_read' => false,
            ]);
        }

        return redirect('/')->with('success', 'Pemesanan berhasil! Kode booking: ' . $transaction->kode_booking);
    }

    public function transact_detail($id)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $transaction = Transaction::with(['user', 'paket'])->findOrFail($id);

        // Check if user owns this transaction or is the EO who created the package
        $user = Auth::guard('users')->user();
        $eo = Eo::where('user_id', $user->id)->first();

        // Allow access if user is the transaction owner or if user is an EO who owns the package
        if ($transaction->user_id !== $user->id) {
            if (!$eo || $transaction->paket->id_eo !== $eo->id) {
                return redirect('/')->with('error', 'Anda tidak memiliki akses ke transaksi ini');
            }
        }

        return view('pages.transact_detail', compact('transaction'));
    }

    public function update_status(Request $request, $id)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $transaction = Transaction::with(['user', 'paket'])->findOrFail($id);
        $user = Auth::guard('users')->user();
        $eo = Eo::where('user_id', $user->id)->first();

        // Allow access if user is the transaction owner or if user is an EO who owns the package
        if ($transaction->user_id !== $user->id) {
            if (!$eo || $transaction->paket->id_eo !== $eo->id) {
                return redirect('/')->with('error', 'Anda tidak memiliki akses ke transaksi ini');
            }
        }

        $request->validate([
            'status' => 'required|in:0,1,2,3',
        ]);

        $transaction->status_pembayaran = $request->status;
        $transaction->save();

        // Create notification for the user
        $statusMessages = [
            1 => ['title' => 'Pembayaran Diterima', 'message' => 'Pembayaran untuk pesanan ' . $transaction->kode_booking . ' telah diterima.'],
            2 => ['title' => 'Pesanan Dikonfirmasi', 'message' => 'Pesanan ' . $transaction->kode_booking . ' telah dikonfirmasi oleh EO.'],
            3 => ['title' => 'Pesanan Dibatalkan', 'message' => 'Pesanan ' . $transaction->kode_booking . ' telah dibatalkan.'],
        ];

        if (isset($statusMessages[$request->status])) {
            $msg = $statusMessages[$request->status];
            Notification::create([
                'user_id' => $transaction->user_id,
                'type' => $request->status == 3 ? 'booking_cancelled' : ($request->status == 2 ? 'booking_confirmed' : 'payment_received'),
                'title' => $msg['title'],
                'message' => $msg['message'],
                'link' => '/transact_detail/' . $transaction->id,
                'reference_id' => $transaction->id,
                'is_read' => false,
            ]);
        }

        return redirect('/transact_detail/' . $id)->with('success', 'Status berhasil diperbarui');
    }

    /**
     * Display user's transactions (Pesanan Saya)
     */
    public function userTransactions()
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::guard('users')->user();

        // Get all transactions for this user with paket and eo info
        $transactions = Transaction::where('user_id', $user->id)
            ->with(['paket.eo'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.user_transact', compact('transactions', 'user'));
    }

    /**
     * Delete user's transaction
     */
    public function deleteUserTransaction($id)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::guard('users')->user();
        $transaction = Transaction::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!$transaction) {
            return redirect('/booking')->with('error', 'Transaksi tidak ditemukan');
        }

        // Only allow delete if status is pending (0)
        if ($transaction->status_pembayaran > 0) {
            return redirect('/booking')->with('error', 'Transaksi tidak dapat dihapus karena sudah diproses');
        }

        $transaction->delete();

        return redirect('/booking')->with('success', 'Transaksi berhasil dihapus');
    }
}
