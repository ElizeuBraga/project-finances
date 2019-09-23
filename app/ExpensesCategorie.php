<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesCategorie extends Model
{
    protected $fillable = ['name', 'user_id'];
}
