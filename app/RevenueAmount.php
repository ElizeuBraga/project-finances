<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class RevenueAmount extends Model
{
    protected $fillable = [
        'value',
        'revenue_id'
    ];

    protected $primaryKey = 'revenue_id';

    public function revenueAmounts(){
        return $this->hasMany('App\RevenueAmount');
    }
}
