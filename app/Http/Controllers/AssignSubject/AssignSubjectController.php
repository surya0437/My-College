<?php

namespace App\Http\Controllers\AssignSubject;

use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Http\Controllers\Controller;
use App\Models\AcademicPeriod;
use App\Models\Program;
use RealRashid\SweetAlert\Facades\Alert;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignSubjects = AssignSubject::all();
        $teachers = Employee::where('role', 'Teacher')->get();
        $subjects = Subject::all();
        $programs = Program::all();
        $academicPeriods = AcademicPeriod::all();
        return view('Admin.AssignSubject.index', compact('assignSubjects', 'teachers', 'subjects', 'programs', 'academicPeriods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'subject_id' => 'required|exists:subjects,id',
                'program_id' => 'required|exists:programs,id',
                'academic_period_id' => 'required|exists:academic_periods,id',
                'from' => 'required|date_format:H:i',
                'to' => 'required|date_format:H:i|after:from',
            ],);

            $startTime = Carbon::parse($request->from);
            $endTime = Carbon::parse($request->to);

            // Check for time conflicts
            $conflict = AssignSubject::where('employee_id', $request->employee_id)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('from', [$startTime, $endTime])
                        ->orWhereBetween('to', [$startTime, $endTime])
                        ->orWhere(function ($query) use ($startTime, $endTime) {
                            $query->where('from', '<=', $startTime)
                                ->where('to', '>=', $endTime);
                        });
                })->exists();

            if ($conflict) {
                Alert::error('Error!', 'Teacher is already assigned during this time period.');
                return redirect()->route('assignSubject.index');
            }

            $assignSubject = new AssignSubject();
            $assignSubject->employee_id = $request->employee_id;
            $assignSubject->subject_id = $request->subject_id;
            $assignSubject->program_id = $request->program_id;
            $assignSubject->academic_period_id = $request->academic_period_id;
            $assignSubject->from = $request->from;
            $assignSubject->to = $request->to;
            $assignSubject->save();
            Alert::success('Success', 'Record created successfully');
            return redirect()->route('assignSubject.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('assignSubject.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assignSubject = AssignSubject::find($id);
        $teachers = Employee::where('role', 'Teacher')->get();
        $subjects = Subject::all();
        $programs = Program::all();
        $academicPeriods = AcademicPeriod::all();
        return view('Admin.AssignSubject.edit', compact('assignSubject', 'teachers', 'subjects', 'programs', 'academicPeriods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'subject_id' => 'required|exists:subjects,id',
                'program_id' => 'required|exists:programs,id',
                'academic_period_id' => 'required|exists:academic_periods,id',
                'from' => 'required',
                'to' => 'required|after:from',
            ],);

            $assignSubject = AssignSubject::find($id);
            $assignSubject->employee_id = $request->employee_id;
            $assignSubject->subject_id = $request->subject_id;
            $assignSubject->program_id = $request->program_id;
            $assignSubject->academic_period_id = $request->academic_period_id;
            $assignSubject->from = $request->from;
            $assignSubject->to = $request->to;
            $assignSubject->update();
            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('assignSubject.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('assignSubject.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assignSubject = AssignSubject::find($id);
        $assignSubject->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('assignSubject.index');
    }
}
