<?php

namespace App\Http\Controllers;

use App\Expense;
use Auth;
use DB;
use App\ExpensesCategorie;
use App\ExpensesSubCategorie;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expensesCategories = ExpensesCategorie::orderBy('name', 'ASC')->where('user_id', Auth::user()->id)->get();
        $expensesSubCategories = ExpensesSubCategorie::orderBy('name', 'ASC')->where('user_id', Auth::user()->id)->get();

        $expenseAmounts = DB::table('expenses_sub_categories')
        ->select(DB::raw('sum(expenses_amounts.value) as value'), 'expenses_sub_categories.name')
        ->join('expenses_amounts', 'expenses_amounts.expense_sub_category_id', '=', 'expenses_sub_categories.id')
        ->groupBy('expenses_sub_categories.name')
        ->whereMonth('expenses_amounts.created_at', '=', date('m'))
        ->whereYear('expenses_amounts.created_at', '=', date('Y'))
        ->where('expenses_amounts.user_id', '=', Auth::user()->id)
        ->get();

        $expensesRecents = DB::table('expenses_sub_categories')
        ->select('expenses_sub_categories.name', 'expenses_amounts.value', 'expenses_amounts.created_at')
        ->join('expenses_amounts', 'expenses_amounts.expense_sub_category_id', '=', 'expenses_sub_categories.id')
        ->whereYear('expenses_amounts.created_at', '=', date('Y'))
        ->orWhereMonth('expenses_amounts.created_at', '=', date('m'))
        ->orderBy('expenses_amounts.created_at', 'DESC')
        ->where('expenses_amounts.user_id', '=', Auth::user()->id)
        ->get();

        return view('expenses', compact('expensesCategories', 'expensesSubCategories', 'expenseAmounts', 'expensesRecents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
