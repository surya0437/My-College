<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use App\Models\Leave;
use App\Models\Author;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AdminDashboard()
    {
        $students = Student::count();
        $books = Book::count();
        $categories = Category::count();
        $authors = Author::count();
        $racks = Rack::count();
        return view('dashboard', compact('students', 'books', 'categories', 'authors', 'racks'));
    }

    public function StaffDashboard()
    {
        $students = Student::count();
        $subjects = Subject::count();
        $leaves = Leave::where('employee_id', '=', Auth::guard('staff')->user()->id)->count();
        return view('Staff.dashboard', compact('students', 'subjects', 'leaves'));
    }
}
