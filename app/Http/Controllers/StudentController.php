<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Student;

class StudentController extends Controller
{
    //This will send you to a view where you can see all the students in the database
    public function index() {
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        if (request('college_id') == null) {
            $students = Student::all();
        }
        else {
            $students = Student::where('college_id', request('college_id'))->get();
        }
        if (request('name') != null) {
            $students = Student::orderBy('name', request('name'))->get(); 
        }
        if (request('college_id') != null && request('name') != null)
        {
            $students = Student::where('college_id', request('college_id'))->orderBy('name', request('name'))->get();

        }
        return view('students.index', compact('students', 'colleges'));
    }

    //This will send you a view to create a new student
    public function create() {
        $student = new Student();
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.create', compact('colleges', 'student'));
    }
    

    //Validates and adds a new student entry
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:students', 'email:rfc,dns'],
            'phone' => ['required','regex:/^\d{8}/', 'max:8'],
            'dob' => 'required',
            'college_id' => 'required'
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('message', 'Student has been added successfully');
    }

    //Updates the values of an existing student entry
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required','regex:/^\d{8}/', 'max:8'],
            'dob' => 'required',
            'college_id' => 'required'
        ]);

        $student = Student::find($id);
        $student->update($request->all());
        return redirect()->route('students.index')->with('message', 'Student has been updated successfully');
    }

    //This will send you to a view where you can view the student's details
    public function show($id) {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    //This will send to a view where you can edit an existing student's details
    public function edit($id) {
        $student = Student::find($id);
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.edit', compact('student', 'colleges'));
    }

    //This will delete the selected student
    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();
        return back()->with('message', 'Student has been deleted successfully');
    }
}
