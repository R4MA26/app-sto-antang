<?php

namespace App\Exports;

use App\Models\LimaBelas;
use Maatwebsite\Excel\Concerns\FromCollection;


class LimaBelasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LimaBelas::all();
    }
}
