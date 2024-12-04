<?php

namespace App\Http\Controllers;

use App\Imports\Sheet3Import;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\sheet3;

class importcontroller extends Controller
{
    public function index()
    {
        $sheet3 = Sheet3::select('*')
            ->selectRaw('FORMAT(Quality, 0, "id_ID") as formatted_quality')
            ->selectRaw('FORMAT(TotalReceive, 0, "id_ID") as formatted_total_receive')
            ->selectRaw('CASE WHEN QualityWeight = 0 THEN "-" ELSE CAST(QualityWeight AS UNSIGNED) END as formatted_quality_weight')
            ->selectRaw('CASE WHEN NCCR = 0 THEN "-" ELSE CAST(NCCR AS UNSIGNED) END as formatted_nccr')
            ->selectRaw('CASE WHEN ContaminationWeight = 0 THEN "-" ELSE CAST(ContaminationWeight AS UNSIGNED) END as formatted_contamination')
            ->selectRaw('CASE WHEN Total = 0 THEN "-" ELSE CAST(Total AS UNSIGNED) END as formatted_total')
            ->selectRaw('CONCAT(LatePercentage, "%") as formatted_late_percentage')
            ->selectRaw('CONCAT(Value * 100, "%") as formatted_value')
            ->get();

        return view('import', compact('sheet3'));
    }

    public function importSheet3(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        Excel::import(new Sheet3Import, $request->file('file'));
        return back()->with('success', 'Sheet3 imported successfully.');
    }
}
