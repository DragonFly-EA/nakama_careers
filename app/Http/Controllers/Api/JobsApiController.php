<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationAttachment;
use App\Models\Job;
use App\Models\ProfessionQualification;
use App\Models\Referee;
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

    public function store(Request $request)
    {
        foreach ($request->application_id as $application){
            if ($request->hasFile('file')) {
                $file = $request->file('file')->store('application_attachment', 'public');
                $applicationAttachment = new ApplicationAttachment();
                $applicationAttachment->document = $file;
                $applicationAttachment->application_id=$application;
                $applicationAttachment->level = $request->level;
                $applicationAttachment->grade = $request->grade;
                $applicationAttachment->duration = $request->duration;
                $applicationAttachment->save();
            }
        }

        foreach ($request->application_id as $application){
            if ($request->hasFile('file')) {
                $file = $request->file('file')->store('profession_qualification', 'public');
                $professionQualification = new ProfessionQualification();
                $professionQualification->document = $file;
                $professionQualification->application_id=$application;
                $professionQualification->level = $request->level;
                $professionQualification->grade = $request->grade;
                $professionQualification->duration = $request->duration;
                $professionQualification->save();
            }
        }

        $referee=new Referee();
        $referee->application_id=
        $referee->full_name=$request->full_name;
        $referee->contact_referee1=$request->contact_referee1;
        $referee->contact_referee2=$request->contact_referee2;
        $referee->consent_referee1=$request->consent_referee1;
        $referee->consent_referee2=$request->consent_referee2;
        $referee->save();

        $application= new Application();
        $application->job_id=$request->role;
        $application->full_name=$request->full_name;
        $application->id_no=$request->id_no;
        $application->email=$request->email;
        $application->phone_number=$request->phone_number;
        $application->gender=$request->gender;
        $application->language=$request->language;
        $application->years_of_experience=$request->years_of_experience;
        $application->work_experience=$request->work_experience;
        $application->notify_hr=true;
        $application->notify_applicant=true;
        $application->save();

    }



}
