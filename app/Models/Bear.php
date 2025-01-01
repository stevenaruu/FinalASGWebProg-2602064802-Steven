<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
    //
    use HasFactory;

    protected $table = 'bear';
    protected $guarded = [];
}
