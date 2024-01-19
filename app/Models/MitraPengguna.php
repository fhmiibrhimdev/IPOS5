<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraPengguna extends Model
{
    use HasFactory;
    protected $table   = "mitra_pengguna";
    protected $guarded = [];
}
