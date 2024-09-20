<?php

namespace App\Http\Controllers\UserAuth;

use App\Models\Student;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{


    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        // Get role from the request
        $role = $request->role;
        $credentials = ['email' => $request->email, 'password' => $request->password];

        switch ($role) {
            case 'Student':
                $user = Student::where('email', $request->email)->first();
                break;
            case 'Teacher':
                $user = Employee::where('email', $request->email)->first();
                break;
            default:
                return back()->withErrors(['role' => 'Invalid role selected'])->withInput();
        }

        // Check if the user exists and the password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);

            // Redirect based on role
            switch ($role) {
                case 'Student':
                    return redirect()->route('student.dashboard');
                case 'Staff':
                    return redirect()->route('teacher.dashboard');
                    // if($user->roll == 'Teacher'){
                    //     return redirect()->route('teacher.dashboard');
                    // }
                    // if($user->roll == 'Teacher'){
                    //     return redirect()->route('teacher.dashboard');
                    // }
                    // if($user->roll == 'Teacher'){
                    //     return redirect()->route('teacher.dashboard');
                    // }
            }
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }
}
