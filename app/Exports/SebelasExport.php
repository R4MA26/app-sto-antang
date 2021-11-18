<?php

namespace App\Exports;

use App\Models\Sebelas;
use Maatwebsite\Excel\Concerns\FromCollection;


class SebelasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Sebelas::all();
    }
}
