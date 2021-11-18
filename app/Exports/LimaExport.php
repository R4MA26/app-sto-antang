<?php

namespace App\Exports;

use App\Models\Lima;
use Maatwebsite\Excel\Concerns\FromCollection;


class LimaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Lima::all();
    }
}
