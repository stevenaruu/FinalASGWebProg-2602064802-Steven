<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAvatar extends Model
{
    //
    use HasFactory;

    protected $table = 'user_avatar';
    protected $guarded = [];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function avatar() {
        return $this->belongsTo(Avatar::class);
    }
}
