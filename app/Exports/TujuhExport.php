<?php

namespace App\Exports;

use App\Models\Tujuh;
use Maatwebsite\Excel\Concerns\FromCollection;


class TujuhExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Tujuh::all();
    }
}
