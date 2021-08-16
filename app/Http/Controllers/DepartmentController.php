<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function science(){
        $students = Student::where('department', 'LIKE', "Science")->get();
        return view('science', compact('students'));
    }

    public function arts(){
        $students = Student::where('department', 'LIKE', "Arts")->get();
        return view('arts', compact('students'));
    }

    public function commerce(){
        $students = Student::where('department', 'LIKE', "Commerce")->get();
        return view('commerce', compact('students'));
    }
}
