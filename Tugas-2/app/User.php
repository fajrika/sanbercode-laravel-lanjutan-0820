<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password'];

    public function hasRole($role){
        foreach ($role as $k=> $v) {
            switch ($v) {
                case 'sa'   : $role[$k] = 1; break;            
                case 'admin': $role[$k] = 2; break;            
                case 'user' : $role[$k] = 3; break;            
                default     : return false;  break;
            }
        }

        if(in_array($this->role,$role)) return true;
        return false;
    }
    
}
