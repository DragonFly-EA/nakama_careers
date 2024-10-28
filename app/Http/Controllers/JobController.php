<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jobs\CreateJobRequest;
use App\Models\Job;
//use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Hashids\Hashids;

class JobController extends Controller
{
    //
    public function index()
    {
        $jobs = Job::orderBy('id')->get();
        return Inertia::render('jobs/Index',[
            'jobs' => $jobs
        ]);
    }
    public function create()
    {
        return Inertia::render('jobs/Create');
    }
    public function view($id)
    {
        $job = Job::findOrFail($id);
        return Inertia::render('jobs/View',[
            'job' => $job
        ]);
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
            $job->salary_range = $request->salary_range;
            $job->expires_on = $request->expires_on;
            $job->slug = Str::slug($request->title);
            $job->save();
            //Hashed
            $hashids = new Hashids('',10);
            Job::find($job->id)->update([
                'hashedId'=>$hashids->encode($job->id),
            ]);
            DB::commit();
            return response()->json(['message'=>'Successfully added a job']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return Inertia::render('jobs/Edit',[
            'job'=>$job
        ]);
    }
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $job = Job::find($request->id);
            $job->title = $request->title;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->requirements = $request->requirements;
            $job->expires_on = $request->expires_on;
            $job->slug = Str::slug($request->title);
            $job->save();
            DB::commit();
            return response()->json(['message'=>'Successfully updated a job']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
