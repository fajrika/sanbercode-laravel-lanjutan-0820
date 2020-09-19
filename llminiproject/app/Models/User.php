<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Traits\Uuid;

class User extends Model
{
    
    use HasFactory, Notifiable, Uuid;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];    

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function chats(){
        return $this->hasMany(Chat::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    
}
