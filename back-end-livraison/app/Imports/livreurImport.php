<?php

namespace App\Imports;

use App\Models\livreur;
use Maatwebsite\Excel\Concerns\ToModel;

class livreurImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new livreur([
            'id_livreur'  => $row['id_livreur'],    
            'nom'         => $row['nom'],
            'prénom'      => $row['prénom'],
            'mail'        => $row['mail'], 
            'num'         => $row['num'], 
            'nb_ajout'    => $row['nb_ajout'],
            'id_zone'     => $row['id_zone'],
            'created_at'  => $row['created_at'],
            'updated_at'  => $row['updated_at'],
            //'password'   => \Hash::make($row['password']),

        ]);
    }
}
