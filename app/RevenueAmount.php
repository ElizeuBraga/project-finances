<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class RevenueAmount extends Model
{
    protected $fillable = [
        'value',
        'revenue_id',
        'created_at'
    ];
}
