<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::all();
        return view('Admin.Holiday.index', compact('holidays'));
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
        try{
            $request->validate([
                'date' => 'required|date',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
            ]);

            $holiday = new Holiday();
            $holiday->date = $request->date;
            $holiday->title = $request->title;
            $holiday->description = $request->description;
            $holiday->save();

            toast('Record added successfully', 'success');
            return redirect()->route('holiday.index');
        }catch (\Illuminate\Validation\ValidationException $e) {
            toast($e->getMessage(), 'error');
            return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $holiday = Holiday::find($id);
        $holiday->delete();
        toast('Record deleted successfully', 'success');
        return redirect()->route('holiday.index');
    }
}
