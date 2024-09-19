<?php

namespace App\Http\Controllers\Program;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        return view('Admin.Program.index', compact('programs'));
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
                'title' => 'required|string|max:255|unique:programs,title',
            ]);

            $program = new Program();
            $program->title = $request->title;
            $program->save();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record created successfully');
            return redirect()->route('program.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('program.index');
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
        $program = Program::find($id);
        return view('Admin.Program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255|unique:programs,title,' . $id,
            ]);

            $program = Program::find($id);
            $program->title = $request->title;
            $program->status = $request->status;
            $program->update();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('program.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('program.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);

        $program->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('program.index');
    }
}
