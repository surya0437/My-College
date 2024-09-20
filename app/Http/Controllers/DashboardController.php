<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Rack;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::count();
        $books = Book::count();
        $categories = Category::count();
        $authors = Author::count();
        $racks = Rack::count();
        return view('dashboard', compact('users', 'books', 'categories', 'authors', 'racks'));
    }

    public function studentDashboard()
    {

        $users = User::count();
        $books = Book::count();
        $categories = Category::count();
        $authors = Author::count();
        $racks = Rack::count();
        return view('StudentDashboard.dashboard', compact('users', 'books', 'categories', 'authors', 'racks'));
    }

    public function staffDashboard()
    {

        // $users = User::count();
        // $books = Book::count();
        // $categories = Category::count();
        // $authors = Author::count();
        // $racks = Rack::count();
        // return view('StaffDashboard.dashboard', compact('users', 'books', 'categories', 'authors', 'racks'));
        return view('StaffDashboard.dashboard');
    }


}
