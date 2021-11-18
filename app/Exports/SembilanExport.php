<?php

namespace App\Exports;

use App\Models\Sembilan;
use Maatwebsite\Excel\Concerns\FromCollection;


class SembilanExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Sembilan::all();
    }
}
