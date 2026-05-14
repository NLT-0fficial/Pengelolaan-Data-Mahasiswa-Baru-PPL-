<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $programStudi = ProgramStudi::all();

        return view('admin.programstudi.index', compact('programStudi'));
    }
}