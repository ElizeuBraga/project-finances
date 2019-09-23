<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesAmount extends Model
{
    protected $fillable = ['value', 'expense_sub_category_id'];
}
