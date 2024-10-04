<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    //
    public function index()
    {
     //   ActivityController::store("Viewed Application page");
        return Inertia::render('Applications/Index');
    }
}
