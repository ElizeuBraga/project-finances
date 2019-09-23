<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesSubCategorie extends Model
{
    protected $fillable = ['name', 'expense_category_id'];
}
