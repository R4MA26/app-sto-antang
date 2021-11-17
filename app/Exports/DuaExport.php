<?php

namespace App\Exports;

use App\Models\Dua;
use Maatwebsite\Excel\Concerns\FromCollection;


class DuaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Dua::all();
    }
}
