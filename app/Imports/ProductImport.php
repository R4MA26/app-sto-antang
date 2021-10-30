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
            'sales' => $row[0],
            'name' => $row[1],
            'description' => $row[2],
            'indeks' => $row[3],
            'jumlah' => $row[4],
            // 'total' => $row[4],
        ]);
    }
}
