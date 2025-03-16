<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    //This will send you to a view where you can see all the colleges in the database
    public function index() {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    //This will send you a view to create a new college
    public function create() {
        $college = new College();
        return view('colleges.create', compact('college'));
    }

    //This will send you to a view where you can view the colleges's details
    public function show($id) {
        $college = College::find($id);
        return view('colleges.show', compact('college'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colleges',
            'address' => 'required',
        ]);

        College::create($request->all());
        return redirect()->route('colleges.index')->with('message', 'College has been added successfully');
    }

    //This will send you to a view where you can edit an existing college's details
    public function edit($id) {
        $college = College::find($id);
        return view('colleges.edit', compact('college'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $college = College::find($id);
        $college->update($request->all());
        return redirect()->route('colleges.index')->with('message', 'College has been updated successfully');
    }

    //This will destroy the selected college
    public function destroy($id) {
        $college = College::find($id);
        $college->delete();
        return back()->with('message', 'College has been deleted successfully');
    }
}
