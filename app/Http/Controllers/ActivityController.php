<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    //
    public static function store($activity)
    {
        $activity = new Activity();
        $activity->user_id = Auth::user()->id;
        $activity->activity = $activity;
        $activity->save();
    }
    public function notifications()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $notifications = $user->notifications;
        $user->unreadNotifications->markAsRead();
//        $notifications = auth()->user()->notifications;
        return response()->json(['notifications' => $notifications]);
    }
}
