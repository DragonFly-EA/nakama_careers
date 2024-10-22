<?php

namespace App\Http\Controllers;

use App\Models\Application;
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
        $application = Application::with('job','status','attachments')->find($id);
        return Inertia::render('Applications/View',[
            'application' => $application,
        ]);
    }
}
