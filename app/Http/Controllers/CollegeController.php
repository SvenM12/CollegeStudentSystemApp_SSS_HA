<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    public function index() {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    public function create() {
        $college = new College();
        return view('colleges.create', compact('college'));
    }

    public function edit($id) {
        $college = College::find($id);
        return view('colleges.edit', compact('college'));
    }
}
