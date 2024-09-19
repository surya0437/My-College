<?php

namespace App\Http\Controllers\Shift;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
        return view('Admin.Shift.index', compact('shifts'));
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
                'title' => 'required|string|max:255|unique:shifts,title',
                'in_time' => 'required|date_format:H:i',
                'out_time' => 'required|date_format:H:i|after:in_time',
            ]);

            $shift = new Shift();
            $shift->title = $request->title;
            $shift->in_time = $request->in_time;
            $shift->out_time = $request->out_time;

            $shift->save();

            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record created successfully');
            return redirect()->route('shift.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('shift.index');
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
        $shift = Shift::find($id);
        return view('Admin.Shift.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255|unique:shifts,title,' . $id,
                'in_time' => 'required|',
                'out_time' => 'required|after:in_time',
            ]);

            $shift = Shift::find($id);
            $shift->title = $request->title;
            $shift->in_time = $request->in_time;
            $shift->out_time = $request->out_time;
            $shift->update();

            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('shift.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('shift.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shift = Shift::findOrFail($id);

        $shift->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('shi$shift.index');
    }
}
