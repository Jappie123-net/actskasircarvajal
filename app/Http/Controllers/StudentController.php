<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $stud = Student::all();

        return view('welcome', compact('stud'));
    }
    

    public function createNewStudent(Request $request){

        $request->validate([
            'fullname' => 'required|max:255',
            'age' => 'required|numeric',
            'gender' => 'required|max:6',
            'address' => 'required'
        ]);
        
        $addNew = new Student();
        $addNew->fullname = $request->fullname;
        $addNew->age = $request->age;
        $addNew->gender = $request->gender;
        $addNew->address = $request->address;
        $addNew->save();

        return back()->with('success', 'Student added successfully!');
    }
}
