<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('jobs/Index');
    }
    public function create()
    {
        return Inertia::render('jobs/Create');
    }
}
