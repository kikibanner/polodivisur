<?php

namespace App\Imports;

use App\Rs;
use Maatwebsite\Excel\Concerns\ToModel;

class RsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rs([
          'name' => $row[0],
          'address' => $row[1],
          'latitude' => $row[2],
          'longitude' => $row[3],
        ]);
    }
}
