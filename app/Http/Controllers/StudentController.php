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

    public function updateStudent(Request $request, $id)
        {
            $request->validate([
                'fullname' => 'required|max:255',
                'age' => 'required|numeric',
                'gender' => 'required|max:6',
                'address' => 'required'
            ]);

            $student = Student::findOrFail($id);
            $student->fullname = $request->fullname;
            $student->age = $request->age;
            $student->gender = $request->gender;
            $student->address = $request->address;
            $student->save();

            return back()->with('success', 'Student updated successfully!');
        }

        public function deleteStudent($id)
        {
            $student = Student::findOrFail($id);
            $student->delete();

            return back()->with('success', 'Student deleted successfully!');
        }


}
