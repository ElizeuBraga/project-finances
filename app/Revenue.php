<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [];

    public function revenueAmounts(){
        return $this->hasMany(RevenueAmount::class, 'revenue_id');
    }
}
