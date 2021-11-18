<?php

namespace App\Exports;

use App\Models\EnamBelas;
use Maatwebsite\Excel\Concerns\FromCollection;


class EnamBelasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return EnamBelas::all();
    }
}
