<?php

namespace App\Exports;

use App\Models\EmpatBelas;
use Maatwebsite\Excel\Concerns\FromCollection;


class EmpatBelasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return EmpatBelas::all();
    }
}
