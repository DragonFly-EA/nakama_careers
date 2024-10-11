<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class JobsApiController extends Controller
{
    //
    public function index()
    {
        return Job::all();

    }
    public function view($id)
    {
        $ids = Hashids::connection()->decode($id);
        return Job::findOrFail($ids);
    }
}
