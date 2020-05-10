<?php

namespace App\Exports;

use App\Rs;
use Maatwebsite\Excel\Concerns\FromCollection;

class RsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rs::all();
    }
}
