<?php

namespace App\Exports;

use App\Models\Delapan;
use Maatwebsite\Excel\Concerns\FromCollection;


class DelapanExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Delapan::all();
    }
}
