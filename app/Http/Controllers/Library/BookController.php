<?php

namespace App\Http\Controllers\Library;

use App\Models\Book;
use App\Models\Rack;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books = Book::all();
        $categories = Category::all();
        $authors = Author::all();
        $racks = Rack::all();

        return view('Admin.Library.Book.index', compact('books', 'categories', 'authors', 'racks'));
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
                'name' => 'required|string|max:255',
                'category' => 'required|exists:categories,id',
                'author' => 'required|exists:authors,id',
                'rackNo' => 'required|exists:racks,id',
                'publication' => 'required|string|max:255',
                'published_year' => 'required',
                'quantity' => 'required|integer|min:1',
                'image' => 'required|image|max:255',
            ],);

            $book = new Book();
            $book->name = $request->name;
            $book->category_id = $request->category;
            $book->author_id = $request->author;
            $book->rack_id = $request->rackNo;
            $book->publication = $request->publication;
            $book->published_year = $request->published_year;
            $book->quantity = $request->quantity;
            $book->keywords = $request->keywords;


            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('BookCoverImage/', $fileName);
                $book->image = 'BookCoverImage/' . $fileName;
            }

            $book->save();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record created successfully');
            return redirect()->route('book.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('book.index');
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
        $book = Book::find($id);
        $categories = Category::all();
        $authors = Author::all();
        $racks = Rack::all();
        return view('Admin.Library.Book.edit', compact('book', 'categories', 'authors', 'racks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'category' => 'required|exists:categories,id',
                'author' => 'required|exists:authors,id',
                'rackNo' => 'required|exists:racks,id',
                'publication' => 'required|string|max:255',
                'published_year' => 'required',
                'quantity' => 'required|integer|min:1',
            ],);

            $book = Book::find($id);
            $book->name = $request->name;
            $book->category_id = $request->category;
            $book->author_id = $request->author;
            $book->rack_id = $request->rackNo;
            $book->publication = $request->publication;
            $book->published_year = $request->published_year;
            $book->quantity = $request->quantity;
            $book->keywords = $request->keywords;


            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                unlink(public_path($book->image));
                $file->move('BookCoverImage/', $fileName);
                $book->image = 'BookCoverImage/' . $fileName;
            }


            $book->update();
            // toast('Record created successfully', 'success');
            Alert::success('Success', 'Record updated successfully');
            return redirect()->route('book.edit', $id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            $error = collect($errors)->flatten()->first();

            Alert::error('Error!', $error);
            return redirect()->route('book.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        unlink(public_path($book->image));

        $book->delete();
        Alert::success('Success', 'Record deleted successfully');
        return redirect()->route('category.index');
    }
}
