<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationAttachment;
use App\Models\Job;
use App\Models\ProfessionQualification;
use App\Models\Referee;
use App\Models\Status;
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

            DB::commit();
            return response()->json(['message' => 'Successfully created application'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store1(Request $request)
    {
        try {
            DB::beginTransaction();
            // Create and save Application first to get its ID for later use
            $application = new Application();
            $application->job_id = $request->id;
            $application->status_id = 1;
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


            // Attach application_id to the referee
            foreach ($request->referee_name as $index => $full_name) {
                $referee = new Referee();
                $referee->application_id = $application->id;
                $referee->full_name = $full_name;
                $referee->contact = $request->referee_contact[$index];
                $referee->consent = $request->referee_consent[$index];
                $referee->save();
            }

            if ($request->hasFile('academic_file')) {
                // Ensure that the number of levels, grades, durations, and files match
                foreach ($request->academic_level as $index => $level) {
                    // Check if the corresponding file exists
                    if (isset($request->file('academic_file')[$index])) {
                        // Store each file with its corresponding level
                        $file = $request->file('academic_file')[$index]->store('application_attachment', 'public');
                        // Store ApplicationAttachment
                        $applicationAttachment = new ApplicationAttachment();
                        $applicationAttachment->document = $file;
                        $applicationAttachment->application_id = $application->id;
                        $applicationAttachment->level = $level;
                        $applicationAttachment->grade = $request->academic_grade[$index];  // Get corresponding grade
                        $applicationAttachment->duration = $request->academic_duration[$index];  // Get corresponding duration
                        $applicationAttachment->save();
                    }
                }
            }
            foreach ($request->qualification as $index => $qualification) {
                // Store ProfessionQualification
                $professionQualification = new ProfessionQualification();
                $professionQualification->application_id = $application->id;
                $professionQualification->grade = $request->qualification_grade[$index];  // Get the corresponding grade
                $professionQualification->name = $qualification;
                $professionQualification->duration = $request->qualification_duration[$index];  // Get the corresponding duration
                $professionQualification->save();
            }
            DB::commit();
            return response()->json(['message' => 'Successfully ']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(),500);
        }
    }
}
