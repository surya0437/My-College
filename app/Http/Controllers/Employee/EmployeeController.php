<?php

namespace App\Http\Controllers\Employee;

use App\Models\Shift;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
        // $employees = Employee::all();
        $employees =  Employee::where('role', '!=', 'Teacher')->get();
        return view('Admin.Employee.index', compact('shifts', 'employees'));
    }

    public function GetTeacher()
    {
        $shifts = Shift::all();
        $employees =  Employee::where('role', 'Teacher')->get();
        return view('Admin.Employee.teacher', compact('shifts', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shifts = Shift::all();
        return view('Admin.Employee.create', compact('shifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15|unique:employees',
                'email' => 'required|string|email|max:255|unique:employees',
                'address' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'education' => 'required|string|max:255',
                'specialization' => 'required|string|max:255',
                'password' => 'required|string|min:6',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'role' => 'required|string',
                'shift_id' => 'required|exists:shifts,id',
            ]);

            $employee = new Employee();
            $employee->roll_no = rand(1000000, 9999999);
            $employee->name = $request->name;
            $employee->phone = $request->phone;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->date_of_birth = $request->date_of_birth;
            $employee->education = $request->education;
            $employee->specialization = $request->specialization;
            $employee->password = Hash::make($request->password);
            $employee->role = $request->role;
            $employee->shift_id = $request->shift_id;


            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('employeeImage/', $fileName);
                $employee->image = 'employeeImage/' . $fileName;
            }
            $employee->save();

            if ($employee->role == 'Teacher') {
                Alert::success('Success', 'Record created successfully');
                return redirect()->route('teacher.get');
            } else {
                Alert::success('Success', 'Record created successfully');
                return redirect()->route('employee.index');
            }
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
        $shifts = Shift::all();
        $employee = Employee::find($id);
        return view('Admin.Employee.edit', compact('shifts', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15|unique:employees,phone,' . $id,
                'email' => 'required|string|email|max:255|unique:employees,email,' . $id,
                'address' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'education' => 'required|string|max:255',
                'specialization' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'role' => 'required|string',
                'shift_id' => 'required|exists:shifts,id',
            ]);

            $employee = Employee::find($id);
            $employee->name = $request->name;
            $employee->phone = $request->phone;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->date_of_birth = $request->date_of_birth;
            $employee->education = $request->education;
            $employee->specialization = $request->specialization;
            $employee->password = Hash::make($request->password);
            $employee->role = $request->role;
            $employee->shift_id = $request->shift_id;


            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('employeeImage/', $fileName);
                $employee->image = 'employeeImage/' . $fileName;
            }

            $employee->update();

            if ($employee->role == 'Teacher') {
                Alert::success('Success', 'Record updated successfully');
                return redirect()->route('employee.edit', $id);
            } else {
                Alert::success('Success', 'Record updated successfully');
                return redirect()->route('employee.edit', $id);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('employee.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        unlink(public_path($employee->image));
        $employee->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('employee.index');
    }
}
