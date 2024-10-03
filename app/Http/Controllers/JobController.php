<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jobs\CreateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
    public function store(CreateJobRequest $request)
    {
        try {
            DB::beginTransaction();
            $job = new Job();
            $job->title = $request->title;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->requirements = $request->requirements;
            $job->expires_on = $request->expires_on;
            $job->slug = Str::slug($request->title);
            $job->save();
            DB::commit();
            return response()->json(['message'=>'Successfully added a job']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
