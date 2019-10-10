<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function revenueAmounts(){
        return $this->hasMany(\App\RevenueAmount::class);
    }
}
