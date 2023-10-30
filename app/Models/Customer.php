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
    public function getFullNameAttribute()
    {
        // return "Hello";
        return $this->first_name . " " . $this->last_name;
    }
    public function setFirstNameAttribute($firstName)
    {
        return $this->attributes["first_name"] = ucfirst($firstName);
    }
    public function setLastNameAttribute($lastName)
    {
        return $this->attributes["last_name"] = ucfirst($lastName);
    }
    public function setEmailAttribute($email)
    {
        return $this->attributes["email"] = strtolower($email);
    }
}
