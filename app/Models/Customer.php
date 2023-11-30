<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    #(get)+habijabi+(attribute)
    public function getFullNameAttribute()
    {
        // return "Hello";
        return $this->first_name . " " . $this->last_name;
    }
    public function setFirstNameAttribute($firstName)
    {
        return $this->attributes["first_name"] = mb_convert_case($firstName, MB_CASE_TITLE, "UTF-8");
    }
    public function setLastNameAttribute($lastName)
    {
        return $this->attributes["last_name"] = mb_convert_case($lastName, MB_CASE_TITLE, "UTF-8");
    }
    public function setEmailAttribute($email)
    {
        return $this->attributes["email"] = strtolower($email);
    }
    public function setStatusAttribute($status)
    {
        return $this->attributes["status"] = strtolower($status);
    }
}
