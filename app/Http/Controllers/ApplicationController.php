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
        $applications = Application::with('job')->orderBy('id')->get();
        return Inertia::render('Applications/Index',[
            'applications' => $applications,
        ]);
    }
}
