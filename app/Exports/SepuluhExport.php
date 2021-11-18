<?php

namespace App\Exports;

use App\Models\Sepuluh;
use Maatwebsite\Excel\Concerns\FromCollection;


class SepuluhExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Sepuluh::all();
    }
}
