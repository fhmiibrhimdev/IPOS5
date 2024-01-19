<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupPelanggan extends Model
{
    use HasFactory;
    protected $table   = "grup_pelanggan";
    protected $guarded = [];
    public $timestamps = false;
}
