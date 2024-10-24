<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Status;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    //
    public function index()
    {
        $applications = Application::with('job','status')->orderBy('id')->get();
        return Inertia::render('Applications/Index',[
            'applications' => $applications,
        ]);
    }
    public function view($id)
    {
        $application = Application::with('job','status','attachments','referees','qualifications')->find($id);
        if ($application->review===0)
        {
            $application->review = 1;
            $application->status_id=Status::STATUS_REVIEW;
            $application->save();
        }
        return Inertia::render('Applications/View',[
            'application' => $application,
        ]);
    }
    public function reject($id)
    {
        $application = Application::find($id);
        $application->status_id = Status::STATUS_REJECTED;
        $application->push();
        return response()->json(['message'=>'Application Rejected']);
    }
}
