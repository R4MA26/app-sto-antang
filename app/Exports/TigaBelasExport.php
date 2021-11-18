<?php

namespace App\Exports;

use App\Models\TigaBelas;
use Maatwebsite\Excel\Concerns\FromCollection;


class TigaBelasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return TigaBelas::all();
    }
}
