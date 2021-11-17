<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'nama' => $row[0],
            'no_inetrn' => $row[1],
            'kcontact' => $row[2],
            'kecepatan' => $row[3],
            'description' => $row[4],
            'indeks' => $row[5],
            'jumlah' => $row[6],
            // 'total' => $row[4],
        ]);
    }
}
