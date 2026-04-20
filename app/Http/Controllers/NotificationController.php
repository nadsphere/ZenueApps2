<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return redirect('/login');
        }

        $user = Auth::guard('users')->user();

        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $unreadCount = Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();

        $view = $user->is_eo == 1 ? 'pages.eo_notification' : 'pages.user_notification';

        return view($view, compact('notifications', 'unreadCount'));
    }

    public function markAsRead(Request $request, $id)
    {
        if (!Auth::guard('users')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::guard('users')->user();

        $notification = Notification::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if ($notification) {
            $notification->is_read = true;
            $notification->save();
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        if ($notification && $notification->link) {
            return redirect($notification->link);
        }

        return redirect()->back();
    }

    public function markAllAsRead(Request $request)
    {
        if (!Auth::guard('users')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::guard('users')->user();

        Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        if (!Auth::guard('users')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::guard('users')->user();

        $notification = Notification::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if ($notification) {
            $notification->delete();
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back();
    }

    public function unreadCount()
    {
        if (!Auth::guard('users')->check()) {
            return response()->json(['count' => 0]);
        }

        $user = Auth::guard('users')->user();
        $count = Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();

        return response()->json(['count' => $count]);
    }
}
