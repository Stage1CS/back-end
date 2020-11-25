<?php

namespace App\Exports;

use App\Models\livreur;
use Maatwebsite\Excel\Concerns\FromCollection;

class livreurExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return livreur::all();
    }
}
