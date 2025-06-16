<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $stud = Student::all();

        return view('welcome', compact('stud'));
    }
}
