<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Employee;
use App\Models\EmployeeChild;
use App\Models\EmployeeEducation;
use App\Models\EmployeeTraining;
use App\Models\EmployeeQualification;
use App\Models\EmployeeNominee;

class AdminFormController extends Controller
{
    // Show all form links
    public function index()
    {
        $forms = Form::all();
        return view('admin.forms.index', compact('forms'));
    }

    // Show create form link page
    public function create()
    {
        return view('admin.forms.create');
    }

    // Store new form link
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:forms,email',
            'recruitment_id' => 'nullable|integer',
        ]);
        $code = bin2hex(random_bytes(8));
        $form = Form::create([
            'email' => $validated['email'],
            'code' => $code,
            'status' => 1,
            'recruitment_id' => $validated['recruitment_id'] ?? null,
        ]);
        return redirect()->route('admin.forms.index')->with('success', 'Form link created successfully!');
    }

    // Show form data in read-only mode
    public function view($id,$mode)
    {
        $form = Form::findOrFail($id);
        $employee = Employee::where('form_id', $form->id)->first();
        //return view('admin.forms.view', compact('form'));
        // return view('employee_form', [
        //     'readonly' => true, // or false
        //     'form' => $form
        // ]);

        // For edit
        //dd($employee);
        return view('employee_form', [
            'mode' => $mode,
            'form' => $form,
            'employee' => $employee, // existing data
        ]);

    }
}
