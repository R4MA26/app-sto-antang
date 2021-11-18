<?php

namespace App\Exports;

use App\Models\Enam;
use Maatwebsite\Excel\Concerns\FromCollection;


class EnamExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Enam::all();
    }
}
