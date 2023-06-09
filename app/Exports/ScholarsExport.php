<?php

namespace App\Exports;

use App\Models\Scholar;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScholarsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Scholar::all();
    }
}
