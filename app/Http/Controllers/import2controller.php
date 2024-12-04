<?php

namespace App\Http\Controllers;

use App\Models\sheet2;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Sheet2Import;

use Illuminate\Http\Request;

class import2controller extends Controller
{
    public function index()
    {
        $sheet2 = Sheet2::all();
        return view('import2', compact('sheet2'));
    }

    public function importSheet2(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        Excel::import(new Sheet2Import, $request->file('file'));
        return back()->with('success', 'Sheet2 imported successfully.');
    }
}
