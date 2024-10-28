<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Notification;
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
        $notifications = Notification::where('read_at','!=',null)->get();
//        $notifications = auth()->user()->notifications;
        return response()->json(['notifications' => $notifications]);
    }
}
