<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\JobView;
use App\Models\Status;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function index()
    {
        $jobsCount = Job::count();
        $jobs = Job::orderBy('created_at', 'desc')->take(5)->get(['id','title','location']);
        $accepted = Application::where('status_id',Status::STATUS_ACCEPTED)->count();
        $applications = Application::count();
        $shortlisted = Application::where('status_id',Status::STATUS_SCHEDULED)->count();
        return Inertia::render('Dashboard',[
            'jobsCount' => $jobsCount,
            'accepted' => $accepted,
            'applications' => $applications,
            'shortlisted' => $shortlisted,
            'jobs'=>$jobs
        ]);
    }
    public function view($id)
    {
        $views = JobView::where('job_id',$id)->count();
        return response()->json(['views'=>$views]);
    }
}
