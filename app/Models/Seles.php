<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seles extends Model
{
    use HasFactory;

    protected $table = "seles";
    protected $primaryKey = 'id';


    protected $fillable = ['nama', 'teritory', 'kontact', 'supervisor'];
}
