<?php

namespace App\Exports;

use App\Models\Empat;
use Maatwebsite\Excel\Concerns\FromCollection;


class EmpatExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Empat::all();
    }
}
