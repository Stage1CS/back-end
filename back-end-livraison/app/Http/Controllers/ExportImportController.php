<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\livreurExport;
use App\Imports\livreurImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\livreur;

class ExportImportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        $file = Excel::download(new livreurExport, 'livreurs.xlsx');
        if ($file){
            return response()->json([
                'success' => 'data correctly downloaded',
            ], 200);
        }
        return $file;
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new livreurImport,request()->file('file'));
             
        return back();
    }
}
