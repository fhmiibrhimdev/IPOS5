<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emoney extends Model
{
    use HasFactory;
    protected $table   = "emoney";
    protected $guarded = [];
    public $timestamps = false;
}
