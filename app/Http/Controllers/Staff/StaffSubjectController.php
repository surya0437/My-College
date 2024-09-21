<?php

namespace App\Http\Controllers\Staff;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class StaffSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('Staff.Subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:subjects,name',
            ]);

            $subject = new Subject();
            $subject->name = $request->name;
            $subject->save();

            Alert::success('Success', 'Record created successfully');
            return redirect()->route('staff.subject.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('staff.subject.index');
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
        $subject = Subject::find($id);
        return view('Staff.Subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:subjects,name,' . $id,
            ]);

            $subject = Subject::find($id);
            $subject->name = $request->name;
            $subject->status = $request->status;
            $subject->update();

            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('staff.subject.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('staff.subject.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('staff.subject.index');
    }
}
