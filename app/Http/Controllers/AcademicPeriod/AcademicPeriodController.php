<?php

namespace App\Http\Controllers\AcademicPeriod;

use Illuminate\Http\Request;
use App\Models\AcademicPeriod;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AcademicPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicPeriods = AcademicPeriod::all();
        return view('Admin.AcademicPeriod.index', compact('academicPeriods'));
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
                'title' => 'required|string|max:255|unique:academic_periods,title',
            ]);

            $academicPeriod = new AcademicPeriod();
            $academicPeriod->title = $request->title;
            $academicPeriod->save();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record created successfully');
            return redirect()->route('academicPeriod.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('academicPeriod.index');
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
        $academicPeriod = AcademicPeriod::find($id);
        return view('Admin.AcademicPeriod.edit', compact('academicPeriod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255|unique:academic_periods,title,' . $id,
            ]);

            $academicPeriod = AcademicPeriod::find($id);
            $academicPeriod->title = $request->title;
            $academicPeriod->status = $request->status;
            $academicPeriod->update();

            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('academicPeriod.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('academicPeriod.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $academicPeriod = AcademicPeriod::find($id);
        $academicPeriod->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('academicPeriod.index');
    }
}
