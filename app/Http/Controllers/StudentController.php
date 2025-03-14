<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create() {
        $student = new Student();
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('colleges.create', compact('colleges', 'student'));
    }

    public function edit($id) {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();
        return back()->with('message', 'Student has been deleted successfully');
    }
}
