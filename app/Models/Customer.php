<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['email', 'name', 'address', 'phone', 'photo'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
