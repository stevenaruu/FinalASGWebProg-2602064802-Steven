<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Avatar extends Model
{
    //
    use HasFactory;

    protected $table = 'avatar';
    protected $guarded = [];

    public function user_avatar() {
        return $this->hasOne(UserAvatar::class);
    }
}
