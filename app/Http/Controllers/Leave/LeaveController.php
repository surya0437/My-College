<?php

namespace App\Http\Controllers\Leave;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::all();
        return view('Admin.Leave.index', compact('leaves'));
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
        // try {
        //     $request->validate([
        //         'leave_type' => 'required|string',
        //         'start_date' => 'required|date',
        //         'end_date' => 'required|date|after_or_equal:start_date',
        //         'reason' => 'required|string',
        //     ]);

        //     $leave = new Leave();

        //     $leave->employee_id = Auth::guard('staff')->user()->id;
        //     $leave->leave_type = $request->leave_type;
        //     $leave->start_date = $request->start_date;
        //     $leave->end_date = $request->end_date;
        //     $leave->reason = $request->reason;
        //     $leave->save();

        //     Alert::success('Success', 'Record created successfully');
        //     return redirect()->route('leave.index');
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     $errors = $e->errors();

        //     $error = collect($errors)->flatten()->first();

        //     Alert::error('Error!', $error);
        //     return redirect()->route('leave.index');
        // }
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
        $leave = Leave::find($id);
        return view('Admin.Leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'leave_type' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'reason' => 'required|string',
                'status' => 'required|in:Pending,Approved,Rejected',
            ]);

            $leave = Leave::find($id);

            $leave->leave_type = $request->leave_type;
            $leave->start_date = $request->start_date;
            $leave->end_date = $request->end_date;
            $leave->reason = $request->reason;
            $leave->status = $request->status;
            $leave->update();

            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('leave.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('leave.edit', $id);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('leave.index');
    }
}
