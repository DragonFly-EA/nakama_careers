<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationAttachment;
use App\Models\ApplicationTrack;
use App\Models\Job;
use App\Models\JobView;
use App\Models\ProfessionQualification;
use App\Models\Referee;
use App\Models\Status;
use App\Models\User;
use App\Notifications\ApplicationNotification;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Illuminate\Support\Facades\DB;

class JobsApiController extends Controller
{
    //
    public function index()
    {
        return Job::all();

    }

    public function view($id)
    {
        $hash = new Hashids('', 10);
        $ids = $hash->decode($id)[0];
        return Job::findOrFail($ids);
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Create and save Application
            $application = new Application();
            $application->job_id = $request->id;
            $application->status_id = Status::STATUS_PENDING;
            $application->full_name = $request->fullname;
            $application->id_no = $request->id_number;
            $application->email = $request->email;
            $application->phone_number = $request->mobile_no;
            $application->gender = $request->gender;
            $application->language = $request->language;
            $application->years_of_experience = $request->experience_years;
            $application->work_experience = $request->experience_details;
            $application->notify_hr = true;
            $application->notify_applicant = true;
            $application->save();

            // Bulk insert referees
            $refereesData = [];
            foreach ($request->referee_name as $index => $full_name) {
                $refereesData[] = [
                    'application_id' => $application->id,
                    'full_name' => $full_name,
                    'contact' => $request->referee_contact[$index],
                    'consent' => $request->referee_consent[$index]
                ];
            }
            Referee::insert($refereesData);

            // Check and store academic files
            if ($request->hasFile('academic_file')) {
                $attachmentsData = [];
                foreach ($request->academic_level as $index => $level) {
                    if (isset($request->file('academic_file')[$index])) {
                        $filePath = $request->file('academic_file')[$index]->store('application_attachment', 'public');
                        $attachmentsData[] = [
                            'application_id' => $application->id,
                            'document' => $filePath,
                            'level' => $level,
                            'grade' => $request->academic_grade[$index],
                            'duration' => $request->academic_duration[$index]
                        ];
                    }
                }
                ApplicationAttachment::insert($attachmentsData);
            }

            // Bulk insert professional qualifications
            $qualificationsData = [];
            foreach ($request->qualification as $index => $qualification) {
                $qualificationsData[] = [
                    'application_id' => $application->id,
                    'name' => $qualification,
                    'grade' => $request->qualification_grade[$index],
                    'duration' => $request->qualification_duration[$index]
                ];
            }
            ProfessionQualification::insert($qualificationsData);
            //Application Track
            $track  = new ApplicationTrack();
            $track->application_id = $application->id;
            $track->status_id = Status::STATUS_PENDING;
            $track->user_id = User::first()->id;
            $track->notes = 'A new job application from '.$application->full_name.' has been send to the application for the position of '.$application->job->title;
            $track->save();
            //
            $this->storeNotification($application->id);
            DB::commit();
            return response()->json(['message' => 'Successfully created application','status'=>200], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function storeViews($id)
    {
        $hash = new Hashids('', 10);
        $ids = $hash->decode($id)[0];
        $view = new JobView();
        $view->job_id = $ids;
        $view->count = 1;
        $view->save();
        return response()->json(['data'=>$view,'status'=>200],200);
    }
    public function storeNotification($id)
    {
        $application = Application::find($id);
        $details = [
            'comment'=>$application->full_name.' has send an application',
        ];
        $application->notify(new ApplicationNotification($details));
        return $application;
    }
    public function search($search)
    {
        $jobs = Job::where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%') // Example for searching in the description too
            ->get();

        return $jobs;
    }
}
