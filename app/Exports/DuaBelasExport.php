<?php

namespace App\Exports;

use App\Models\DuaBelas;
use Maatwebsite\Excel\Concerns\FromCollection;


class DuaBelasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DuaBelas::all();
    }
}
