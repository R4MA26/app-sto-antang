<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sembilan extends Model

{
    use HasFactory, SoftDeletes;


    protected $table = "sembilans";
    protected $primaryKey = 'id';


    protected $fillable = ['nama', 'no_inetrn', 'kcontact', 'kecepatan', 'description', 'indeks', 'jumlah'];
}

// {

// use HasFactory, SoftDeletes;


//     protected $table = "products";
 
//     protected $fillable = ['name', 'description', 'indeks', 'jumlah', 'total'];
// }