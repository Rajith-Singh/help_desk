<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    public function showNotifications()
    {
        $user = auth()->user();
        $notifications = $user->notifications()
                              ->orderBy('created_at', 'desc')
                              ->get();
    
        return view('notifications.index', ['notifications' => $notifications]);
    }

    
}
