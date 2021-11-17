<?php

namespace App\Exports;

use App\Models\Tiga;
use Maatwebsite\Excel\Concerns\FromCollection;


class TigaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Tiga::all();
    }
}
