<?php

namespace App\Http\Controllers\Student;

use App\Models\Shift;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        $shifts = Shift::all();
        $students = Student::all();

        return view('Admin.Student.index', compact('programs', 'shifts', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        $shifts = Shift::all();
        return view('Admin.Student.create', compact('programs', 'shifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20|unique:students',
                'email' => 'required|string|email|max:255|unique:students',
                'address' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'date_of_birth' => 'required|date',
                'program_id' => 'required|exists:programs,id',
                'shift_id' => 'required|exists:shifts,id',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $student = new Student();
            $student->roll_no = rand(1000000, 9999999);
            $student->name = $request->name;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->password = Hash::make($request->password);
            $student->date_of_birth = $request->date_of_birth;
            $student->program_id = $request->program_id;
            $student->shift_id = $request->shift_id;

            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('studentImage/', $fileName);
                $student->image = 'studentImage/' . $fileName;
            }


            $student->save();

            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record created successfully');
            return redirect()->route('student.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('employee.create');
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
        $programs = Program::all();
        $shifts = Shift::all();
        $student = Student::find($id);
        return view('Admin.Student.edit', compact('programs', 'shifts', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20|unique:students,phone,' . $id,
                'email' => 'required|string|email|max:255|unique:students,email,' . $id,
                'address' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'program_id' => 'required|exists:programs,id',
                'shift_id' => 'required|exists:shifts,id',
            ]);

            $student = Student::find($id);
            $student->name = $request->name;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->date_of_birth = $request->date_of_birth;
            $student->program_id = $request->program_id;
            $student->shift_id = $request->shift_id;

            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('studentImage/', $fileName);
                unlink(public_path($student->image));
                $student->image = 'studentImage/' . $fileName;
            }


            $student->update();

            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('student.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('student.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        unlink(public_path($student->image));
        $student->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('student.index');
    }
}
