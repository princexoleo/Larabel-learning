<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //mass-asssignment error to off
    protected $guarded = [];

    // a company has many customers
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
