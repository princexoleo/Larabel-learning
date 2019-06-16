<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //to solve mass assignment problem 
    // solution one
   // protected $fillable = ['name','email','active']; 

   //solution two
   protected $guarded = [];


    // as many we want we cn implements scope but one thing to remmeber that structure should be maintain strictly

    public function scopeActive($query)
    {
        return $query->where('active',1); //eloquent scope
    }

    public function scopeInactive($query)
    {
        return $query->where('active',0); //eloquent scope
    }

    //
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
