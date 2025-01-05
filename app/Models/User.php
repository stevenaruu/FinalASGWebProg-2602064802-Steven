<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    //
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function hobby()
    {
        return $this->hasMany(Hobby::class);
    }

    public function user_avatar()
    {
        return $this->hasMany(UserAvatar::class);
    }

    public function sent_chat()
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }

    public function receive_chat()
    {
        return $this->hasMany(Chat::class, 'recipient_id');
    }

    public function self()
    {
        return $this->hasMany(Friend::class, 'user_id');
    }

    public function friend()
    {
        return $this->hasMany(Friend::class, 'friend_id');
    }

    public function friendStatus()
    {
        return $this->hasOne(Friend::class, 'friend_id')->where('user_id', Auth::user()->id);
    }
}
