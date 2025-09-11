<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeChild;
use App\Models\EmployeeEducation;
use App\Models\EmployeeTraining;
use App\Models\EmployeeQualification;
use App\Models\EmployeeNominee;
use App\Models\Form;

class EmployeeFormController extends Controller
{
    public function show($code)
    {
        $form = Form::where('code', $code)->firstOrFail();
        $employee = Employee::where('form_id', $form->id)->first();
        if ($employee) {
            // For edit
            //dd($employee);
            return view('employee_form', [
                'mode' => 'edit',
                'form' => $form,
                'employee' => $employee, // existing data
            ]);
        }
        else {
            // For create
            return view('employee_form', [
                'mode' => 'create',
                'form' => $form
            ]);
        }
        //return view('employee_form', compact('form'));
     
    }

    public function store(Request $request, $code)
    {
        $form = Form::where('code', $code)->firstOrFail();

        if (!$request->has('is_draft')) {
            $validated = $request->validate([
                'name' => 'required',
                'cell_no' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'nationality' => 'required',
                'nid' => 'required',
                'emergency_name' => 'required',
                'emergency_relation' => 'required',
                'emergency_mobile' => 'required',
                'passport_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        } else {
            $validated = $request->all();
        }

        // Handle file uploads
        $passportPhotoPath = $request->file('passport_photo') ? $request->file('passport_photo')->store('passport_photos', 'public') : null;
        $signaturePath = $request->file('signature') ? $request->file('signature')->store('signatures', 'public') : null;

        // Store main employee data
        $employee = Employee::create(array_merge($validated, [
            'passport_photo' => $passportPhotoPath,
            'signature' => $signaturePath,
            // Add all other fields
            'division' => $request->division,
            'scb_account' => $request->scb_account,
            'etin' => $request->etin,
            'marriage_date' => $request->marriage_date,
            'place_birth' => $request->place_birth,
            'passport_no' => $request->passport_no,
            'passport_place_issue' => $request->passport_place_issue,
            'passport_expiry' => $request->passport_expiry,
            'blood_group' => $request->blood_group,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'nid_place_issue' => $request->nid_place_issue,
            'driving_license' => $request->driving_license,
            'present_house_no' => $request->present_house_no,
            'present_road_no' => $request->present_road_no,
            'present_apt_no' => $request->present_apt_no,
            'present_building' => $request->present_building,
            'present_area' => $request->present_area,
            'present_district' => $request->present_district,
            'permanent_address' => $request->permanent_address,
            'home_district' => $request->home_district,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'spouse_name' => $request->spouse_name,
            'emergency_address' => $request->emergency_address,
            'emergency_telephone' => $request->emergency_telephone,
            'ref_name' => $request->ref_name,
            'ref_designation' => $request->ref_designation,
            'ref_org' => $request->ref_org,
        ]));

        // Store children
        if ($request->children_name) {
            foreach ($request->children_name as $i => $childName) {
                if ($childName) {
                    EmployeeChild::create([
                        'employee_id' => $employee->id,
                        'name' => $childName,
                        'dob' => $request->children_dob[$i] ?? null,
                    ]);
                }
            }
        }
        // Store education
        if ($request->edu_institute) {
            foreach ($request->edu_institute as $i => $institute) {
                if ($institute) {
                    EmployeeEducation::create([
                        'employee_id' => $employee->id,
                        'institute' => $institute,
                        'degree' => $request->degree[$i] ?? null,
                        'group' => $request->group[$i] ?? null,
                        'grade' => $request->grade[$i] ?? null,
                        'start' => $request->edu_start[$i] ?? null,
                        'end' => $request->edu_end[$i] ?? null,
                    ]);
                }
            }
        }
        // Store training
        if ($request->training_institute) {
            foreach ($request->training_institute as $i => $institute) {
                if ($institute) {
                    EmployeeTraining::create([
                        'employee_id' => $employee->id,
                        'institute' => $institute,
                        'subject' => $request->training_subject[$i] ?? null,
                        'duration' => $request->training_duration[$i] ?? null,
                    ]);
                }
            }
        }
        // Store qualification
        if ($request->professional_qualification) {
            foreach ($request->professional_qualification as $i => $qualification) {
                if ($qualification) {
                    EmployeeQualification::create([
                        'employee_id' => $employee->id,
                        'qualification' => $qualification,
                        'technical_training' => $request->technical_training[$i] ?? null,
                        'membership' => $request->membership[$i] ?? null,
                    ]);
                }
            }
        }
        // Store nominees
        if ($request->nominee_name) {
            foreach ($request->nominee_name as $i => $nomineeName) {
                if ($nomineeName) {
                    EmployeeNominee::create([
                        'employee_id' => $employee->id,
                        'name' => $nomineeName,
                        'relation' => $request->nominee_relation[$i] ?? null,
                        'address' => $request->nominee_address[$i] ?? null,
                        'telephone' => $request->nominee_tel[$i] ?? null,
                        'mobile' => $request->nominee_mobile[$i] ?? null,
                        'percentage' => $request->nominee_percentage[$i] ?? null,
                    ]);
                }
            }
        }

        // After successful submission, update form status
        if (!$request->has('is_draft')) {
            $form->status = 3; // submitted
        } else {
            $form->status = 2; // draft
        }
        $form->save();
        if (!$request->has('is_draft')) {
            return redirect()->route('employee.form', ['code' => $code])->with('success', 'Form submitted successfully!');
        }
        else {
            return response()->json([
                'success' => true,
                'message' => 'Draft saved successfully!',
                'form_code' => $code,
                'form_status' => $form->status,
            ]);
        }
    }

    public function saveDraft(Request $request, $code)
    {
        // Disable validation temporarily
        $request->merge(['is_draft' => true]);

        return $this->store($request, $code);
    }
}
