<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Leave\LeaveController;
use App\Http\Controllers\Shift\ShiftController;
use App\Http\Controllers\Library\BookController;
use App\Http\Controllers\Library\RackController;
use App\Http\Controllers\User\UserBookController;
use App\Http\Controllers\Library\AuthorController;
use App\Http\Controllers\Holiday\HolidayController;
use App\Http\Controllers\Program\ProgramController;
use App\Http\Controllers\Staff\StaffBookController;
use App\Http\Controllers\Staff\StaffRackController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Library\CategoryController;
use App\Http\Controllers\Staff\StaffLeaveController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Staff\StaffAuthorController;
use App\Http\Controllers\Staff\StaffStudentController;
use App\Http\Controllers\Staff\StaffSubjectController;
use App\Http\Controllers\Staff\StaffCategoryController;
use App\Http\Controllers\AssignSubject\AssignSubjectController;
use App\Http\Controllers\AcademicPeriod\AcademicPeriodController;

Route::get('/', function () {
    // return view('index');
    return redirect()->route('staff.login');
})->middleware('guest:staff');



Route::middleware(['auth:web', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'AdminDashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('library/category', CategoryController::class)->names('category');
    Route::resource('library/author', AuthorController::class)->names('author');
    Route::resource('library/rack', RackController::class)->names('rack');
    Route::resource('library/book', BookController::class)->names('book');
    Route::resource('admin/program', ProgramController::class)->names('program');
    Route::resource('admin/shift', ShiftController::class)->names('shift');
    Route::resource('admin/student', StudentController::class)->names('student');
    Route::resource('admin/employee', EmployeeController::class)->names('employee');
    Route::get('admin/teacher', [EmployeeController::class, 'GetTeacher'])->name('teacher.get');
    Route::resource('admin/academicPeriod', AcademicPeriodController::class)->names('academicPeriod');
    Route::resource('admin/subject', SubjectController::class)->names('subject');
    Route::resource('admin/assignSubject', AssignSubjectController::class)->names('assignSubject');
    Route::resource('admin/leave', LeaveController::class)->names('leave');
    Route::resource('admin/holiday', HolidayController::class)->names('holiday');

    Route::get('/admin/addFace', [StudentController::class, 'AddFace'])->name('student.addFace');

    Route::get('/admin/attendance/{id}', [StudentController::class, 'attendace'])->name('student.attendance');
});


Route::get('/user/book', [UserBookController::class, 'index'])->name('UserBook');

// ==================================Staff Routes===============================

Route::middleware('auth:staff')->group(function () {

    Route::resource('staff/student', StaffStudentController::class)->names('staff.student');
    Route::resource('staff/library/category', StaffCategoryController::class)->names('staff.category');
    Route::resource('staff/library/author', StaffAuthorController::class)->names('staff.author');
    Route::resource('staff/library/rack', StaffRackController::class)->names('staff.rack');
    Route::resource('staff/library/book', StaffBookController::class)->names('staff.book');
    Route::resource('staff/subject', StaffSubjectController::class)->names('staff.subject');
    Route::resource('staff/leave', StaffLeaveController::class)->names('staff.leave');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/staff-auth.php';
