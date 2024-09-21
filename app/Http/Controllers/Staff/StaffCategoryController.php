<?php


namespace App\Http\Controllers\Staff;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class StaffCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Staff.Library.Category.index', compact('categories'));
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
                "title" => "required|string|max:255|unique:categories,title",
            ],);

            $category = new Category();
            $category->title = $request->title;

            $category->save();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record created successfully');
            return redirect()->route('staff.category.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('staff.category.index');
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
        $category = Category::find($id);
        return view('Staff.Library.Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                "title" => "required|string|unique:categories,title," . $id,
            ],);

            $category = Category::find($id);
            $category->title = $request->title;
            $category->status = $request->status;

            $category->update();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('staff.category.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('staff.category.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('staff.category.index');
    }
}
