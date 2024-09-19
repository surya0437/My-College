<?php

namespace App\Http\Controllers\Library;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('Admin.Library.Author.index', compact('authors'));
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
                "name" => "required|string|max:255",
            ],);

            $author = new Author();
            $author->name = $request->name;

            $author->save();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record created successfully');
            return redirect()->route('author.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('author.index');
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
        $author = Author::find($id);
        return view('Admin.Library.Author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                "name" => "required|string",
            ],);

            $author = Author::find($id);
            $author->name = $request->name;
            $author->status = $request->status;

            $author->update();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('author.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('author.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);
        $author->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('author.index');
    }
}
