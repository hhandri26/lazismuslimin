<?php

namespace App\Imports;

use App\Models\PisoModels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Import_piso implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new PisoModels([
            'name'          => $row['name'],
            'catagory'      => $row['catagory'],
            'p'             => $row['p'],
            'l'             => $row['l'],
            't'             => $row['t'],
            'description'   => $row['description'],
            
        ]);

        return redirect(route('list_piso'));
    }
}
