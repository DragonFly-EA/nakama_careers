<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Hashids\Hashids;

class JobsApiController extends Controller
{
    //
    public function index()
    {
        return Job::all();

    }
    public function view($id)
    {
        $hash = new Hashids('',10);
        $ids = $hash->decode($id)[0];
        return Job::findOrFail($ids);
    }
}
