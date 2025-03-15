<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Student;

class StudentController extends Controller
{
    //This will send you to a view where you can see all the students in the database
    public function index() {
        $students = Student::all();
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.index', compact('students', 'colleges'));
    }

    //This will send you a view to create a new student
    public function create() {
        $student = new Student();
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.create', compact('colleges', 'student'));
    }

    //This will send you to a view where you can view the student's details
    public function show($id) {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    //This will send to a view where you can edit an existing student's details
    public function edit($id) {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    //This will delete the selected student
    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();
        return back()->with('message', 'Student has been deleted successfully');
    }
}
