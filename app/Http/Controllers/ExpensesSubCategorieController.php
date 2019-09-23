<?php

namespace App\Http\Controllers;

use App\ExpensesSubCategorie;
use Illuminate\Http\Request;

class ExpensesSubCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenses');
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
     * @param  \App\ExpensesSubCategorie  $expensesSubCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(ExpensesSubCategorie $expensesSubCategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpensesSubCategorie  $expensesSubCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpensesSubCategorie $expensesSubCategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpensesSubCategorie  $expensesSubCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpensesSubCategorie $expensesSubCategorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpensesSubCategorie  $expensesSubCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpensesSubCategorie $expensesSubCategorie)
    {
        //
    }
}
